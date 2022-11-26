<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\TipoDocumentoController;

Route::get('/', function () {
    return view('auth/login');
});

// Modulo empleado
Route::middleware('auth')->get('/empleados', [EmpleadosController::class, 'index'])->name('empleados.index');
Route::middleware('auth')->get('/empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::middleware('auth')->post('/empleados/store', [EmpleadosController::class, 'store'])->name('empleados.store');
Route::middleware('auth')->get('/empleados/{dep}/edit', [EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::middleware('auth')->get('/empleados/{id}/delete', [EmpleadosController::class, 'delete'])->name('empleados.delete');
Route::middleware('auth')->patch('/empleados/{dep}/update', [EmpleadosController::class, 'update'])->name('empleados.update');

// Modulo clientes
Route::middleware('auth')->get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::middleware('auth')->get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
Route::middleware('auth')->post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
Route::middleware('auth')->get('/clientes/{dep}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::middleware('auth')->get('/clientes/{id}/delete', [ClientesController::class, 'delete'])->name('clientes.delete');
Route::middleware('auth')->patch('/clientes/{dep}/update', [ClientesController::class, 'update'])->name('clientes.update');


// Modulo departamento          
Route::middleware('auth')->get('/departamento', [DepartamentoController::class, 'index'])->name('departamento.index');
Route::middleware('auth')->get('/departamento/create', [DepartamentoController::class, 'create'])->name('departamento.create');
Route::middleware('auth')->post('/departamento/store', [DepartamentoController::class, 'store'])->name('departamento.store');
Route::middleware('auth')->get('/departamento/{dep}/edit', [DepartamentoController::class, 'edit'])->name('departamento.edit');
Route::middleware('auth')->get('/departamento/{id}/delete', [DepartamentoController::class, 'delete'])->name('departamento.delete');
Route::middleware('auth')->patch('/departamento/{dep}/update', [DepartamentoController::class, 'update'])->name('departamento.update');
// Modulo documento
Route::middleware('auth')->get('/documento', [DocumentoController::class, 'index'])->name('documento.index');
Route::middleware('auth')->get('/documento/registrar', [DocumentoController::class, 'create'])->name('documento.create');
Route::middleware('auth')->post('/documento/store', [DocumentoController::class, 'store'])->name('documento.store');
Route::middleware('auth')->get('/documento/{dep}/edit', [DocumentoController::class, 'edit'])->name('documento.edit');
Route::middleware('auth')->get('/documento/{id}/delete', [DocumentoController::class, 'delete'])->name('documento.delete');
Route::middleware('auth')->patch('/documento/{dep}/update', [DocumentoController::class, 'update'])->name('documento.update');
Route::middleware('auth')->get('/documento/download/{file?}', [DocumentoController::class, 'download'])->name('documento.download');

 

// Modulo TipoDocumento
Route::middleware('auth')->get('/tipo_documento', [TipoDocumentoController::class, 'index'])->name('tipoDocumento.index');
Route::middleware('auth')->get('/tipo_documento/registrar', [TipoDocumentoController::class, 'create'])->name('tipoDocumento.create');
Route::middleware('auth')->post('/tipo_documento/store', [TipoDocumentoController::class, 'store'])->name('tipoDocumento.store');
Route::middleware('auth')->get('/tipo_documento/{dep}/edit', [TipoDocumentoController::class, 'edit'])->name('tipoDocumento.edit');
Route::middleware('auth')->get('/tipo_documento/{id}/delete', [TipoDocumentoController::class, 'delete'])->name('tipoDocumento.delete');
Route::middleware('auth')->patch('/tipo_documento/{dep}/update', [TipoDocumentoController::class, 'update'])->name('tipoDocumento.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');