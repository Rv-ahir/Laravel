<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendmail()
    {
        $toEmail = "rohitahir39096@gmail.com";
        $message = "Hello welcome to send mail tutorial";
        $subject = "for testion a mail verification";


        Mail::to($toEmail)->send(new welcomeemail($message,$subject));
    }
}
