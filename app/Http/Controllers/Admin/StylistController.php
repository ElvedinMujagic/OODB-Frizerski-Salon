<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkHours;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class StylistController extends Controller
{
    /**
     * Show form to create a new stylist account.
     */
    public function create(): View
    {
        return view('admin.stylists.create');
    }

    public function delete(): View
    {
        $stylists = User::select('id', 'name', 'lastname', 'email')
                ->where('role', User::ROLE_STYLIST)
                ->get();

        return view('admin.stylists.delete',compact('stylists'));
    }

    /**
     * Store a new stylist account.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => [
                'required',
                'date_format:H:i',
                function (string $attribute, mixed $value, \Closure $fail) use ($request): void {
                    $start = $request->input('start_time');
                    if ($start && $value && $value <= $start) {
                        $fail('Kraj radnog vremena mora biti nakon početka.');
                    }
                },
            ],
        ], [
            'name.required' => 'Ime je obavezno.',
            'lastname.required' => 'Prezime je obavezno.',
            'email.required' => 'Email je obavezan.',
            'email.email' => 'Molimo unesite validnu email adresu.',
            'email.unique' => 'Ova email adresa je već korištena.',
            'password.required' => 'Lozinka je obavezna.',
            'password.min' => 'Lozinka mora imati najmanje 8 karaktera.',
            'password.confirmed' => 'Lozinke se ne poklapaju.',
            'start_time.required' => 'Početak radnog vremena je obavezan.',
            'end_time.required' => 'Kraj radnog vremena je obavezan.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => User::ROLE_STYLIST,
        ]);

        WorkHours::create([
            'user_id' => $user->id,
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Frizer je uspješno kreiran!');
    }

    /**
     * Show form to edit a stylist.
     */
    public function edit(int $id): View|RedirectResponse
    {
        $stylist = User::where('id', $id)->where('role', User::ROLE_STYLIST)->with('workHours')->firstOrFail();
        return view('admin.stylists.edit', compact('stylist'));
    }

    /**
     * Update stylist profile (name, email, work hours).
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $stylist = User::where('id', $id)->where('role', User::ROLE_STYLIST)->firstOrFail();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $stylist->id],
            'password' => ['nullable', 'confirmed', Password::min(8)],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => [
                'required',
                'date_format:H:i',
                function (string $attribute, mixed $value, \Closure $fail) use ($request): void {
                    $start = $request->input('start_time');
                    if ($start && $value && $value <= $start) {
                        $fail('Kraj radnog vremena mora biti nakon početka.');
                    }
                },
            ],
        ], [
            'name.required' => 'Ime je obavezno.',
            'lastname.required' => 'Prezime je obavezno.',
            'email.required' => 'Email je obavezan.',
            'email.email' => 'Molimo unesite validnu email adresu.',
            'email.unique' => 'Ova email adresa je već korištena.',
            'password.min' => 'Lozinka mora imati najmanje 8 karaktera.',
            'password.confirmed' => 'Lozinke se ne poklapaju.',
            'start_time.required' => 'Početak radnog vremena je obavezan.',
            'end_time.required' => 'Kraj radnog vremena je obavezan.',
        ]);

        $stylist->update([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
        ]);

        if (! empty($validated['password'])) {
            $stylist->update(['password' => Hash::make($validated['password'])]);
        }

        $stylist->workHours()->updateOrCreate(
            ['user_id' => $stylist->id],
            [
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
            ]
        );

        return redirect()->route('admin.stylists.delete')->with('status', 'Profil frizera je uspješno ažuriran!');
    }

    public function destroy(int $id): RedirectResponse
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.stylists.delete')->with('status', 'Frizer je uspješno obrisan!');
    }
}
