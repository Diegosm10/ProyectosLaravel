<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\MachineController;
use App\Models\Machine;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
