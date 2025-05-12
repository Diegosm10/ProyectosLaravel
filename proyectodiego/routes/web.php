<?php

use App\Http\Controllers\UserController;
<<<<<<< HEAD
use App\Http\Middleware\Accesstest;
=======
use App\Http\Middleware\AccessTest;
>>>>>>> 72fbf7b1b632cbca86db44ef25bd3a0156f7a103
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
<<<<<<< HEAD
});

Route::post('/search', [UserController::class, 'search'])->name('user.search');
=======
})->middleware(AccessTest::class);
>>>>>>> 72fbf7b1b632cbca86db44ef25bd3a0156f7a103

Route::get('/users/usersCreate', [UserController::class, 'create'])->name('user.create')->middleware(AccessTest::class);

Route::post('/users/store', [UserController::class, 'store']);

Route::get('/users/usersRead', [UserController::class, 'read'])->name('users.read');

Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');

Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');






