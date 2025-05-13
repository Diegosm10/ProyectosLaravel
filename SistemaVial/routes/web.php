<?php

use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Models\Construction;
use App\Models\Machine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/constructions/create', [ConstructionController::class, 'create']);

Route::post('construction/store', [ConstructionController::class, 'store'])->name('construction.store');

Route::get('/constructions/edit', [ConstructionController::class, 'edit']);