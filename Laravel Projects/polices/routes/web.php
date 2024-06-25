<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('user',[UserController::class,'index'])->name('user');
Route::post('login',[UserController::class,'login'])->name('login');

Route::resource('book',BookController::class);
