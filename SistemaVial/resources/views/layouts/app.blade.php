<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema CRUD en Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Sistema Vial</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Máquinas</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('machines.create')}}">Crear</a></li>
                    <li><a class="dropdown-item" href="{{route('machines.index')}}">Ver Listado</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Mantenimiento</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('maintenance.create')}}">Crear</a></li>
                    <li><a class="dropdown-item" href="{{route('maintenance.index')}}">Ver Listado</a></li>
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Construcciones</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('constructions.create')}}">Crear</a></li>
                    <li><a class="dropdown-item" href="{{route('constructions.index')}}">Ver Listado</a></li>
                  </ul>
               </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Asignaciones</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('constructionMachines.create')}}">Crear</a></li>
                    <li><a class="dropdown-item" href="{{route('constructionMachines.index')}}">Ver Listado</a></li>
                  </ul>
               </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
