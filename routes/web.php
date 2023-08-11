<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\CamionController;

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


