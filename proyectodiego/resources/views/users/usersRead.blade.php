@extends('layouts.app')
@section('content')
<h1>Listado de usuarios</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Género</th>
        <th scope="col">Usuario</th>
        <th scope="col">Email</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($users as $user)
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->login['username']}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a href="/users/usersUpdate/{{$user->id}}" class="btn btn-primary">Editar</a>
            <a href="/users/usersDelete/{{$user->id}}" class="btn btn-danger">Eliminar</a>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>

@endsection
