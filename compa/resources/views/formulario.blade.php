<form action="{{route('user.store')}}" method="post">
    <input type="text" placeholder="Nombre" name="nombre">
    <br>
    <input type="email" placeholder="Email" name="email">
    <br>
    <input type="password" placeholder="Clave" name="clave">
    <br>
    <button type="submit">Enviar</button>
    @csrf
</form>

<!--Todo formulario que se envia debe llevar esa directiva token-->
