<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ProductoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/crearUsuario', [PersonaController::class,"RegistrarPersona"]);


Route::get('/camiones', function () {
    return view('ingresoCamion');
});

Route::post('/camiones', [CamionController::class,"Crear"]);

Route::get('/almacenes', function () {
    return view('ingresoAlmacen');
});

Route::post('/almacenes', [AlmacenController::class,"Crear"]);

Route::get('/lotes', function () {
    return view('ingresoLote');
});

Route::post('/lotes', [LoteController::class,"CrearLote"]);

Route::get('/producto', function () {
    return view('ingresoProducto');
});

Route::post('/producto', [ProductoController::class,"Crear"]);


