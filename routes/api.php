<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyAgentController;

// 物件と担当者の割り当て
Route::post('/properties/{property}/assign', [PropertyAgentController::class, 'assign']);
Route::post('/properties/{property}/unassign', [PropertyAgentController::class, 'unassign']);