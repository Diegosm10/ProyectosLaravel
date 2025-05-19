<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Machine;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines_maintenance = Machine::with("maintenances")->get();
        $machines = Machine::all();
        return view("maintenance.list", ["machines_maintenance" => $machines_maintenance, "machines" => $machines]);
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
            "description"=> "required|string|255",
            "kilometers_traveled"=> "required",
            "machine_id"=> "required|exists:maintenaces,id",
        ]);
        $machine = Machine::find($request->machine_id);

        $maintenance = Maintenance::create([
            "date"=> $request->date,
            "description"=> $request->description,
            "kilometers_traveled"=> $machine->kilometers,
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
