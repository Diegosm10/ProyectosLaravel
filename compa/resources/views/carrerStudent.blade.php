<form method="POST" action="{{ route('courseStudent.create') }}">
    @csrf
    <div class="form-group">
        <label for="student_id">Estudiante</label>
        <input type="number" class="form-control" id="student_id" name="student_id" required>
        <small id="studentHelp" class="form-text text-muted">Ingrese el ID del estudiante.</small>
    </div>
    <div class="form-group">
        <label for="course_id">Carrera</label>
        <input type="number" class="form-control" id="course_id" name="course_id" required>
        <small id="careerHelp" class="form-text text-muted">Ingrese el ID de la carrera.</small>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
