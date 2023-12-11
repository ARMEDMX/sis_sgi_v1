<?php


use App\Http\Controllers\CarreraController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\HorariosMateriasController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\PeriodosController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PersonalPlazasController;
use App\Http\Controllers\PlazasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ReticulaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DeptosController;
use App\Http\Controllers\LugaresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/viewmodal', function () {
    return view('viewmodal');
})->name("modal");

// Route::get('/formulario/{nombre:?}', function (string $nombre = "Desconocido") {
//     return view('frm/frm1',['nombre'=> $nombre]);
// })->name("frm1");


// IndexControllerSSEUD ALUMNOS

// Route::get('/index',[AlumnoController::class,'index'])->name("alumnos.index");

// Route::get('/alumnos.create',[AlumnoController::class,'create'])->name("alumnos.create");

// Route::post('/alumnos.store',[AlumnoController::class,'store'])->name("alumnos.store");

// Route::get('/alumnos.show/{alumno}',[AlumnoController::class,'show'])->name("alumnos.show");

// Route::get('/alumnos.destroy/{alumno}',[AlumnoController::class,'destroy'])->name("alumnos.destroy");

// Route::get('/alumnos.edit/{alumno}', [AlumnoController::class, 'edit'])->name("alumnos.edit");

// Route::post('/alumnos.update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update');

// Route::post('/alumnos/preview-image', 'AlumnoController@previewImage')->name('alumnos.previewImage');

Route::resource('alumnos', AlumnoController::class);


// IndexControllerSSEUD DEPARTAMENTOS

// Route::get('/index.deptos',[DeptosController::class,'index'])->name("deptos.index");

// Route::get('/deptos.create',[DeptosController::class,'create'])->name("deptos.create");

// Route::post('/deptos.store',[DeptosController::class,'store'])->name("deptos.store");

// Route::get('/deptos.show/{deptos}',[DeptosController::class,'show'])->name("deptos.show");

// Route::get('/deptos.destroy/{deptos}',[DeptosController::class,'destroy'])->name("deptos.destroy");

// Route::get('/deptos.edit/{deptos}', [DeptosController::class, 'edit'])->name("deptos.edit");

// Route::post('/deptos.update/{deptos}', [DeptosController::class, 'update'])->name('deptos.update');

Route::resource('deptos', DeptosController::class)->parameters(['deptos'=>'deptos']);

// IndexControllerSSEUD LUGARES

// Route::get('/index.lugares',[LugaresController::class,'index'])->name("lugares.index");

// Route::get('/lugares.create',[LugaresController::class,'create'])->name("lugares.create");

// Route::post('/lugares.store',[LugaresController::class,'store'])->name("lugares.store");

// Route::get('/lugares.show/{Lugares}',[LugaresController::class,'show'])->name("lugares.show");

// Route::get('/lugares.destroy/{Lugares}',[LugaresController::class,'destroy'])->name("lugares.destroy");

// Route::get('/lugares.edit/{Lugares}', [LugaresController::class, 'edit'])->name("lugares.edit");

// Route::post('/lugares.update/{Lugares}', [LugaresController::class, 'update'])->name('lugares.update');

Route::resource('lugares', LugaresController::class)->parameters(['lugares'=>'Lugares']);


// IndexControllerSSEUD CARRERAS

// Route::get('/index.carreras',[CarreraController::class,'index'])->name("carreras.index");

// Route::get('/carreras.create',[CarreraController::class,'create'])->name("carreras.create");

// Route::post('/carreras.store',[CarreraController::class,'store'])->name("carreras.store");

// Route::get('/carreras.show/{carrera}',[CarreraController::class,'show'])->name("carreras.show");

// Route::get('/carreras.destroy/{carrera}',[CarreraController::class,'destroy'])->name("carreras.destroy");

// Route::get('/carreras.edit/{carrera}', [CarreraController::class, 'edit'])->name("carreras.edit");

// Route::post('/carreras.update/{carrera}', [CarreraController::class, 'update'])->name('carreras.update');

Route::resource('carreras', CarreraController::class);


// IndexControllerSSEUD RETICULAS

// Route::get('/index.reticulas',[ReticulaController::class,'index'])->name("reticulas.index");

// Route::get('/reticulas.create',[ReticulaController::class,'create'])->name("reticulas.create");

// Route::post('/reticulas.store',[ReticulaController::class,'store'])->name("reticulas.store");

// Route::get('/reticulas.show/{reticula}',[ReticulaController::class,'show'])->name("reticulas.show");

// Route::get('/reticulas.destroy/{reticula}',[ReticulaController::class,'destroy'])->name("reticulas.destroy");

// Route::get('/reticulas.edit/{reticula}', [ReticulaController::class, 'edit'])->name("reticulas.edit");

// Route::post('/reticulas.update/{reticula}', [ReticulaController::class, 'update'])->name('reticulas.update');

Route::resource('reticulas', ReticulaController::class);

// IndexControllerSSEUD MATERIAS

// Route::get('/index.materias',[MateriasController::class,'index'])->name("materias.index");

// Route::get('/materias.create',[MateriasController::class,'create'])->name("materias.create");

// Route::post('/materias.store',[MateriasController::class,'store'])->name("materias.store");

// Route::get('/materias.show/{materia}',[MateriasController::class,'show'])->name("materias.show");

// Route::get('/materias.destroy/{materia}',[MateriasController::class,'destroy'])->name("materias.destroy");

// Route::get('/materias.edit/{materia}', [MateriasController::class, 'edit'])->name("materias.edit");

// Route::post('/materias.update/{materia}', [MateriasController::class, 'update'])->name('materias.update');

Route::resource('materias', MateriasController::class);

// IndexControllerSSEUD PERIODOS

Route::resource('periodos', PeriodosController::class);

// IndexControllerSSEUD PUESTOS

Route::resource('puestos', PuestosController::class);

// IndexControllerSSEUD PLAZAS

Route::resource('plazas', PlazasController::class);

// IndexControllerSSEUD PERSONAL

Route::resource('personal', PersonalController::class);

// IndexControllerSSEUD PERSONAL PLAZAS

Route::resource('personalplazas', PersonalPlazasController::class);

// IndexControllerSSEUD HORARIO

Route::resource('horarios', HorariosController::class);

// IndexControllerSSEUD HORARIOSMATERIAS

Route::resource('horariosmaterias', HorariosMateriasController::class);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
