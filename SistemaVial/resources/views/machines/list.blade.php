@extends('layouts.app')
@section('content')
<h1>Listado de máquinas</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Marca y modelo</th>
        <th scope="col">Kilómetros</th>
        <th scope="col">Tipo de máquina</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($machines as $machine)
      <tr>
        <td>{{$machine->brand_model}}</td>
        <td>{{$machine->kilometers}}</td>
        <td>{{($machine->type_machines->name) ?? 'Sin maquina'}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$machine->id}}">
            Editar
          </button>
          @include('machines.update')
          <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" style="display:inline;">
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