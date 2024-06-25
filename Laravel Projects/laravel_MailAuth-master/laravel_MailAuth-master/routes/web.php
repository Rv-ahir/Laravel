<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('loging');
})->name('login');

Route::view('/signup', 'signup')->name('signup');

Route::controller(UserController::class)->group(function() {
    Route::post('/signup', 'signup')->name('register');

    Route::get('/verification/{id}', 'verification')->name('verification');

    Route::post('/verifyotp', 'verifyotp')->name('verifyotp');

    Route::post('/login', 'login')->name('login');  

    Route::get('/home', 'home')->name('homepage');

    Route::get('/forgottenpassword', 'forgottenpass')->name('forgottenpage');

    Route::post('/forgotemail', 'forgotemail')->name('forgotemail');

    Route::get('/forgotlink/{token}/{email}', 'forgotlink')->name('forgotlink');

    Route::post('/updatepass', 'updatepass')->name('updatepass');

});