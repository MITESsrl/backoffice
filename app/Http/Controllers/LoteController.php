<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Lote;

class LoteController extends Controller
{
   public function CrearLote(Request $request){
        $validation = Validator::make($request->all(),[
            'matricula' => 'required|exists:camiones',
        ]);

        if($validation->fails()){
            return view ("ingresoLote",[
                "mensaje" => 'Datos incorrectos. Por favor, vuelva a ingresar.'
            ]); 
        }
        $lote = new Lote();
        $lote -> matricula_camion = $request -> post('matricula');
        $lote -> save();

        return view ("ingresoLote",[
            "mensaje" => 'Se ha creado con éxito'
        ]); 


   } 

   


}
