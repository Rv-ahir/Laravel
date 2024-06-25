<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/loginpage', function () {
    return view('login');
})->name('loginpage');

Route::post('login',[UserController::class,'login'])->name('login');
Route::get('registerpage',[UserController::class,'register'])->name('registerpage');
Route::get('userdetails',[UserController::class,'userdetails'])->name('userdetails');
Route::get('read',[UserController::class,'read'])->name('read')->middleware(Admin::class);
Route::get('userinfo',[UserController::class,'userinfo'])->name('userinfo');




Route::get('news',[UserController::class,'news'])->name('news');






