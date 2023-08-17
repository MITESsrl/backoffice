<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Producto;


class ProductoController extends Controller
{
    public function Crear(Request $request){
        $validation = Validator::make($request->all(),[
            'codigo' => 'required|max:4|min:1|unique:productos',
            'id_lote' => 'required|exists:lotes,id'
        ]);

        if($validation->fails()){
            return view ("ingresoProducto",[
                "mensaje" => 'Datos incorrectos. Por favor, vuelva a ingresar.'
            ]);
        } 

        $producto = new Producto();
        $producto -> codigo = $request -> post('codigo');       
        $producto -> id_lote = $request -> post('id_lote');
        $producto -> save();

        return view ("ingresoProducto",[
            "mensaje" => 'Se ha ingresado correctamente'
        ]);

    }
}


