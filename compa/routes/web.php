<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/profile/{id}', function ($id) {
    return view('profile', ['id'=>$id]);
});

Route::get('/user',[UserController::class, 'index']);

Route::get('/user/{id}',[UserController::class, 'show']);

Route::get('/formulario',[UserController::class, 'viewFormulario']);

Route::get('/searchUser', function () {
    return view('searchUser');
});

Route::post('/user', [UserController::class, 'store'])->name('user.store');

Route::post('/search', [UserController::class, 'search'])->name('user.search');

Route::patch('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::get('/searchStudent', function (){
    return view('searchStudent');
});

Route::post('/search', [StudentController::class, 'search'])->name('student.search');

Route::get('/carrerStudent', function (){
    return view('carrerStudent');
});

Route::post('/course-student', [StudentController::class, 'createCourseStudent'])->name('courseStudent.create');

