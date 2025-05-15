<div class="modal fade" id="modal{{$machine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('machines.update', $machine )}}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                    <label for="inputBrandModel" class="form-label">Marca y modelo: </label>
                    <input type="text" class="form-control" id="inputBrandModel" name="brand_model" value="{{$machine->brand_model}}">
                </div>
                <div class="col-md-6">
                    <label for="inputKilometers" class="form-label">Kilómetros: </label>
                    <input type="number" class="form-control" id="inputKilometers" name="kilometers" value="{{$machine->kilometers}}">
                </div>
                <div class="col-md-4">
                    <label for="inputTypeMachines" class="form-label">Tipo de máquina: </label>
                    <select id="inputTypeMachines" class="form-select" name="type_machines">
                    <option selected>Seleccionar...</option>
                    @foreach ($typeMachines as $typeMachine)
                        <option value="{{$typeMachine->id}}" @if ($typeMachine->id == $machine->type_machines->id) selected {{$machine->type_machines->name}} @endif>{{$typeMachine->name}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>    