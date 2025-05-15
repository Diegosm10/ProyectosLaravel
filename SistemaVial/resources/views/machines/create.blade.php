@extends('layouts.app')
@section('content')
<form class="row g-3" method="POST" action="{{ route('machines.store')}}">
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
    <label for="inputBrandModel" class="form-label">Marca y modelo: </label>
    <input type="text" class="form-control" id="inputBrandModel" name="brand_model">
  </div>
  <div class="col-md-6">
    <label for="inputKilometers" class="form-label">Kilómetros: </label>
    <input type="number" class="form-control" id="inputKilometers" name="kilometers">
  </div>
  <div class="col-md-4">
    <label for="inputTypeMachines" class="form-label">Tipo de máquina: </label>
    <select id="inputTypeMachines" class="form-select" name="type_machines">
      <option selected>Seleccionar...</option>
      @foreach ($typeMachines as $typeMachine)
        <option value="{{$typeMachine->id}}">{{$typeMachine->name}}</option>
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