@extends('layouts.app')
@section('content')
<form class="row g-3" method="POST" action="{{ route('constructionMachines.store')}}">
   @csrf 
   @method("POST") 
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-6">
        <label for="inputStartDate" class="form-label">Fecha de inicio: </label>
        <input type="date" class="form-control" id="inputStartDate" name="start_date">
    </div>
    <div class="col-md-4">
        <label for="inputConstruction" class="form-label">Construcción: </label>
        <select id="inputConstruction" class="form-select" name="construction_id">
        <option selected>Seleccionar...</option>
        @foreach ($constructions as $construction)
            <option value="{{$construction->id}}">{{$construction->name}}</option>
        @endforeach
        </select>
    <div class="col-md-4">
        <label for="inputMachine" class="form-label">Máquina: </label>
        <select id="inputMachine" class="form-select" name="machine_id">
        <option selected>Seleccionar...</option>
        @foreach ($machines as $machine)
            <option value="{{$machine->id}}">{{$machine->brand_model . ' ' . $machine->type_machines->name}}</option>
        @endforeach
        </select>
    </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Crear</button>
  </div>
</form>
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
@endsection