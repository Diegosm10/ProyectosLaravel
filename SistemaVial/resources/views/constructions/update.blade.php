<div class="modal fade" id="modal{{$construction->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('constructions.update', $construction )}}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
                    <label for="inputName" class="form-label">Nombre de la obra: </label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{$construction->name}}">
                </div>
                <div class="col-md-6">
                    <label for="inputStartDate" class="form-label">Fecha de inicio: </label>
                    <input type="date" class="form-control" id="inputStartDate" name="start_date" value="{{$construction->start_date}}">
                </div>
                <div class="col-6">
                    <label for="inputEndDate" class="form-label">Fecha final: </label>
                    <input type="date" class="form-control" id="inputEndDate" name="end_date" value="{{$construction->end_date}}">
                </div>
                <div class="col-md-4">
                    <label for="inputProvince" class="form-label">Provincia: </label>
                    <select id="inputState" class="form-select" name="province_id">
                    @foreach ($provinces as $province)
                        <option value="{{$province->id}}" @if ($province->id == $construction->province_id) selected {{$province->name}} @endif>{{$province->name}}</option>
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
