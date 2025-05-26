<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\Construction;
use App\Models\Maintenance;
use App\Models\TypeMachine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::with("type_machines")->get();
        $typeMachines = TypeMachine::all();
        return view("machines.list", ["machines" => $machines, "typeMachines" => $typeMachines]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typeMachines = TypeMachine::all();
        return view("machines.create", ["typeMachines" => $typeMachines]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMachineRequest $request)
    {
        Machine::create($request->all());
        return redirect()->route('machines.index')->with('success', 'Máquina creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Machine $machine)
{
    $start = $request->query('start');
    $end = $request->query('end');

    // Obra actual (sin fecha de fin)
    $currentConstruction = $machine->constructions()
        ->wherePivot('end_date', null)
        ->with('province')
        ->first();

    // Historial completo o filtrado
    $historyQuery = $machine->constructions()->with(['provinces']);
    
    if ($start) {
        $historyQuery->where('start_date', '>=', $start);
    }
    if ($end) {
        $historyQuery->where('end_date', '<=', $end);
    }


    return view('machines.show', [
        'machine' => $machine,
        'currentConstruction' => $currentConstruction,
        'history' => $historyQuery->get(),
    ]);
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());
        return redirect()->back()->with('success','Máquina actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        Machine::find($machine->id)->delete();
        return redirect()->back()->with('success','Máquina eliminada correctamente');
    }
    
}
