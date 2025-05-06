<div class="modal fade" id="modal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <form class="row g-3" method="POST" action="{{ route('users.update', $user )}}">
            @csrf
            @method('PUT')
            <div class="col-md-6">
              <label for="inputName" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="inputName" name="first_name" value="{{$user->first_name}}">
            </div>
            <div class="form-group">
              <label for="inputLastName" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="inputLastName" name="last_name" value="{{$user->last_name}}">
            </div>
            <div class="form-group">
                <label for="inputGender" class="form-label">Género</label>
                <input type="text" class="form-control" id="inputGender" name="gender" value="{{$user->gender}}">
            </div>
            <div class="form-group">
                <label for="inputUsername" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="inputUsername" name="username" value="{{$loginData['username']}}">
            </div>
            <div class="form-group">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>    

