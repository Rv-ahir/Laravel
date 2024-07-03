<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class OTPController extends Controller
{
    public function showVerifyForm(User $user)
    {
        return view('otp-verify', ['user' => $user]);
    }

    public function verifyOTP(Request $request, User $user)
    {
        $request->validate([
            'otp' => 'required|integer',
        ]);

        if ($user->otp === $request->otp && Carbon::now()->lessThanOrEqualTo($user->otp_expires_at)) {
            // OTP is valid
            $user->otp = null;
            $user->otp_expires_at = null;
            $user->save();

            return redirect()->route('login')->with('success', 'OTP verified successfully. You can now log in.');
        } else {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP or OTP has expired.']);
        }
    }
}

