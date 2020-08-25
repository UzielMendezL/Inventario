<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\abrhilSoft;
use App\Product;
use Auth;


class LoginController extends Controller
{

    public function __construct(){
        $this ->middleware('guest', ['only' => 'showLogin']);
    }

      public function login()
    {
        $credential = $this->validate(request(), [
            'email' => 'email',
            'password' => 'min:3'
        ]);
 
        if(Auth::attempt($credential)){
            return redirect()->route('home');
        }
        return back()
                ->withErrors(['sesion' =>trans('auth.failed')])
                ->withInput(request(['email']));


    }

    public function showLogin()
    {
        return view('Auth.Login');

    }
   public function LogOut(){
       Auth::logout();
       return redirect('/');
   }
}
