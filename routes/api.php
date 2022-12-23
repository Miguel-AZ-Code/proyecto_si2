<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\MedidaController;
use App\Http\Controllers\Api\ProveedorController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\ContratoController;
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
// Route::post('register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post("/signup",[AuthController::class,"signup"]);
// Route::apiResource('marcas', MarcaController::class);
// Route::apiResource('medidas', MedidaController::class);
// Route::apiResource('servicios', ServicioController::class);
Route::post("/documentos",[ClienteController::class,"postDocumento"]);


//TODO: RUTAS PROTEGIDAS POR SANCTUM
Route::group(['middleware'=>'auth:sanctum'],function () {
    Route::post("/logout",[AuthController::class,"logout"]);
    Route::get("/contracto",[ClienteController::class,"getContratos"]);
    Route::get("/documento",[ClienteController::class,"getDocumento"]);
    Route::post("/ObtenerProyecto",[ClienteController::class,"ObtenerProyecto"]);
    Route::post("/ObtenerInforme",[ClienteController::class,"ObtenerInforme"]);
    Route::post("/ObtenerPresupuesto",[ClienteController::class,"ObtenerPresupuesto"]);
    Route::post("/ObtenerServicio",[ClienteController::class,"ObtenerServicio"]);

    Route::get("/CountContrato",[ClienteController::class,"CountContrato"]);
    Route::get("/CountDocumentos",[ClienteController::class,"CountDocumentos"]);
     Route::get("/CountInformes",[ClienteController::class,"CountInformes"]);


});


/* Route::group(['middleware' => ['auth:sanctum']], function () {
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
 */
