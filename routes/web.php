<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;

// Inertiaページとしてルーティング
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::resource('properties', PropertyController::class)->except(['show']);
Route::get('properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

Route::resource('agents', AgentController::class)->except(['show']);
Route::get('agents/{agent}', [AgentController::class, 'show'])->name('agents.show');