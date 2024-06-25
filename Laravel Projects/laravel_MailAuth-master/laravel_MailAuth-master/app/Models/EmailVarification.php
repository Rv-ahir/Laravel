<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailVarification extends Model
{
    use HasFactory;

    protected $table = 'emailvarifications';

    public $timestamps = false;

        protected $fillable=[
        'email',
        'otp',
        'created_at'
    ];
}
