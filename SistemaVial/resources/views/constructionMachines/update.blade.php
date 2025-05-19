<div class="modal fade" id="modalEditar{{$constructionMachine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('constructionMachines.edit', $constructionMachine )}}">
            @csrf
            @method('PUT')
                <div class="col-12">
                <label for="inputStartDate" class="form-label">Fecha de inicio: </label>
                <input type="date" class="form-control" id="inputStartDate" name="start_date" value="{{$constructionMachine->start_date}}">
            </div>
            <div class="col-12">
                <label for="inputEndDate" class="form-label">Fecha de finalización: </label>
                <input type="date" class="form-control" id="inputEndDate" name="end_date" value="{{($constructionMachine->end_date) ?? " "}}">
            </div>
            <div class="col-12">
                <label for="inputReason" class="form-label">Razón de fin: </label>
                <input type="text" class="form-control" id="inputReason" name="reason_for_the_end" value="{{($constructionMachine->reason_for_the_end) ?? " "}}">
            </div>
            <div class="col-12">
                <label for="inputKm" class="form-label">Kilómetros recorridos: </label>
                <input type="text" class="form-control" id="inputKm" name="km_traveled" value="{{($constructionMachine->km_traveled) ?? " "}}">
            </div>
            <div class="col-12">
                <label for="inputConstruction" class="form-label">Construcción: </label>
                <select id="inputConstruction" class="form-select" name="construction_id" >
                <option selected>Seleccionar...</option>
                @foreach ($constructions as $construction)
                   <option value="{{$construction->id}}" @if ($construction->id == $constructionMachine->construction->id) selected {{$constructionMachine->construction->name}} @endif>{{$construction->name}}</option>
                @endforeach
                </select>
            <div class="col-12">
                <label for="inputMachine" class="form-label">Máquina: </label>
                <select id="inputMachine" class="form-select" name="machine_id">
                <option selected>Seleccionar...</option>
                @foreach ($machines as $machine)
                    <option value="{{$machine->id}}" @if ($constructionMachine->machine->id == $machine->id) selected {{$machine->brand_model . " " . $machine->type_machines->name}} @endif>{{$machine->brand_model . " " . $machine->type_machines->name}}</option>
                @endforeach
                </select>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>    