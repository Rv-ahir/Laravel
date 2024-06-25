<?php

use App\Http\Controllers\CompanieController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('user',UserController::class);
Route::resource('phone',PhoneController::class); 
Route::resource('com',CompanieController::class); 
