<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function login(Request $request)
    {
      $credentials =  $request->validate([
            'email' =>'required|email',
            'password' => 'required',
        ]);

        

        if (auth()->attempt($credentials)) {
           return redirect()->route('userdetails');
        }

        return redirect()->route('loginpage');
    }

    public function userdetails(){
        if(Gate::allows('isAdmin'))
        {
            return redirect()->route('read');

        }
        else
        {
            return redirect()->route('userinfo');
        }
    }

    public function read()
    {
        $user = User::all();
        // return $user;
        return view('read',compact('user'));
    }

    public function userinfo()
    {
        return view('userinfo');
    }

    public function register(){
        return view('register');
       
    }

    public function news()
    {
        // $user=News::where('user_id','Auth::user()->id');
        $a = Auth::user()->id;
        $user = News::where('user_id',$a)->get();
        // return $user;
        return view('news',compact('user'));
    }


       
}
