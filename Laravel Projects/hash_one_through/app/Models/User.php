<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function number(){
        return $this->hasOneThrough(Phone::class,Company::class);
    }

    public function company(){
        return $this->hasOne(Company::class);
    }
}
