<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $val = session()->all();
    // return $val;

    // $val = session()->get('name');
    // $val = session('name ','default');
    if(session()->has('jam'))
    {
        $val = session()->get('jam');
        return "<h1>$val</h1>";
    }
    else
    {
        return '<h1>not set</h1>';
    }
});

Route::get('/user', function () {
    session(['name' => 'rohit', 'password' => 123]);
    session()->put('rambhai','lakhanbhai');
    session()->put('jam',null);
    return redirect('/');
});

Route::get('delete', function () {
    session()->forget('name');
});
