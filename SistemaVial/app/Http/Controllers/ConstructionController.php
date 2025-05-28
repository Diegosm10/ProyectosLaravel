<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Http\Requests\StoreConstructionRequest;
use App\Http\Requests\UpdateConstructionRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    public function index()
    {
        $constructions = Construction::with("provinces")->get();
        $provinces = Province::all();
        return view("constructions.list", ['constructions' => $constructions, 'provinces'=> $provinces]);
    }

    public function create()
    {
        $provinces = Province::all();
        return view("constructions.create", ['provinces' => $provinces]);
    }

    public function store(StoreConstructionRequest $request)
    {
        Construction::create($request->all());
        return redirect()->back()->with('success', 'Construcción creada correctamente!');
    }
    public function show(Construction $construction)
    {
        //
    }

    public function edit(Construction $construction)
    {
        //
    }

    public function update(UpdateConstructionRequest $request, Construction $construction)
    {
        $construction->update($request->all());
        return redirect()->back()->with('success', 'Construcción actualizado correctamente');
    }

    public function destroy(Construction $construction)
    {
        Construction::find($construction->id)->delete();
        return redirect()->back()->with('success','Construcción eliminada correctamente');
    }
}
