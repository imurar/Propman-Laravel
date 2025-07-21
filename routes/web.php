<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AgentController;

// 物件一覧・登録・編集・削除
Route::resource('properties', PropertyController::class);

// 担当者一覧・登録・編集・削除
Route::resource('agents', AgentController::class);

// トップページを物件一覧にリダイレクト
Route::get('/', function () {
    return redirect()->route('properties.index');
});