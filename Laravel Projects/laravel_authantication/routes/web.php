<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\UserValid;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('user',[UserController::class,'index'])->name('register');


Route::post('user/register',[UserController::class,'register'])->name('registerform');


Route::post('user/login',[UserController::class,'login'])->name('login');


Route::get('loginform',[UserController::class,'loginform'])->name('loginform');


Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware("isvalid");


Route::get('logout',[UserController::class,'logout'])->name('logout');
