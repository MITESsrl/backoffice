<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Camion;
use App\Models\Hacia;


class CamionController extends Controller
{
    public function Crear(Request $request){
        $validation = Validator::make($request->all(),[
            'matricula' => 'required|max:7|min:7|unique:camiones',
            'modelo' => 'required|max:32',
            'cantMaxProductos' => 'max:7'
        ]); 

        if($validation->fails())
            return view ("ingresoCamion",[
                "mensaje" => 'Ha ocurrido un error, revise los campos'
            ]);  

        $camion = new Camion();
        $camion -> matricula = $request -> post('matricula');
        $camion -> modelo = $request -> post('modelo');
        $camion -> cant_max_productos = $request -> post('cantMaxProductos');
        $camion -> save();

        return view ("ingresoCamion",[
            "mensaje" => 'Se ha guardado con éxito'
        ]); 
    }

    public function DestinoAlmacen(Request $request){
                $validation = Validator::make($request->all(),[
                'matricula' => 'required|max:7|min:7|exists:camiones',
                'id' => 'required|max:2|exists:almacenes'
            ]); 
    
            if($validation->fails())
                return view ("ingresoDestino",[
                    "mensaje" => 'Ha ocurrido un error, revise los campos'
                ]); 

            $destinoAlmacen = new Hacia();
            $destinoAlmacen -> matricula_camion = $request -> post('matricula');
            $destinoAlmacen -> id_almacen = $request -> post('id');
            $destinoAlmacen -> save();

            return view ("ingresoDestino",[
                "mensaje" => 'Se ha guardado con éxito'
            ]); 


    }

    
}
