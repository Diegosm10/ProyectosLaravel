<form action="{{route('student.search')}}" method="post"> 
    <input type="number" name="id" placeholder="ID" required>
    <br>
    <button type="submit">Buscar</button>
    @csrf
</form>