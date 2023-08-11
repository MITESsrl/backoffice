<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\User;
use App\Models\Chofer;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;



class PersonaController extends Controller
{
    public function RegistrarPersona(Request $request){

        $validation = Validator::make($request->all(),[
            'pnombre' => 'required|max:32',
            'ci' => 'required|min:8|max:8|unique:personas',
            'snombre' => 'max:32',
            'papellido' => 'required|max:32',
            'sapellido' => 'max:32',
            'rol' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails()){
            return view ("welcome",[
                "mensaje" => 'Datos incorrectos. Por favor, vuelva a ingresar.'
            ]); 
        }
        
        $rol = $request -> post('rol');
        if ($rol != 'administrador' && $rol != 'chofer' && $rol != 'funcionario'){
            return view ("welcome",[
                "mensaje" => 'Rol incorrecto'
            ]);
        }        

        if ($rol == 'administrador'){
            $usuario = $this -> crearUsuario($request);
            $idUsuario = $usuario -> id;
            $this -> crearPersona($idUsuario, $request);
            $this -> crearAdmin($idUsuario);         
        }

        if ($rol == 'chofer'){
            $validation = Validator::make($request->all(),[
                'matricula_camion' => 'required|max:7|min:7|unique:choferes',
            ]);
    
            if($validation->fails()){
                return view ("welcome",[
                    "mensaje" => 'Ingrese una matricula valida.'
                ]); 
            }
            $usuario = $this -> crearUsuario($request);
            $idUsuario = $usuario -> id;
            $this -> crearPersona($idUsuario, $request);
            $this -> crearChofer($idUsuario, $request);
        }
        if ($rol == 'funcionario'){
            $validation = Validator::make($request->all(),[
                'id_almacen' => 'required|max:2',
            ]);
    
            if($validation->fails()){
                return view ("welcome",[
                    "mensaje" => 'Ingrese almacen valida.'
                ]);
            }
            $usuario = $this -> crearUsuario($request);
            $idUsuario = $usuario -> id;
            $this -> crearPersona($idUsuario, $request);
            $this -> crearFuncionario($idUsuario, $request);
        }
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

    private function crearAdmin($idUsuario){
        $admin = new Admin();
        $admin -> id_persona = $idUsuario;
        $admin -> save();
        return $admin;
    }

    private function crearChofer($idUsuario, $request){
        $chofer = new Chofer();
        $chofer -> id_persona = $idUsuario;
        $chofer -> matricula_camion = $request -> post("matricula_camion");
        $chofer -> save();
        return $chofer;
    }

    private function crearFuncionario($idUsuario, $request){
        $funcionario = new Funcionario();
        $funcionario -> id_persona = $idUsuario;
        $funcionario -> id_almacen = $request -> post("id_almacen");
        $funcionario -> save();
        return $funcionario;
    }

}
