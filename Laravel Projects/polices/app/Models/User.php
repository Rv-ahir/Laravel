<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;




class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $guarded = [];
    
    
    // Your model properties and methods here
}
