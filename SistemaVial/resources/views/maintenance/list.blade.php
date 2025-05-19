@extends('layouts.app')
@section('content')
<h1>Listado de máquinas en mantenimiento</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha de inicio</th>
        <th scope="col">Fecha de finalización</th>
        <th scope="col">Descripción</th>
        <th scope="col">Kilometraje al que se le realizo</th>
        <th scope="col">Máquina</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($machines as $machine)
      <tr>
        <td>{{($machine->maintenances->date)}}</td>
        <td>{{($machine->maintenances->end_date) ?? 'Aún en mantenimiento'}}</td>
        <td>{{($machine->maintenances->description) ?? 'Aún en mantenimiento'}}</td>
        <td>{{($machine->maintenances->kilometers_maintenance) ?? 'Aún en mantenimiento'}}</td>
        <td>{{$machine->brand_model . " " . $machine->type_machines->name}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$maintenance->id}}">
            Editar
          </button>
          @include('maintenance.update')
          <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Finalizar</button>
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