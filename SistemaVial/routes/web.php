<?php

use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ConstructionMachinesController;
use App\Http\Controllers\MaintenanceController;
use App\Models\Construction;
use App\Models\Machine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/machines', MachineController::class);

Route::resource('/constructions', ConstructionController::class);

Route::resource('/constructionMachines', ConstructionMachinesController::class);

Route::resource('/maintenance', MaintenanceController::class);


