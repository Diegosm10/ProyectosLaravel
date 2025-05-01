<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.usersCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $users = $request->input('users');

        foreach ($users as $user) {
            User::create([
                'title_name' => $user['name']['title'],
                'first_name' => $user['name']['first'],
                'last_name' => $user['name']['last'],
                'gender' => $user['gender'],
                'email' => $user['email'],
                'login' => [
                    'uuid' => $user['login']['uuid'],
                    'username' => $user['login']['username'],
                    'salt' => $user['login']['salt'],
                    'md5' => $user['login']['md5'],
                    'sha1' => $user['login']['sha1'],
                    'sha256' => $user['login']['sha256']
                ],
                'password' => bcrypt($user['login']['password']) 
            ]);
        }

        return response()->json([
            'message' => 'Usuarios guardados correctamente!',
            'status' => 'success'
        ]);
    }


    public function read(){
        $users = User::all();
        return view('users.usersRead', ['users' => $users]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idUser = $id;
        $user = User::find($idUser);
        return view('users.usersUpdate', ['user'=> $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        
    }
}
