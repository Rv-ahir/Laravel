<?php

use App\Http\Controllers\OTPController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UseController;
use App\Http\Controllers\UserController;

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


Route::get('/otp-verify/{user}', [OTPController::class, 'showVerifyForm'])->name('otp.verify');
Route::post('/otp-verify/{user}', [OTPController::class, 'verifyOTP']);


