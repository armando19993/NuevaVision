<?php
namespace App\Http\Controllers;

use App\Models\PresupuestosAnual;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('login', [UserController::class, 'login'] )->name('login');
Route::get('logout', [UserController::class, 'logout'] )->name('logout');


Route::get('usuarios', [HomeController::class, 'componente_vue_usuarios'])->name('usuarios');
Route::get('plan_cuentas', [PlanCuentaController::class, 'index'])->name('plan_cuentas');
Route::get('bancos', [BancoController::class, 'index'])->name('bancos');
Route::get('aportes', [AporteController::class, 'index'])->name('aportes');
Route::get('encargados', [EncargadoController::class, 'index'])->name('encargados');
Route::get('presupuesto-anual', [PresupuestosAnualController::class, 'index'])->name('presupuesto-anual');
Route::get('proveedores', [ProveedorController::class, 'index'])->name('proveedores');
Route::get('ordenes-compra', [OrdenCompraController::class, 'index'])->name('ordenes-compra');
Route::get('socios', [SocioController::class, 'index'])->name('socios');
Route::get('socios_tipo/{valor}', [SocioController::class, 'socios_tipo'])->name('socios_tipo');
Route::get('aportes-socios', [AportesSocioController::class, 'index'])->name('aportes_socios');
Route::get('procesos', [ProcesoSocioController::class, 'index'])->name('procesos');

Route::get('socios/listado', [SocioController::class, 'show']);