<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\abrhilSoft;
use Auth;
use Dotenv\Validator;
use mail;
class LoginUserController extends Controller
{
 
    // public function RegistroCliente(Request $request)
    // {
    //     $validacion = Validator ::make($request->all(),
    //         [
    //            'name' => 'required|max:50',
    //             'email' => 'email|unique:abrhilSoft',
    //             'password' => 'required|min:3'
    //         ]);
    //     if ($validacion->fails())
    //     {
    //         return 'Tu sesión ha retornado correctamente';
    //     }

    //     $user = new abrhilSoft();
    //     $user->vchNombre = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     return 'Completado Exitoso';

    // }
}
