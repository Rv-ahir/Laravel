<?php

use App\Http\Controllers\Postcontroller;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('user',Usercontroller::class);
Route::resource('post',Postcontroller::class);