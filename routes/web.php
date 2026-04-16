<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/admin');
});

Auth::routes();
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Auth::routes();

//rutas para configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')->middleware('auth');
Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('admin.configuracion.create')->middleware('auth');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')->middleware('auth');
Route::get('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('admin.configuracion.show')->middleware('auth');
Route::get('/admin/configuraciones/{id}/edit', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')->middleware('auth');
Route::put('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuracion.update')->middleware('auth');
Route::delete('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('admin.configuracion.destroy')->middleware('auth');

//rutas para roles

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');


//rutas para usuarios

Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

//rutas para clientes

Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('admin.clientes.index')->middleware('auth');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('admin.clientes.create')->middleware('auth');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('admin.clientes.store')->middleware('auth');
Route::get('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('admin.clientes.show')->middleware('auth');
Route::get('/admin/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit')->middleware('auth');
Route::put('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update')->middleware('auth');
Route::delete('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy')->middleware('auth');

//rutas para clientes

Route::get('/admin/prestamos', [App\Http\Controllers\PrestamoController::class, 'index'])->name('admin.prestamos.index')->middleware('auth');
Route::get('/admin/prestamos/create', [App\Http\Controllers\PrestamoController::class, 'create'])->name('admin.prestamos.create')->middleware('auth');
Route::get('/admin/prestamos/cliente/{id}', [App\Http\Controllers\PrestamoController::class, 'obtenerCliente'])->name('admin.prestamos.cliente.obtenerCliente')->middleware('auth');

Route::post('/admin/prestamos/create', [App\Http\Controllers\PrestamoController::class, 'store'])->name('admin.prestamos.store')->middleware('auth');
Route::get('/admin/prestamos/{id}', [App\Http\Controllers\PrestamoController::class, 'show'])->name('admin.prestamos.show')->middleware('auth');
Route::get('/admin/prestamos/{id}/edit', [App\Http\Controllers\PrestamoController::class, 'edit'])->name('admin.prestamos.edit')->middleware('auth');
Route::put('/admin/prestamos/{id}', [App\Http\Controllers\PrestamoController::class, 'update'])->name('admin.prestamos.update')->middleware('auth');
Route::delete('/admin/prestamos/{id}', [App\Http\Controllers\PrestamoController::class, 'destroy'])->name('admin.prestamos.destroy')->middleware('auth');
Route::get('/admin/prestamos/contratos/{id}', [App\Http\Controllers\PrestamoController::class, 'contratos'])->name('admin.prestamos.contratos')->middleware('auth');

//rutas para pagos

Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth');
Route::get('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pagos.create')->middleware('auth');
Route::get('/admin/pagos/cliente/{id}', [App\Http\Controllers\PagoController::class, 'obtenerCliente'])->name('admin.pagos.cliente.obtenerCliente')->middleware('auth');
Route::get('/admin/pagos/create/{id}', [App\Http\Controllers\PagoController::class, 'cargar_datos'])->name('admin.pagos.cargar_datos')->middleware('auth');
Route::get('/admin/pagos/prestamos/cliente/{id}', [App\Http\Controllers\PagoController::class, 'cargar_prestamos_cliente'])->name('admin.pagos.cargar_prestamos_cliente')->middleware('auth');
Route::get('/admin/pagos/prestamos/create/{id}', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pagos.create')->middleware('auth');

Route::post('/admin/pagos/create/{id}', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth');
Route::get('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'show'])->name('admin.pagos.show')->middleware('auth');
Route::get('/admin/pagos/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('admin.pagos.edit')->middleware('auth');
Route::put('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('admin.pagos.update')->middleware('auth');
Route::delete('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth');
Route::get('/admin/pagos/comprobante/{id}', [App\Http\Controllers\PagoController::class, 'comprobante'])->name('admin.pagos.comprobante')->middleware('auth');

