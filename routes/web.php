<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargaAcademicaController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\UsuarioController;

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
    return view('taskslist.index');
});
// Route::get('/cargas', [CargaAcademicaController::class, 'index']);
Route::apiResource('/cargaAcademica', CargaAcademicaController::class);
Route::get('/maestros', [MaestrosController::class,'index']);
Route::get('/Usuario', [UsuarioController::class,'index']);
Route::get('/Materias', [MateriasController::class,'index']);
Route::get('/NomMaterias', [MateriasController::class,'obtenerMaterias']);
Route::get('/maestrosSinAsignacion', [MaestrosController::class,'maestrosSinAsignatura']);
Route::post('/Materias', [MateriasController::class,'store']);