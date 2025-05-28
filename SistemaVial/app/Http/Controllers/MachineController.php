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
    public function index()
    {
        $machines = Machine::with("type_machines")->get();
        $typeMachines = TypeMachine::all();
        return view("machines.list", ["machines" => $machines, "typeMachines" => $typeMachines]);
    }

    public function create()
    {
        $typeMachines = TypeMachine::all();
        return view("machines.create", ["typeMachines" => $typeMachines]);
    }

    public function store(StoreMachineRequest $request)
    {
        Machine::create($request->all());
        return redirect()->route('machines.index')->with('success', 'Máquina creada correctamente!');
    }

 
    public function show(Request $request, ConstructionMachines $constructionMachines, Machine $machine)
    {
    $start = $request->query('start');
    $end = $request->query('end');

  
    $currentConstruction = $constructionMachines->with('construction.provinces')
                            ->where('machine_id', $machine->id)
                            ->where('end_date', null)
                            ->first();
    
    $historyQuery = $constructionMachines->with('construction.provinces')
                    ->where('machine_id', $machine->id)
                    ->whereNotNull('end_date');


    if ($start) {
        $historyQuery->where('start_date', '>=', $start);
    }
    if ($end) {
        $historyQuery->where('end_date', '<=', $end);
    }

    $history = $historyQuery->orderBy('start_date', 'desc')->get();

    return view('machines.show', [
        'machine' => $machine,
        'currentConstruction' => $currentConstruction,
        'history' => $history,
    ]);
    }

    public function edit(Machine $machine)
    {
        //
    }

    public function update(UpdateMachineRequest $request, Machine $machine)
    {
        $machine->update($request->all());
        return redirect()->back()->with('success','Máquina actualizada correctamente');
    }

    public function destroy(Machine $machine)
    {
        Machine::find($machine->id)->delete();
        return redirect()->back()->with('success','Máquina eliminada correctamente');
    }
    
}
