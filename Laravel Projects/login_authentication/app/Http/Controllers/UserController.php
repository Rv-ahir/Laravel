<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $otp = rand(100000, 999999);
        $user->otp = $otp;
        $user->otp_expires_at = Carbon::now()->addMinutes(10); // OTP valid for 10 minutes
        $user->save();

        Mail::to($user->email)->send(new UserMail($otp));

        return redirect()->route('otp.verify', ['user' => $user->id]);
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
        
        $request->validate([
            'up_name' => 'required',
            'up_email' => 'required|email',
            'up_dob' => 'required|date',
            'up_gender' => 'required|in:male,female',
            'up_subscription' => 'required',
            'up_preferences' => 'required',
            'up_comments' => 'required',
            'up_photo' => 'required',
        ]);
        $pre = implode(',', $request->up_preferences);


        $user = User::find($id);
        $user_path = public_path('storage/') . $user->image;
        if (file_exists($user_path)) {
            @unlink($user_path);
        }
        $pre = implode(',', $request->up_preferences);
        $path = $request->file('up_photo')->store('image', 'public');
        User::find($id)->update([
            'name' => $request->up_name,
            'email' => $request->up_email,
            'dob' => $request->up_dob,
            'gender' => $request->up_gender,
            'subscription' => $request->up_subscription,
            'preferences' => $pre,
            'comments' => $request->up_comments,
            'image' => $path,
        ]);


        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        $user_path = public_path('storage/') . $user->image;
        if (file_exists($user_path)) {
            @unlink($user_path);
        }
        return redirect()->route('user.index');
    }
}
