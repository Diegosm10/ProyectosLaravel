<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Models\Machine;
use App\Models\ConstructionMachines;
use Illuminate\Http\Request;

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
            //'end_date' => 'required|date',
            //'reason_for_the_end' => 'required|string|max:255',
            //'km_traveled' => 'required|integer',
            'construction_id' => 'required|exists:constructions,id',
            'machine_id' => 'required|exists:machines,id'
        ]);

        ConstructionMachines::create($request->all());

        return redirect()->back()->with('success', 'Máquina asignada a construcción correctamente!');
    }
}
