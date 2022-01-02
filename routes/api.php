<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Rutas Usuarios
Route::get('usuarios', [UserController::class, 'list']);
Route::post('usuarios', [UserController::class, 'store']);
Route::put('usuarios', [UserController::class, 'update']);


//Rutas Plan Cuentas
Route::get('planes-cuenta', [PlanCuentaController::class, 'show']);
Route::post('planes-cuenta', [PlanCuentaController::class, 'store']);
Route::put('planes-cuenta', [PlanCuentaController::class, 'update']);

//Rutas Bancos
Route::get('bancos', [BancoController::class, 'show']);
Route::post('bancos', [BancoController::class, 'store']);
Route::put('bancos', [BancoController::class, 'update']);

//Rutas Aportes
Route::get('aportes', [AporteController::class, 'show']);
Route::post('aportes', [AporteController::class, 'store']);
Route::put('aportes', [AporteController::class, 'update']);

//Rutas Encargados
Route::get('encargados', [EncargadoController::class, 'show']);
Route::post('encargados', [EncargadoController::class, 'store']);
Route::put('encargados', [EncargadoController::class, 'update']);

//Rutas Presupuesto Anual
Route::get('presupuesto-anual', [PresupuestosAnualController::class, 'show']);
Route::post('presupuesto-anual', [PresupuestosAnualController::class, 'store']);
Route::put('presupuesto-anual', [PresupuestosAnualController::class, 'update']);

//Rutas Proveedores
Route::get('proveedores', [ProveedorController::class, 'show']);
Route::post('proveedores', [ProveedorController::class, 'store']);
Route::put('proveedores', [ProveedorController::class, 'update']);

//Rutas Ordenes Compra
Route::get('ordenes-compra', [OrdenCompraController::class, 'show']);
Route::post('ordenes-compra', [OrdenCompraController::class, 'store']);
Route::put('ordenes-compra', [OrdenCompraController::class, 'update']);

//Rutas Socios
Route::get('socios', [SocioController::class, 'list_all']);
Route::post('getSocios', [SocioController::class, 'show_get']);
Route::post('socios', [SocioController::class, 'store']);
Route::put('socios', [SocioController::class, 'update']);
Route::post('subir-imagen', [SocioController::class, 'upload_imagen']);
Route::post('subir-documento', [SocioController::class, 'upload_documento']);
Route::get('getSocio/{socio}', [SocioController::class, 'get_socio']);

//Rutas AportesSocios
Route::get('aportes-socios/{socio}/{type_user}/{user_id}', [AportesSocioController::class, 'show']);
Route::post('aportes-socios', [AportesSocioController::class, 'store']);
Route::put('aportes-socios', [AportesSocioController::class, 'update']);
Route::post('update-estado-aporte', [AportesSocioController::class, 'update_estado']);

//Rutas Procesos
Route::get('procesos/{type_user}/{user_id}', [ProcesoSocioController::class, 'show']);
Route::post('procesos', [ProcesoSocioController::class, 'store']);
Route::put('procesos', [ProcesoSocioController::class, 'update']);