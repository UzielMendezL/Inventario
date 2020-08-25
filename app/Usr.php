<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Iluminate\Contracts\Auth\Authenticable as AuthenticableContract;
// use Iluminate\Auth\Authenticable;

class Usr extends Model
{
    public  $table = "users"; 
    public $fillable = ['name','email','password'];
}
