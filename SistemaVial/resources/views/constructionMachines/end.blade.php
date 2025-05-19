<div class="modal fade" id="modalFinalizar{{$constructionMachine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Finalizar obra</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('constructionMachines.update', $constructionMachines )}}">
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="inputEndDate" class="form-label">Fecha de finalización: </label>
                <input type="date" class="form-control" id="inputEndDate" name="end_date">
            </div>
            <div class="col-12">
                <label for="inputReason" class="form-label">Razón de fin: </label>
                <input type="text" class="form-control" id="inputReason" name="reason_for_the_end">
            </div>
            <div class="col-12">
                <label for="inputKm" class="form-label">Kilómetros recorridos: </label>
                <input type="text" class="form-control" id="inputKm" name="km_traveled">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Finalizar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>    