<?php

use App\Http\Controllers\ravi;
use App\Http\Controllers\RohitController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('user',RohitController::class);

Route::get('ravi',[ravi::class,'data']);
