<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    /**
     * Client creates a new appointment.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'stylist_id' => ['required', 'exists:users,id', Rule::in(
                User::where('role', User::ROLE_STYLIST)->pluck('id')
            )],
            'service_id' => ['required', 'exists:services,id'],
            'appointment_at' => [
                'required',
                'date',
                'after:now',
                function ($attribute, $value, $fail) use ($request) {
                    $stylist = User::with('workHours')->find($request->input('stylist_id'));
                    if (! $stylist) {
                        return;
                    }
                    $workHours = $stylist->workHours;
                    if (! $workHours) {
                        $fail('Ovaj frizer nema postavljeno radno vrijeme. Molimo odaberite drugog frizera ili kontaktirajte administratora.');
                        return;
                    }
                    $appointmentTime = Carbon::parse($value);
                    if (! $workHours->containsTime($appointmentTime)) {
                        $start = Carbon::parse($workHours->start_time)->format('H:i');
                        $end = Carbon::parse($workHours->end_time)->format('H:i');
                        $fail("Odabrano vrijeme nije u radnom vremenu frizera. Radno vrijeme ovog frizera je od {$start} do {$end}.");
                    }
                },
            ],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        Appointment::create([
            'client_id' => auth()->id(),
            'stylist_id' => $validated['stylist_id'],
            'service_id' => $validated['service_id'],
            'appointment_at' => $validated['appointment_at'],
            'notes' => $validated['notes'] ?? null,
            'status' => Appointment::STATUS_PENDING,
        ]);

        return redirect()->route('client.dashboard')->with('status', 'Rezervacija je kreirana i čeka potvrdu frizera.');
    }

    /**
     * Stylist accepts or rejects an appointment.
     */
    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        $this->authorize('update', $appointment);

        $validated = $request->validate([
            'status' => ['required', Rule::in([Appointment::STATUS_ACCEPTED, Appointment::STATUS_REJECTED])],
        ]);

        $appointment->update(['status' => $validated['status']]);

        $message = $validated['status'] === Appointment::STATUS_ACCEPTED
            ? 'Termin je prihvaćen.'
            : 'Termin je odbijen.';

        return redirect()->route('stylist.dashboard')->with('status', $message);
    }

    /**
     * Client cancels their own appointment.
     */
    public function cancel(Appointment $appointment): RedirectResponse
    {
        $this->authorize('cancel', $appointment);

        $appointment->update(['status' => Appointment::STATUS_CANCELLED]);

        return redirect()->route('client.dashboard')->with('status', 'Termin je otkazan.');
    }
}
