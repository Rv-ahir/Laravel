<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];

    public function setNameAttribute($name){
        $this->attributes['name'] = ucwords($name);
    }

    public function setEmailAttribute($name){
        $this->attributes['email'] = strtolower($name);
    }

    // public function getNameAttribute($name){
    //     return ucwords($name);
    // }

    // public function getBirthdateAttribute($name){
    //     return date('d M Y',strtotime($name));
    // }

    public function getSalaryAttribute($name){
        // return Number::currency($name, in:'INR');
       return Number::spell($name);
    }
}
