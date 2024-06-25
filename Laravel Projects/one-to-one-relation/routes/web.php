<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('studant',StudantController::class);
Route::resource('contact',ContactController::class);