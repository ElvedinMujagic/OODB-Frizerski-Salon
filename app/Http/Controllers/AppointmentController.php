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
            'appointment_at' => ['required','date','after:now',
                function ($attribute, $value, $fail) {
                    $time = Carbon::parse($value);
                    if ($time->hour < 8 || $time->hour >= 16) {$fail('Termini su dostupni samo od 08:00 do 16:00.');}
                }],
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
            ? 'Appointment accepted.'
            : 'Appointment rejected.';

        return redirect()->route('stylist.dashboard')->with('status', $message);
    }
}
