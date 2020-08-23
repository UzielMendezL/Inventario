<?php

namespace App;

use Iluminate\Database\Eloquent\Model;
use Iluminate\Contracts\Auth\Authenticable as AuthenticableContract;
use Iluminate\Auth\Authenticable;

class abrhilsoft extends Models implements AuthenticableContract
{
    use Authenticable;
    public  $table = "abrhilSoft"; 
}
