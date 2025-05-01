<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    public function index()
{
    $alumnos = Student::all();
    return view('alumno', compact('alumno'));
}

public function store(Request $request)
{
    $request->validate([
        'apellido' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'dni' => 'required|unique:alumnos,dni',
        'fecha_nacimiento' => 'required|date',
    ]);

    Student::create($request->all());
    return redirect()->back()->with('success', 'Alumno creado exitosamente');
}

public function search(Request $request){
    $id = $request->id;
    $student = Student::find($id);
    return view('student', ['student'=>$student]);
}

public function createCourseStudent(Request $request)
{
    // Validar los datos del formulario
    $validatedData = $request->validate([
        'student_id' => 'required|exists:students,id',
        'course_id' => 'required|exists:courses,id',
    ]);

    try {
        // Buscar al estudiante
        $student = Student::findOrFail($validatedData['student_id']);

        // Usar attach para agregar la relación con el curso
        $student->courses()->attach($validatedData['course_id'], [
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', '¡Relación creada exitosamente!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Hubo un error al crear la relación: ' . $e->getMessage());
    }
}
}