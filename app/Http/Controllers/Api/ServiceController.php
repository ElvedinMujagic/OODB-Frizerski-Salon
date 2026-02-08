<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index()
    {   
        try {

            $services = Service::orderBy('name')->get();
            if ($services->isEmpty()) {
                return response()->json(['message' => 'Nema usluga .',], 200);
            }
            return response()->json(['message' => 'Usluge uspješno dohvaćene.', 'data' => $services], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Došlo je do greške tokom ispisu usluga.', 'error' => $e->getMessage()], 500);
        }
    }

    public function create(Request $request)
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
        
        try {
            $service = Service::create($validated);
            return response()->json(['message' => 'Usluga uspješno stvorena.', 'data' => $service], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Desila se greška prilikom stvaranja usluge.', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Service $service)
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

        try {
            $service->update($validated);
        return response()->json(['message' => 'Usluga uspješno ažurirana.','data' => $service],200);
        } catch(\Exception $e) {
            return response()->json(['message' => 'Došlo je do greške tokom ažuriranja usluge','error' => $e->getMessage()],500);
        }
    }

    public function delete(Service $service)
    {
        try {
            $service->delete();
            return response()->json(['message' => 'Usluga uspješno obrisana.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Došlo je do greške tokom brisanja usluge.', 'error' => $e->getMessage()], 500);
        }
    }
}
