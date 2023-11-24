<?php

use Illuminate\Support\Facades\Route;

//Controladores

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ControlMinimoController;
use App\Http\Controllers\PlaneacionController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\RHController;
use App\Http\Controllers\EquiposFisicosController;
use App\Http\Controllers\CentroDatosController;
use App\Http\Controllers\RedesTelController;
use App\Http\Controllers\EquipoComputoController;
use App\Http\Controllers\TecnologiaMovilController;
use App\Http\Controllers\SisAppServController;
use App\Http\Controllers\BDController;

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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bloqueado', [UsuarioController::class, 'bloqueado'])->name('bloqueado');
Route::get('/resetpassword', [UsuarioController::class, 'resetpassword'])->name('usuarios.resetcontraseña');
Route::patch('/restablecer-contraseña/{id}', [UsuarioController::class, 'updatePassword'])->name('usuarios.updatePassword');
Route::get('/aniosPlaneacion', [PlaneacionController::class, 'anios'])->name('planeacion.anios');
Route::get('/aniosGestion', [GestionController::class, 'anios'])->name('gestion.anios');
Route::get('/aniosRH', [RHController::class, 'anios'])->name('rh.anios');
Route::get('/aniosEF', [EquiposFisicosController::class, 'anios'])->name('equiposfisicos.anios');
Route::get('/aniosCD', [CentroDatosController::class, 'anios'])->name('centrodatos.anios');
Route::get('/aniosRT', [RedesTelController::class, 'anios'])->name('redtel.anios');
Route::get('/aniosEC', [EquipoComputoController::class, 'anios'])->name('equipocomputo.anios');
Route::get('/aniosTM', [TecnologiaMovilController::class, 'anios'])->name('tecmovil.anios');
Route::get('/aniosSAS', [SisAppServController::class, 'anios'])->name('sisappserv.anios');
Route::get('/aniosBD', [BDController::class, 'anios'])->name('bd.anios');

//Rutas para la generación de reportes
//Route::get('/generar-reporteGeneral', [HomeController::class, 'generarPDF']);
Route::get('/generar-reporte', [PlaneacionController::class, 'generarPDF'])->name('reporte.generar');
Route::get('/generar-reporteG', [GestionController::class, 'generarPDF'])->name('reporte.generarG');
Route::get('/generar-reporteR', [RHController::class, 'generarPDF'])->name('reporte.generarR');
Route::get('/generar-reporteE', [EquiposFisicosController::class, 'generarPDF'])->name('reporte.generarE');
Route::get('/generar-reporteC', [CentroDatosController::class, 'generarPDF'])->name('reporte.generarC');
Route::get('/generar-reporteRT', [RedesTelController::class, 'generarPDF'])->name('reporte.generarRT');
Route::get('/generar-reporteEC', [EquipoComputoController::class, 'generarPDF'])->name('reporte.generarEC');
Route::get('/generar-reporteT', [TecnologiaMovilController::class, 'generarPDF'])->name('reporte.generarT');
Route::get('/generar-reporteS', [SisAppServController::class, 'generarPDF'])->name('reporte.generarS');
Route::get('/generar-reporteB', [BDController::class, 'generarPDF'])->name('reporte.generarB');

Route::get('/generar-pdfCompleto2/{year}/{semester}/{nombreImagen?}', [HomeController::class, 'generarPDF'])->name('generarPDF');
Route::post('/guardar-imagen-linea', [HomeController::class, 'guardarImagenLinea'])->name('guardarImagenLinea');
Route::post('/eliminar-imagen-linea', [HomeController::class, 'eliminarImagenLinea'])->name('eliminarImagenLinea'); 

Route::get('/generar-pdfCompleto2/{nombreImagen?}', [PlaneacionController::class, 'generarPDF'])->name('generarPDF');
Route::post('/guardar-imagen-linea', [PlaneacionController::class, 'guardarImagenLinea'])->name('guardarImagenLinea');
Route::post('/eliminar-imagen-linea', [PlaneacionController::class, 'eliminarImagenLinea'])->name('eliminarImagenLinea');

//Rutas para la filtración de información por semestre
Route::post('/filtrar-informacion', [PlaneacionController::class, 'filtrar'])->name('filtrar.informacion');
Route::post('/filtrar-informacionG', [GestionController::class, 'filtrar'])->name('filtrar.informacionG');
Route::post('/filtrar-informacionR', [RHController::class, 'filtrar'])->name('filtrar.informacionR');
Route::post('/filtrar-informacionE', [EquiposFIsicosController::class, 'filtrar'])->name('filtrar.informacionE');
Route::post('/filtrar-informacionC', [CentroDatosController::class, 'filtrar'])->name('filtrar.informacionC');
Route::post('/filtrar-informacionRT', [RedesTelController::class, 'filtrar'])->name('filtrar.informacionRT');
Route::post('/filtrar-informacionEC', [EquipoComputoController::class, 'filtrar'])->name('filtrar.informacionEC');
Route::post('/filtrar-informacionT', [TecnologiaMovilController::class, 'filtrar'])->name('filtrar.informacionT');
Route::post('/filtrar-informacionS', [SisAppServController::class, 'filtrar'])->name('filtrar.informacionS');
Route::post('/filtrar-informacionB', [BDController::class, 'filtrar'])->name('filtrar.informacionB');

Route::get('download/{idControlMinimo}', [PlaneacionController::class, 'download'])->name('download');
Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('soporte', SoporteController::class);
    Route::resource('controlminimo', ControlMinimoController::class);
    Route::resource('planeacion', PlaneacionController::class);
    Route::resource('gestion', GestionController::class);
    Route::resource('rh', RHController::class);
    Route::resource('equipos-fisicos', EquiposFisicosController::class);
    Route::resource('centro-datos', CentroDatosController::class);
    Route::resource('red-tel', RedesTelController::class);
    Route::resource('equipo-computo', EquipoComputoController::class);
    Route::resource('tec-movil', TecnologiaMovilController::class);
    Route::resource('sis-app-serv', SisAppServController::class);
    Route::resource('bd', BDController::class);
});
