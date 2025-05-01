@extends('layouts.app')
@section('content')
        <div class="card-body">
            <h5 class="card-title">Crear usuarios</h5>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="count" class="form-label">Cantidad de usuarios</label>
                    <input type="number" class="form-control" id="count" name="count" placeholder="Ingresar cantidad de usuarios" min="1" max="100">
                    <button onclick="createRandomUser()" class="form-control">Crear</button>
                </div>
        </div>
    @vite('resources/js/app.js')
            
@endsection





