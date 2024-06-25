<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // User::create([
        //     'name' => 'dilo',
        //     'email' => 'dilo@example.com',
        //     'password' => bcrypt('123'),
        //     'age' => 13,
        //     'role' => 'user',
        // ]);
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

         if(Auth::attempt($validate))
         {
            return redirect()->route('book.index');
         }
    }

   
}
