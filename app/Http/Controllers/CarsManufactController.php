<?php

namespace App\Http\Controllers;

use App\Models\CarsManufact;
use Illuminate\Http\Request;

class CarsManufactController extends Controller
{
    /**
     * Autógyártók listázása és keresése.
     */
public function index(Request $request)
{
    $needle = $request->input('needle');

    $query = CarsManufact::query();

    if ($needle) {
        $query->where('name', 'like', "%{$needle}%");
    }

    $carsManufacts = $query->get();

    return view(
        'carsManufact.index',
        compact('carsManufacts', 'needle')
    );
}
    /**
     * Új autógyártó űrlapja.
     */
    public function create()
    {
        return view('carsManufact.create');
    }

    /**
     * Új autógyártó mentése.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        CarsManufact::create($validated);

        return redirect()
            ->route('carsManufact.index')
            ->with('success', 'Autógyártó létrehozva!');
    }

    /**
     * Egy autógyártó megjelenítése.
     */
    public function show(CarsManufact $carsManufact)
    {
        return view(
            'carsManufact.show',
            compact('carsManufact')
        );
    }

    /**
     * Szerkesztőűrlap.
     */
    public function edit(CarsManufact $carsManufact)
    {
        return view(
            'carsManufact.edit',
            compact('carsManufact')
        );
    }

    /**
     * Autógyártó frissítése.
     */
    public function update(
        Request $request,
        CarsManufact $carsManufact
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $carsManufact->update($validated);

        return redirect()
            ->route('carsManufact.index')
            ->with('success', 'Autógyártó frissítve!');
    }

    /**
     * Autógyártó törlése.
     */
    public function destroy(CarsManufact $carsManufact)
    {
        $carsManufact->delete();

        return redirect()
            ->route('carsManufact.index')
            ->with('status', 'Autógyártó törölve!');
    }
}