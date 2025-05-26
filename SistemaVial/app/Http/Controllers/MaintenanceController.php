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

        return redirect()->route('machines.index')->with('success', 'Mantenimiento registrado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Machine $machine)
{
    $start = $request->query('start');
    $end = $request->query('end');

    $query = $machine->maintenances()->orderBy('date', 'desc');

    if ($start) {
        $query->where('date', '>=', $start);
    }
    if ($end) {
        $query->where('date', '<=', $end);
    }

    $machines = Machine::all();

    return view('maintenance.show', [
        'machine' => $machine,
        'maintenances' => $query->get(),
        'start' => $start,
        'end' => $end,
        'machines' => $machines,
    ]);
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
        ]);
        $maintenance->update($request->all());
        return redirect()->back()->with('success','Mantenimiento actualizado correctamente!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance::find($maintenance->id)->delete();
        return redirect()->back()->with('success','Mantenimiento eliminado correctamente');
    }
}
