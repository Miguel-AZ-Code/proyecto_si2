<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CargoempleadoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialservicioController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TiponotaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
Route::resource('medidas', MedidaController::class)->names('admin.medidas');
Route::resource('marcas', MarcaController::class)->names('admin.marcas');
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
Route::resource('cargos', CargoController::class)->names('admin.cargos');
Route::resource('contratos', CargoempleadoController::class)->names('admin.contratos'); //       ojo
Route::resource('servicios', ServicioController::class)->names('admin.servicios');
Route::resource('materiales', MaterialController::class)->names('admin.materiales');
Route::resource('tiponotas',TiponotaController::class)->names('admin.tiponotas');
Route::resource('notas', NotaController::class)->names('admin.notas');
Route::resource('items', MaterialservicioController::class)->names('admin.items'); //   ojo
Route::resource('personas', PersonaController::class)->names('admin.personas');
Route::get('users/pdf',[App\Http\Controllers\UserController::class, 'pdf'])->name('users.pdf');

