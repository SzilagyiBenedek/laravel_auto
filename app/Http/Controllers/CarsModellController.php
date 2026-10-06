<?php
 namespace App\Http\Controllers;
 use App\Models\CarsManufact;
 use Illuminate\Http\Request;
 class CarsManufactController extends Controller
  { 
    /** * Display a listing of the resource. */ 
    public function index(Request $request)
    { $needle = $request->input('needle');
        $query = CarsManufact::query();
        if ($needle) { $query->where('name', 'like', "%{$needle}%");} 
        $carsManufact = $query->get();
        return view( 'carsManufact.index', compact('carsManufact', 'needle') );
    } 
/** * Show the form for creating a new resource. */
public function create()
    { 
        return view('carsManufact.create'); 
    } 
    /** * Store a newly created resource in storage. */
    public function store(Request $request) 
    {
        $validated = $request->validate([ 'name' => ['required', 'string', 'max:255'], ]);
         CarsManufact::create($validated);
         return redirect() ->route('carsManufact.index') ->with('success', 'Autógyártó létrehozva!'); 
    }
    public function show(CarsManufact $carsManufact)
    {
        return view( 'carsManufact.show', compact('carsManufact') ); 
    } 
    /** * Show the form for editing the specified resource. */
    public function edit(CarsManufact $carsManufact)
    {
         return view( 'carsManufact.edit', compact('carsManufact') ); 
    }
     /** * Update the specified resource in storage. */ 
     public function update( Request $request, CarsManufact $carsManufact ) { $validated = $request->validate([ 'name' => ['required', 'string', 'max:255'], ]); $carsManufact->update($validated); return redirect() ->route('carsManufact.index') ->with('success', 'Autógyártó frissítve!'); } /** * Remove the specified resource from storage. */ public function destroy(CarsManufact $carsManufact) { $carsManufact->delete(); return redirect() ->route('carsManufact.index') ->with('status', 'Autógyártó törölve!'); } }