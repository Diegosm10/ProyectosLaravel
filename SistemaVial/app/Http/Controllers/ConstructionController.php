<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Http\Requests\StoreConstructionRequest;
use App\Http\Requests\UpdateConstructionRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    public function index(Request $request)
    {
        $query = Construction::with('provinces');

        if ($request->filled('province_id')) {
            $query->where('province_id', $request->province_id);
        }

        $constructions = $query->get();
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
