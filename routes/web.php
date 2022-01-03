<?php
namespace App\Http\Controllers;

use App\Models\PresupuestosAnual;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if(isset(Auth::user()->name))
        {
            return redirect()->route('home');
        }

    return view('welcome');
});

Route::get('/login', function () {
    if(isset(Auth::user()->name))
    {
        return redirect()->route('home');
    }

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

Route::get('mis_aportes', [SocioController::class, 'mis_aportes'])->name('mis_aportes');
Route::get('mis_procesos', [ProcesoSocioController::class, 'mis_procesos'])->name('mis_procesos');
Route::get('perfil', [SocioController::class, 'perfil'])->name('perfil');

Route::get('export_aportes_socios', [AportesSocioController::class, 'export'])->name('export_aportes_socios');
Route::get('export_procesos_socios', [ProcesoSocioController::class, 'export'])->name('export_procesos_socios');
Route::get('export_socios', [SocioController::class, 'export'])->name('export_socios');
Route::get('export_proveedores', [ProveedorController::class, 'export'])->name('export_proveedores');