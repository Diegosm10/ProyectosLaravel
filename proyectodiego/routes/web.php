<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\AccessTest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(AccessTest::class);

Route::get('/users/usersCreate', [UserController::class, 'create'])->name('user.create');

Route::post('/users/store', [UserController::class, 'store']);

Route::get('/users/usersRead', [UserController::class, 'read'])->name('users.read');

Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');

Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');






