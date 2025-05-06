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
      @foreach ($users as $user)
      @php
        $loginData = is_array($user->login) ? $user->login : json_decode($user->login, true);
      @endphp
      <tr>
        <td>{{$user->first_name}}</td>
        <td>{{$user->last_name}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$loginData['username'] ?? 'N/A'}}</td>
        <td>{{$user->email}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$user->id}}">
            Editar
          </button>
          @include('users.usersUpdate')
          <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@endsection
