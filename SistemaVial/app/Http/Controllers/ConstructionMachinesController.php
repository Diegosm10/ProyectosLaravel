<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\Machine;
use App\Models\ConstructionMachines;
use Illuminate\Http\Request;
use App\Events\AlertMaintenanceMachineEvent;
use App\Notifications\MachineNeedsMaintenance;
use Illuminate\Support\Facades\Notification;

class ConstructionMachinesController extends Controller
{
    public function index(){
        $constructionMachines = ConstructionMachines::with('machine', 'construction')->get();
        $machines = Machine::all();
        $constructions = Construction::all();
        return view('constructionMachines.list', [
            'constructionMachines' => $constructionMachines,
            'machines' => $machines,
            'constructions' => $constructions
        ]);
    }

    public function create(){
        $machines = Machine::all();
        $constructions = Construction::all();
        return view('constructionMachines.create', [
            'machines' => $machines,
            'constructions' => $constructions
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'start_date' => 'required|date',
            'construction_id' => 'required|exists:constructions,id',
            'machine_id' => 'required|exists:machines,id'
        ]);

        ConstructionMachines::create([
            'start_date'=> $request->start_date,
            'construction_id'=> $request->construction_id,
            'machine_id'=> $request->machine_id,
        ]);
        return redirect()->route('constructionMachines.index')->with('success', 'Máquina asignada a construcción correctamente!');
    }

    public function update(Request $request, ConstructionMachines $constructionMachine){
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'reason_for_the_end' => 'required|string|max:255',
            'km_traveled' => 'required|integer',
            'construction_id' => 'required|exists:constructions,id',
            'machine_id' => 'required|exists:machines,id'
        ]);
        $constructionMachine->update($request->all());
        $machine = $constructionMachine->machine;
        $machine->kilometers += $request->km_traveled;
        $machine->save();
        if($machine->kilometers >= 80000 && !$machine->maintenances()->latest()->first()){
            $machine->needsMaintenance = true;
            $machine->save();
            return redirect()->back()->with('success', 'Obra activa actualizada correctamente y máquina necesita mantenimiento'); 
        };
        return redirect()->back()->with('success', 'Obra activa actualizada correctamente');
    }

    public function edit(Request $request, ConstructionMachines $constructionMachine){  
        
    }

    public function destroy(ConstructionMachines $constructionMachine){
        $constructionMachine->delete();
        return redirect()->back()->with('success','Obra activa eliminada correctamente');
    }
}
