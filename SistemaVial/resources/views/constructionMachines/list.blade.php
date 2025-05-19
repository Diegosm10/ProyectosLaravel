@extends('layouts.app')
@section('content')
<h1>Listado de obras activas</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Fecha de inicio</th>
        <th scope="col">Fecha de finalización</th>
        <th scope="col">Razon de finalización</th>
        <th scope="col">Kilómetros recorridos</th>
        <th scope="col">Máquina</th>
        <th scope="col">Construcción</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($constructionMachines as $constructionMachine)
      <tr>
        <td>{{$constructionMachine->start_date}}</td>
        <td>{{($constructionMachine->end_date) ?? 'Sin finalizar'}}</td>
        <td>{{($constructionMachine->reason_for_the_end) ?? 'Sin finalizar'}}</td>
        <td>{{($constructionMachine->km_traveled) ?? 'Sin finalizar'}}</td>
        <td>{{$constructionMachine->machine->brand_model . ' ' . $constructionMachine->machine->type_machines->name}}</td>
        <td>{{$constructionMachine->construction->name}}</td>
        <td>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditar{{$constructionMachine->id}}">
              Editar
            </button>
        

            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalFinalizar{{$constructionMachine->id}}">
              Finalizar
            </button>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
@foreach ($constructionMachines as $constructionMachine)
    @include('constructionMachines.end', ['constructionMachine' => $constructionMachine])
    @include('constructionMachines.update', ['constructionMachine' => $constructionMachine])
@endforeach
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@endsection