<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $stylists = User::select('id','name','email')
                ->where('role','stylist')
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
            'password' => ['required', 'confirmed', Password::min(8)], // min 8 chars
        ], [
            'name.required' => 'Ime je obavezno.',
            'lastname.required' => 'Prezime je obavezno.',
            'email.required' => 'Email je obavezan.',
            'email.email' => 'Molimo unesite validnu email adresu.',
            'email.unique' => 'Ova email adresa je već korištena.',
            'password.required' => 'Lozinka je obavezna.',
            'password.min' => 'Lozinka mora imati najmanje 8 karaktera.',
            'password.confirmed' => 'Lozinke se ne poklapaju.',
        ]);

        User::create([
            'name' => $validated['name'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => User::ROLE_STYLIST,
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Frizer je uspješno kreiran!');
    }

    public function destroy(int $id): RedirectResponse
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.stylists.delete')->with('status', 'Frizer je uspješno obrisan!');
    }
}
