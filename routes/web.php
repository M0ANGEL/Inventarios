<?php

use App\Http\Controllers\admin\BodegasController;
use App\Http\Controllers\admin\CambioController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\Equpipos\EquiposController;
use App\Http\Controllers\graficos\GraficoActivosController;
use App\Http\Controllers\graficos\GraficoNoActivosController;
use App\Http\Controllers\Historial\HistorialController;
use App\Http\Controllers\indicadores\hallazgo\MesController;
use App\Http\Controllers\Regente\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistroEq\RegistroController;
use App\Http\Controllers\Salida\SalidaController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/users', UserController::class)
/* ->middleware(['can:admin_usuarios']) */;
Route::resource('/cambio', CambioController::class)->except('delete','show');
Route::resource('/roles', RoleController::class)/* ->middleware(['can:crear_roles']) */;
Route::resource('/permissions', PermissionController::class)/* ->middleware(['can:crear_permisos']) */;
Route::resource('/bodegas', BodegasController::class)
->except('show')/* ->middleware(['can:crear_permisos']) */;


/* Eequipos */
Route::resource('/equipos', EquiposController::class);
/* Empresas alquiler */
Route::resource('/clientes', EmpresaController::class);
/* registro equipos cliente */
Route::resource('/entrega', RegistroController::class);
Route::get('/entrega/search', [RegistroController::class, 'search'])->name('entrega.search');
/* retiro de equipos */
Route::resource('/retiros', SalidaController::class);
/* historial */
Route::resource('/historial', HistorialController::class);
/*                     graficos                */
Route::resource('/graficoActivos', GraficoActivosController::class);
Route::resource('/grafcosInactivos', GraficoNoActivosController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
