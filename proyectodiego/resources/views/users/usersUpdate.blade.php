@extends('layouts.app')
@section('content')
<form class="row g-3" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
    @csrf
    @method('PUT')
    <div class="col-md-6">
      <label for="inputName" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="inputName" value="{{$user->first_name}}">
    </div>
    <div class="col-md-6">
      <label for="inputLastName" class="form-label">Apellido</label>
      <input type="text" class="form-control" id="inputLastName" value="{{$user->last_name}}">
    </div>
    <div class="col-md-6">
        <label for="inputGender" class="form-label">Género</label>
        <input type="text" class="form-control" id="inputGender" value="{{$user->gender}}">
    </div>
    <div class="col-md-6">
        <label for="inputUsername" class="form-label">Usuario</label>
        <input type="text" class="form-control" id="inputUsername" value="{{$user->login['username']}}">
    </div>
    <div class="col-md-6">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail" value="{{$user->email}}">
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@endsection
