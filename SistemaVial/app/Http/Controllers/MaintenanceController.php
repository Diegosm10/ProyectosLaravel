<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\Maintenance;
use Illuminate\Validation\Validator;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::with('machine')->get();
        $machines = Machine::all();
        return view("maintenance.list", ["machines" => $machines, "maintenances" => $maintenances]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machines = Machine::all();
        return view("maintenance.create", ["machines" => $machines]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "date" => "required",
            "description"=> "required|string|max:255",
            "machine_id"=> "required|exists:machines,id",
        ]);
        $machine = Machine::find($request->machine_id);
        Maintenance::create([
            "date"=> $request->date,
            "description"=> $request->description,
            "kilometers_maintenance"=> $machine->kilometers,
            "machine_id"=> $request->machine_id,
        ]);

        return redirect()->back()->with('success', 'Mantenimiento registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'date'=> 'required|date',
            'end_date' => 'required|date',
            'description'=> 'required|string|max:255',
            'machine_id'=> 'required|exists:machines,id',
        ]);
        $machine = Machine::find($request->machine_id);
        $maintenance->update([
            'date'=> $request->date,
            'end_date' => $request->end_date,
            'description'=> $request->description,
            'kilometers_maintenance' => $machine->kilometers,
            'machine_id'=> $request->machine_id,

        ]);
        return redirect()->back()->with('success','Mantenimiento actualizado correctamente!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance::find($maintenance->id)->delete();
        return redirect()->back()->with('success','Mantenimiento eliminado000000 correctamente');
    }
}
