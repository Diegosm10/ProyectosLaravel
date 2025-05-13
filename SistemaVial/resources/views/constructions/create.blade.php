@extends('layouts.app')
@section('content')
<form class="row g-3" method="POST" action="{{ route('construction.store')}}">
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
    <label for="inputName" class="form-label">Nombre de la obra: </label>
    <input type="text" class="form-control" id="inputName" name="name">
  </div>
  <div class="col-md-6">
    <label for="inputStartDate" class="form-label">Fecha de inicio: </label>
    <input type="date" class="form-control" id="inputStartDate" name="start_date">
  </div>
  <div class="col-12">
    <label for="inputEndDate" class="form-label">Fecha final: </label>
    <input type="date" class="form-control" id="inputEndDate" name="end_date">
  </div>
  <div class="col-md-4">
    <label for="inputProvince" class="form-label">Provincia: </label>
    <select id="inputState" class="form-select" name="province_id">
      <option selected>Seleccionar...</option>
      @foreach ($provinces as $province)
        <option value="{{$province->id}}">{{$province->name}}</option>
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
