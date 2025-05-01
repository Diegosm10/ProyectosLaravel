<h1>Lista de becas del estudiante {{$student->name}} {{$student->last_name}}</h1>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Monto a cobrar</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($student->grant as $grants)
        <tr>
            <td>{{ $grants->name }}</td>
            <td>{{ $grants->amount }}</td>
            <td>{{ $grants->start_date }}</td>
            <td>{{ $grants->end_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
