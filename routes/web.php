<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\MaterialeController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ProveedoreController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\ServicioController;
use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('usuarios', UserController::class)->names('users');
Route::resource('roles', RoleController::class)->names('roles');
Route::get('log', [ActivityLogController::class, 'index'])->name('activitylog');
Route::resource('clientes', ClienteController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('presupuestos', PresupuestoController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('informes', InformeController::class);
Route::resource('proyectos', ProyectoController::class);
Route::resource('facturas', FacturaController::class);
Route::resource('contratos', ContratoController::class);
Route::resource('documentos', DocumentoController::class);
Route::resource('proveedores', ProveedoreController::class);
Route::resource('materiales', MaterialeController::class);
Route::resource('entradas', EntradaController::class);
Route::resource('salidas', SalidaController::class);
