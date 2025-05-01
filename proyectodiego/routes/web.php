<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('searchUser', function () {
    return view('searchUser');
});

Route::post('/search', [UserController::class, 'search'])->name('user.search');

Route::get('/users/usersCreate', [UserController::class, 'create'])->name('user.create');

Route::post('/users/store', [UserController::class, 'store']);

Route::get('/users/usersRead', [UserController::class, 'read'])->name('users.read');

Route::get('/users/usersUpdate/{id}', [UserController::class,'edit'])->name('users.edit');

Route::put('/users/update/{id}', [UserController::class,'update'])->name('users.update');






