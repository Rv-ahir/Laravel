<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{ 
    public $timestamps = false;
    protected $guarded = [];

   
    use HasFactory;

    protected $casts = [
        'meta_data' => 'json',
    ];
}
