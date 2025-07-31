<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;


Route::resource('agents', AgentController::class);
Route::resource('properties', PropertyController::class);