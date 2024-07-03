<?php

use App\Http\Controllers\UseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login',function(){
    return view('login');
})->name('login');

Route::get('register',function(){
    return view('register');
})->name('register');

Route::get('dashboard',function(){
    return view('dashboard');
})->name('dashboard');

Route::resource('user',UserController::class);
Route::post('logincheck',[UseController::class,'logincheck'])->name('logincheck');
