<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\Construction;
use App\Models\ConstructionMachines;
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
    public function show(Request $request, ConstructionMachines $constructionMachines, Construction $construction, Machine $machine)
{
    $start = $request->query('start');
    $end = $request->query('end');

    /*
    $currentConstruction = $machine->constructions()
        ->wherePivot('end_date', null)
        ->with('provinces')
        ->first();
*/
    
    $history = $constructionMachines::with('construction', 'machine')->findOrFail($machine->id);
    $constructions = $construction::with('provinces')->get();

    //$history = $historyQuery->get();
    /*
    if ($start) {
    $history->wherePivot('start_date', '>=', $start);
    }
    if ($end) {
        $history->wherePivot('end_date', '<=', $end);
    }
        */
    //dd($history);
    dd($machine);
    return view('machines.show', [
        'machine' => $machine,
        'currentConstruction' => $currentConstruction,
        'history' => $history,
        'constructions'=> $constructions
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
