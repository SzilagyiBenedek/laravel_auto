<?php

namespace App\Http\Controllers;

use App\Models\CarsModell;
use App\Models\CarsManufact;
use Illuminate\Http\Request;

class CarsModellController extends Controller
{
    public function index()
    {
        $carsModells = CarsModell::with('carsManufact')->get();

        return view('carsModell.index', compact('carsModells'));
    }

    public function create()
    {
        $carsManufacts = CarsManufact::all();

        return view('carsModell.create', compact('carsManufacts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
            'carsManufact_id' => [
                'required',
                'exists:carsManufact,id',
            ],
        ]);

        CarsModell::create($validated);

        return redirect()
            ->route('carsModell.index')
            ->with('status', 'Autómodell sikeresen létrehozva!');
    }

    public function show(CarsModell $carsModell)
    {
        $carsModell->load('carsManufact');

        return view('carsModell.show', compact('carsModell'));
    }

    public function edit(CarsModell $carsModell)
    {
        $carsManufacts = CarsManufact::all();

        return view(
            'carsModell.edit',
            compact('carsModell', 'carsManufacts')
        );
    }

    public function update(Request $request, CarsModell $carsModell)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer'],
            'carsManufact_id' => [
                'required',
                'exists:carsManufact,id',
            ],
        ]);

        $carsModell->update($validated);

        return redirect()
            ->route('carsModell.index')
            ->with('status', 'Autómodell sikeresen frissítve!');
    }

    public function destroy(CarsModell $carsModell)
    {
        $carsModell->delete();

        return redirect()
            ->route('carsModell.index')
            ->with('status', 'Autómodell sikeresen törölve!');
    }
}