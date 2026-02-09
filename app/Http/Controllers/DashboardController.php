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
     * Prikazuje pravilni dashboard ovisno o tome ko se prijavio
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
     * Client dashboard: moji termini (svi, uključujući i one koji nisu još prihvaćeni), lista frizera i usluga za zakazivanje novih termina
     */
    public function clientDashboard(): View
    {
        $appointments = auth()->user()
            ->clientAppointments()
            ->with(['stylist', 'service'])
            ->latest('appointment_at')
            ->get();
        $stylists = User::where('role', User::ROLE_STYLIST)->with('workHours')->orderBy('name')->get();
        $services = Service::orderBy('name')->get();

        return view('dashboard.client', compact('appointments', 'stylists', 'services'));
    }

    /**
     * Stylist dashboard: moji termini (svi, uključujući i one koji nisu još prihvaćeni)
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
     * Admin dashboard: svi termini sa filterom po danu, mjesecu, godini
     */
    public function adminDashboard(): View
    {
        $query = Appointment::with(['client', 'stylist', 'service'])->latest('appointment_at');

        $filter = request('filter', 'all');
        $date = request('date');
        $month = request('month');
        $year = request('year_only') ?? request('year_month');

        if ($filter === 'day' && $date) {
            $query->whereDate('appointment_at', $date);
        } elseif ($filter === 'month' && $month && $year) {
            $query->whereMonth('appointment_at', (int) $month)->whereYear('appointment_at', (int) $year);
        } elseif ($filter === 'year' && $year) {
            $query->whereYear('appointment_at', (int) $year);
        }

        $appointments = $query->get();

        return view('dashboard.admin', compact('appointments', 'filter', 'date', 'month', 'year'));
    }
}
