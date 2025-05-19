<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Http\Requests\StoreMachineRequest;
use App\Http\Requests\UpdateMachineRequest;
use App\Models\TypeMachine;

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
        return redirect()->back()->with('success', 'Máquina creada correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        //
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
