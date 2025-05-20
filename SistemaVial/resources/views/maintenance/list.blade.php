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
      @foreach ($maintenances as $maintenance)
      <tr>
        <td>{{($maintenance->date ?? 'Sin datos')}}</td>
        <td>{{($maintenance->end_date) ?? 'Aún en mantenimiento'}}</td>
        <td>{{($maintenance->description) ?? 'Sin datos'}}</td>
        <td>{{($maintenance->kilometers_maintenance) ?? 'Sin datos'}}</td>
        <td>{{$maintenance->machine->brand_model  ?? 'Sin datos'}}</td>
        <td>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$maintenance->id}}">
            Editar
          </button>
          @include('maintenance.update')
          <form action="{{ route('maintenance.destroy', $maintenance->id) }}" method="POST" style="display:inline;">
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