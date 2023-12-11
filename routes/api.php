<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DeptosController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\MateriasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listaalumnos', [AlumnoController::class, 'index2']);

Route::get('listadeptos', [DeptosController::class, 'index2']);

Route::get('listamaterias', [MateriasController::class, 'index2']);

// index horarios
Route::get('horarios', [HorariosController::class, 'obtenerDatos']);

Route::get('pp', [HorariosController::class, 'obtenerPP']);

Route::post('store', [HorariosController::class, 'crearHorario']);

