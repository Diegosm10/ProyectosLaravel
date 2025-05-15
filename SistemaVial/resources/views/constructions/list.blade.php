@extends('layouts.app')
@section('content')
<h1>Listado de construcciones</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre de la obra</th>
        <th scope="col">Fecha de inicio</th>
        <th scope="col">Fecha de fin</th>
        <th scope="col">Provincia</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($constructions as $construction)
      <tr>
        <td>{{$construction->name}}</td>
        <td>{{$construction->start_date}}</td>
        <td>{{$construction->end_date}}</td>
        <td>{{$construction->provinces->name}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$construction->id}}">
            Editar
          </button>
          @include('constructions.update')
          <form action="{{ route('constructions.destroy', $construction->id) }}" method="POST" style="display:inline;">
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