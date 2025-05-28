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
    public function index()
    {

    }

    public function create()
    {
        $machines = Machine::all();
        return view("maintenance.create", ["machines" => $machines]);
    }

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
            "end_date" => $request->end_date ?? null,
            "description"=> $request->description,
            "kilometers_maintenance"=> $machine->kilometers,
            "machine_id"=> $request->machine_id,
        ]);

        return redirect()->route('machines.index')->with('success', 'Mantenimiento registrado correctamente!');
    }

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

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'date'=> 'required|date',
            'end_date' => 'required|date',
            'description'=> 'required|string|max:255',
        ]);
        $machine = Machine::findOrFail($request->machine_id);
        $maintenance->update([
            'date'=> $request->date,
            'end_date' => $request->end_date,
            'description'=> $request->description,
            'kilometers_maintenance'=> $machine->kilometers,
            'machine_id'=> $request->machine_id,
        ]);
        return redirect()->back()->with('success','Mantenimiento actualizado correctamente!');
    }
    public function destroy(Maintenance $maintenance)
    {
        $maintenance::find($maintenance->id)->delete();
        return redirect()->back()->with('success','Mantenimiento eliminado correctamente');
    }
}
