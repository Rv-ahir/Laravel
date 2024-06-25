<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmailVarification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function forgottenpass()
    {
        return view('forgotten');
    }
    public function forgotlink($token, $email)
    {
        return view('updatepass', compact('token', 'email'));
    }
    public function signup(Request $request)
    {
        $request->validate(
            [
                'username' => 'string|required',
                'useremail' => 'string|email|required',
                'userpassword' => 'string|required|confirmed|min:6'
            ],
            [],
            [
                'username' => 'User name',
                'useremail' => 'User email',
                'userpassword' => 'User password',
            ]
        );

        $email = $request->useremail;

        $userexist = User::where('email', $email)->exists();
        // return $userexist;

        if ($userexist == true) {
            return redirect('login')->with('error', 'Your email id is already registered.');
        }

        $user = new User;

        $user->name = $request->username;
        $user->email = $request->useremail;
        $user->password = Hash::make($request->userpassword);
        // $user->makeVisible(['password']);
        // return $user;
        $user->save();

        if ($user == true) {
            // return "successfully added";
            // return $user;
            return redirect('verification/' . $user->id)->with('success', 'verification sent to your mail');
        } else {
            return "not added";
        }

    }
    public function verification($id)
    {
        $user = User::find($id);
        // return $user;

        if (!$user || $user->is_verified == 1) {
            return redirect('login')->with('success', 'email is verified please loging.');
        } else {
            $useremail = $user->email;
            $this->sendotp($user);
            return view('verification', compact('useremail'));
        }
    }

    public function sendotp($user)
    {
        $otp = rand(100000, 999999);
        $time = now();
        // return $otp;
        // return $user;

        EmailVarification::updateOrCreate(
            [
                'email' => $user->email,
            ],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time,
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = "Authentication by dinesh";
        $data['subject'] = "Verify the OTP";
        $data['otp'] = $otp;
        $data['body1'] = 'your OTP is ';
        $data['body2'] = ' Please dont share with anyone. If your are not request for otp then ignor it. ';
        // return $data;
        Mail::send('sendmail', compact('data'), function ($message) use ($data) {
            $message->to($data['email'])->subject($data['subject']);
        });
    }

    public function verifyotp(Request $req)
    {
        $useremail = $req->useremail;
        $userotp = $req->userotp;
        // return $userotp;
        $time = now();

        $data = EmailVarification::where('email', $useremail)->get();

        $dbotp = $data[0]->otp;

        $veri = User::where('email', $useremail)->get();

        if ($userotp == $dbotp) {
            $veri = User::where('email', $useremail)->first();
            $veri->email_verified_at = $time;
            $veri->is_verified = "1";
            $veri->save();
            return redirect('login')->with('success', 'email is verified please loging.');
        } else {
            return back()->with('error', 'Otp is wrong');
        }
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'string|email|required',
                'password' => 'required|min:6'
            ],
            [],
            [
                'email' => 'User email',
                'password' => 'User password',
            ]
        );

        // $useremail = $request->useremail;
        // $userpassword = $request->userpassword;

        $userCredential = $request->only('email', 'password');
        $userCredential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //  return $userdata;

        $db = User::where('email', $request->email)->limit(1)->get();
        $db->makeVisible('password');

        if ($db && $db[0]->is_verified == 0) {
            $this->sendotp($db);
            return redirect('verification/' . $db->id)->with('success', 'verification sent to your mail');
        } else if (Auth::attempt($userCredential)) {
            return redirect()->route('homepage')->with('success', 'login successfuly');
        } else {
            return back()->with('error', 'useremail or user password is incorrect.');
        }

    }

    public function forgotemail(Request $request)
    {
        $request->validate(
            [
                'email' => 'string|email|required'
            ]
        );

        $token = Str::random(60);

        $useremail = $request->email;
        // return $useremail;
        $this->savetoken($useremail, $token);
        // return view('updatepass', compact('useremail'));
    }

    public function savetoken($useremail, $token)
    {
        $db = DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $useremail],
            [
                'email' => $useremail,
                'token' => $token,
            ]
        );
        // return $db;

        $data['email'] = $useremail;
        $data['title'] = "Authentication by dinesh";
        $data['subject'] = "Reset your password";
        $data['token'] = $token;
        $data['body1'] = 'your OTP is';
        $data['body2'] = ' Please dont share with anyone. If your are not request for otp then ignor it. ';
        // return $data;
        if($data['email']==true){
            Mail::send('forgotmail', compact('data'), function ($message) use ($data) {
                $message->to($data['email'])->subject($data['subject']);
            });
        }

    }

    public function updatepass(Request $request)
    {
        $request->validate(
            [
                'userpassword' => 'string|required|confirmed|min:6'
            ]
        );

        $userpassword = Hash::make($request->userpassword);
        $user = DB::table("users")
        ->where('email', $request->email)
        ->update([
            'password'=>$userpassword
        ]);

        if ($user) {
            return view('home');
        } else {
            echo "<h1> data not updated</h1>";
        }
    }
}
