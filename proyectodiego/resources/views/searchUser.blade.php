<form action="{{route('user.search')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="search" class="form-label">Buscar usuario</label>
        <input type="number" class="form-control" id="search" name="search" placeholder="Ingresar id">
    </div>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
