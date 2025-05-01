<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        //dd('OK▼');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request->all()); //Muestra todo lo que envia el formulario
        // Una forma de insertar un registro en la bd
        
        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->clave;
        $user->save();
        
        // Otra forma
        /*
        $user = User::create(
            ['name' => $request->nombre,
            'email' => $request->email,
            'password' => $request->clave]);
        */
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('profile', ['user'=>$user]);
    }

    public function search(Request $request){
        $id = $request->id;
        $user = User::find($id);
        return view('user', ['user'=>$user]);
    }

    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return view('user', ['user'=>$user]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function viewFormulario(){
        return view('formulario');
    }

}
