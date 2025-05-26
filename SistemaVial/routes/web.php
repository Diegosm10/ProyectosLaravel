<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConstructionController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ConstructionMachinesController;
use App\Http\Controllers\MaintenanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/constructions', ConstructionController::class);
    Route::resource('/machines', MachineController::class);
    Route::resource('/constructionMachines', ConstructionMachinesController::class);
    Route::resource('maintenance', MaintenanceController::class)->except(['show']);
    Route::get('maintenance/machine/{machine}', [MaintenanceController::class, 'show'])->name('maintenance.show');
});

require __DIR__.'/auth.php';
