<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class RegistroController extends Controller
{

    /**
     * Crea un usuario
     * @author Vanessa Herrera
     *
     * @return redirect
     */

    public function guardarRegistro(Request $request){

        $validator = Validator::make( $request->all(),
                [
                    'name' => 'required|max:255',
                    'apellido' => 'required|max:255',
                    'identificacion' => 'required|max:30',
                    'direccion' => 'required|max:150',
                    'email' => 'required|email|max:255|unique:usuario',
                    'password' => 'required|min:10|confirmed',                               
                ]
            );

        if($validator->fails()){    
            return redirect()->back()->withErrors($validator)->withInput();
        }else{ 

            $obj_user = new User;
            $obj_user->login = $request->email;
            $obj_user->name = $request->name;
            $obj_user->apellido = $request->apellido;
            $obj_user->identificacion = $request->identificacion;
            $obj_user->direccion_envio = $request->direccion;
            $obj_user->telefono = $request->telefono;
            $obj_user->email = $request->email;
            $obj_user->password =bcrypt($request->password);
            $obj_user->save();

            return redirect('iniciar_sesion');
        }

        

    }
}