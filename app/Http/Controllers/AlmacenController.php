<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Almacen;


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

}
