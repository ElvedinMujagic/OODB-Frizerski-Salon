<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Redirect to the correct dashboard based on user role.
     */
    public function index(): RedirectResponse
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if ($user->isStylist()) {
            return redirect()->route('stylist.dashboard');
        }

        return redirect()->route('client.dashboard');
    }

    /**
     * Client dashboard: my appointments (accepted/rejected) + create form.
     */
    public function clientDashboard(): View
    {
        $appointments = auth()->user()
            ->clientAppointments()
            ->with(['stylist', 'service'])
            ->latest('appointment_at')
            ->get();
        $stylists = User::where('role', User::ROLE_STYLIST)->orderBy('name')->get();
        $services = Service::orderBy('name')->get();

        return view('dashboard.client', compact('appointments', 'stylists', 'services'));
    }

    /**
     * Stylist dashboard: my appointments, accept/reject pending.
     */
    public function stylistDashboard(): View
    {
        $appointments = auth()->user()
            ->stylistAppointments()
            ->with(['client', 'service'])
            ->latest('appointment_at')
            ->get();

        return view('dashboard.stylist', compact('appointments'));
    }

    /**
     * Admin dashboard: all appointments + link to create stylist.
     */
    public function adminDashboard(): View
    {
        $appointments = Appointment::with(['client', 'stylist', 'service'])
            ->latest('appointment_at')
            ->get();

        return view('dashboard.admin', compact('appointments'));
    }
}
