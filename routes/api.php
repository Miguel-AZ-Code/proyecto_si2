<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\MedidaController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\ServicioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rutas de autentificación
Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
// Route::apiResource('marcas', MarcaController::class);
// Route::apiResource('medidas', MedidaController::class);
// Route::apiResource('servicios', ServicioController::class);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [LoginController::class, 'logout']);
    // Servicios route
    Route::apiResource('servicios', ServicioController::class);
    // Marcas route
    Route::apiResource('marcas', MarcaController::class);
    // Medidas route
    Route::apiResource('medidas', MedidaController::class);
    // Proveedores route
    Route::apiResource('proveedores', ProveedorController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
