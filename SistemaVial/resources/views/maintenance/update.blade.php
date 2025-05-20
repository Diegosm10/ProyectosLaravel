<div class="modal fade" id="modal{{$maintenance->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('maintenance.update', $maintenance)}}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                    <label for="inputDate" class="form-label">Fecha de ingreso: </label>
                    <input type="date" class="form-control" id="inputDate" name="date" value="{{$maintenance->date ?? " "}}">
            </div>
            <div class="col-md-6">
                <label for="inputEndDate" class="form-label">Fecha de finalización: </label>
                <input type="date" class="form-control" id="inputEndDate" name="end_date" value="{{$maintenance->end_date ?? " "}}">
            </div>
            <div class="col-md-6">
                <label for="inputDescription" class="form-label">Descripción: </label>
                <input type="text" class="form-control" id="inputDescription" name="description" value="{{$maintenance->description ?? " "}}">
            </div>
            <div class="col-md-6">
                <label for="inputKm" class="form-label">Kilometraje de la máquina: </label>
                <input type="number" class="form-control" id="inputKm" name="kilometers_maintenance" value="{{$maintenance->kilometers_maintenance ?? " "}}">
            </div>
                <div class="col-md-4">
                    <label for="inputMachines" class="form-label">Máquina: </label>
                    <select id="inputMachines" class="form-select" name="machine_id">
                    <option selected>Seleccionar...</option>
                    @foreach ($machines as $machine)
                        <option value="{{$machine->id}}" @if ($maintenance->machine_id == $machine->id) selected {{$machine->brand_model . " " . $machine->type_machines->name}} @endif>{{$machine->brand_model . " " . $machine->type_machines->name}}</option>
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