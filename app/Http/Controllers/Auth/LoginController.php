<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\abrhilSoft;
use Auth;

class LoginController extends Controller
{

    public function _construct(){
        $this ->middleware('guest', ['only' => 'showLogin']);
    }

      public function login()
    {
        $credential = $this->validate(request(), [
            'email' => 'email',
            'password' => 'min:3'
        ]);

        //return $credential;

        if(Auth::attempt($credential)){
            ///return 'Tu sesión ha retornado correctamente';
            return redirect()->route('dashboard');
        }
    //    return back()->withErrors(['sesion' => 'Estas credenciales no coinciden']);
    return back()
                ->withErrors(['sesion' =>trans('auth.failed')])
                ->withInput(request(['email']));


    }

    public function ShowLogin()
    {
        return view('auth.login');

    }
   public function LogOut(){
       Auth::logout();
       return redirect('/');
   }
}
