<?php
namespace App\Http\Controllers\Auth;


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('registationform');
    }

    public function loginform(){
        return view('login');
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' =>'required',
            'email' =>'required|email',
            'password' => 'required',
            
        ]);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // return $user;   

        return redirect()->route('loginform');


    }

    public function login(Request $request)
    {
        $vali = $request->validate([
            'email' =>'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($vali)){
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('loginform');
        }

        
    }

    public function dashboard()
    {
        return view('dashboard');
        
    }
     

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginform');
    }
}
