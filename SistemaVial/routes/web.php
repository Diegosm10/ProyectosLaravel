<?php

use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ConstructionMachinesController;
use App\Models\Construction;
use App\Models\Machine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/constructions/create', [ConstructionController::class, 'create']);

Route::post('construction/store', [ConstructionController::class, 'store'])->name('construction.store');

Route::get('/constructions/list', [ConstructionController::class, 'index']);

Route::put('/constructions/{construction}', [ConstructionController::class, 'update'])->name('construction.update');

Route::delete('/constructions/{construction}', [ConstructionController::class,'destroy'])->name('construction.destroy');
*/

Route::resource('/machines', MachineController::class);

Route::resource('/constructions', ConstructionController::class);

//Route::resource('/constructionMachines', ConstructionMachinesController::class);