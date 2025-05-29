<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\Machine;
use App\Models\ConstructionMachines;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Events\AlertMaintenanceMachineEvent;
use App\Notifications\MachineNeedsMaintenance;
use Illuminate\Support\Facades\Notification;

class ConstructionMachinesController extends Controller
{
    public function index(Request $request){
    $constructionMachines = ConstructionMachines::with(['machine.type_machines', 'construction.provinces']);

    // Filtrar por provincia si se especifica
    if ($request->filled('province_id')) {
        $constructionMachines->whereHas('construction', function ($query) use ($request) {
            $query->where('province_id', $request->province_id);
        });
    }

    $constructionMachines = $constructionMachines->get();

    // Para el filtro del select
    $provinces = Province::all();
    $constructions = Construction::all();
    $machines = Machine::all();

    return view('constructionMachines.list', [
        'constructionMachines' => $constructionMachines,
        'provinces' => $provinces,
        'constructions' => $constructions,
        'machines' => $machines
    ]);
    }

    public function create(){
        $machines = Machine::whereDoesntHave('constructions', function ($query) {
        $query->whereNull('construction_machines.end_date');
        })->get();

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
        $maintenance = $machine->maintenances()->orderByDesc('date')->first();
        if (!$maintenance && $machine->kilometers >= 50000) {
            return redirect()->back()->with('success', 'Obra activa actualizada correctamente y máquina necesita mantenimiento'); 
        }
        elseif ($maintenance->kilometers_maintenance + 50000 <= $machine->kilometers){
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
