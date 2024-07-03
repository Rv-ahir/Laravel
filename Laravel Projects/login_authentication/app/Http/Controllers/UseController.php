<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UseController extends Controller
{
    public function logincheck(Request $request)
    {
        $vel = $request->validate([
            'email' =>'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($vel))
        {
            return redirect()->route('user.index');
        }
        else
        {
            return redirect()->route('login')->with('error','Invalid Credentials');
        }
    }

   
}
