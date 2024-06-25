<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasMany(Post::class);
    }

    // public function scopeActive($query){
    //     return $query->where('status', 1);
    // }

    public function scopeEmail($uery, $email){
        return $uery->whereIn('email', $email);
    }

    protected static function booted() : void
    {
        static::addGlobalScope('userdetails',function(Builder $builder){
            $builder->where('status',1);
        });
    }
}
