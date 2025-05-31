<?php

namespace App\Http\Controllers;

use App\Models\TypeMachine;
use Illuminate\Http\Request;

class TypeMachineController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeMachine $typeMachine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeMachine $typeMachine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    foreach ($request->kilometers_maintenance as $id => $kilometers) {
        TypeMachine::where('id', $id)->update(['kilometers_maintenance' => $kilometers]);
    }

    return redirect()->route('maintenance.create')->with('success', 'Kilómetros de mantenimiento actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeMachine $typeMachine)
    {
        //
    }
}
