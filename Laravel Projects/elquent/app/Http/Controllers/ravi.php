<?php

namespace App\Http\Controllers;

use App\Models\rohit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ravi extends Controller
{
    public function data(){
        $user = rohit::upsert([
            "name" => "rajesh",
            "city" => "surat",
        ],[
            "city" 
        ],[
            "name"
        ]);
        return $user;
    }
}
