<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        // return $user;
        return view('dashboard', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $pre = implode(',', $request->preferences);
        // return $pre;
        // return $request;
        // dd($request->photo);

        // dd($path);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'subscription' => 'required',
            'preferences' => 'required',
            'comments' => 'required',
            'photo' => 'required',
        ]);
        $pre = implode(',', $request->preferences);
        $path = $request->file('photo')->store('image', 'public');


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'dob' => $request->dob,
            'gender' => $request->gender,
            'subscription' => $request->subscription,
            'preferences' => $pre,
            'comments' => $request->comments,
            'image' => $path,
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->dob = $request->dob;
        // $user->gender = $request->gender;
        // $user->subscription = $request->subscription;
        // $user->preferences = '[' . $pre . ']';
        // $user->comments = $request->comments;
        // $user->image = $path;
        // $user->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        return $user;


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $user_path = public_path('storage/').$user->photo;
        if(file_exists($user_path))
        {
            @unlink($user_path);
        }
        return redirect()->route('user.index');
    }
}
