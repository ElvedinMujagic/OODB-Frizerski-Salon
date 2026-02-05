<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('name')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'avg_time' => ['required', 'integer', 'min:1'],
        ],[
            'name.required' => 'Ime je potrebno!.',
            'price.required' => 'Cijena je potrebna!.',
            'price.numeric' => 'Cijena mora biti broj.',
            'price.min' => 'Cijena mora biti minimum 0.',
            'avg_time.required' => 'Prosječno vrijeme čekanja je potrebno!.',
            'avg_time.integer' => 'Prosječno vrijeme čekanja mora biti cijeli broj.',
            'avg_time.min' => 'Prosječno vrijeme čekanja mora biti barem 1 minuta.',
        ]);

        Service::create($validated);
        return redirect()->route('admin.services.index')->with('status', 'Usluga je uspješno kreirana.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'avg_time' => ['required', 'integer', 'min:1'],
        ]);

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('status', 'Usluga je uspješno ažurirana.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('status', 'Usluga je uspješno obrisana.');
    }
}
