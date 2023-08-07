<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class PersonaController extends Controller
{
    public function RegistrarPersona(Request $request){

        $validation = Validator::make($request->all(),[
            'pnombre' => 'required|max:32',
            'ci' => 'required|min:8|max:8|unique:personas',
            'snombre' => 'max:32',
            'papellido' => 'required|max:32',
            'sapellido' => 'max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails())
            return view ("welcome",[
                "mensaje" => 'Ha ocurrido un error, revise los campos xfa'
            ]);;

        $usuario = $this -> crearUsuario($request);
        $idUsuario = $usuario -> id;
        
        $this -> crearPersona($idUsuario, $request);
        return view ("welcome",[
            "mensaje" => 'Bienvenido'
        ]);

    }

    private function crearUsuario($request){
        $user = new User();
        $user -> email = $request -> post("email");
        $user -> password = Hash::make($request -> post("password"));   
        $user -> save();
        return $user;
    }

    private function crearPersona($idUsuario, $request){
        $persona = new Persona();
        $persona -> id = $idUsuario;
        $persona -> ci = $request -> post("ci");
        $persona -> pri_nomb = $request -> post("pnombre");
        $persona -> seg_nomb = $request -> post("snombre");
        $persona -> pri_ape = $request -> post("papellido");
        $persona -> seg_ape = $request -> post("sapellido");
        $persona -> save();
        return $persona;

    }

}
