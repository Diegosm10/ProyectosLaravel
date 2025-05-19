<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Http\Requests\StoreConstructionRequest;
use App\Http\Requests\UpdateConstructionRequest;
use App\Models\Province;
use Illuminate\Http\Request;

class ConstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $constructions = Construction::with("provinces")->get();
        $provinces = Province::all();
        return view("constructions.list", ['constructions' => $constructions, 'provinces'=> $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view("constructions.create", ['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreConstructionRequest $request)
    {
        Construction::create($request->all());
        return redirect()->back()->with('success', 'Construcción creada correctamente!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Construction $construction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Construction $construction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConstructionRequest $request, Construction $construction)
    {
        $construction->update($request->all());
        return redirect()->back()->with('success', 'Construcción actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Construction $construction)
    {
        Construction::find($construction->id)->delete();
        return redirect()->back()->with('success','Construcción eliminada correctamente');
    }
}
