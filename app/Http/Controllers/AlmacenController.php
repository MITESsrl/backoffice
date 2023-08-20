<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Almacen;
use App\Models\Almacena;



class AlmacenController extends Controller
{
    public function Crear(Request $request){
        $validation = Validator::make($request->all(),[
            'departamento' => 'required|max:14',
            'direccion' => 'max:25|required'
        ]); 

        if($validation->fails())
            return view ("ingresoAlmacen",[
                "mensaje" => 'Ha ocurrido un error, revise los campos'
            ]); 

        $almacen = new Almacen();
        $almacen -> departamento = $request -> post('departamento');
        $almacen -> direccion = $request -> post('direccion');
        $almacen -> save();

        return view ("ingresoAlmacen",[
            "mensaje" => 'Se ha guardado con éxito'
        ]); 
    }

    public function Almacenar(Request $request){
        $validation = Validator::make($request->all(),[
            'id' => 'required|max:2|exists:almacenes',
            'codigo' => 'max:4|required|exists:productos'
        ]); 

        if($validation->fails())
            return view ("ingresoAlmacena",[
                "mensaje" => 'Ha ocurrido un error, revise los campos'
            ]); 

        $almacena = new Almacena();
        $almacena -> id_almacen = $request -> post('id');
        $almacena -> codigo_producto = $request -> post('codigo');
        $almacena -> save();

        return view ("ingresoAlmacena",[
            "mensaje" => 'Se ha guardado con éxito'
        ]); 

    }

}
