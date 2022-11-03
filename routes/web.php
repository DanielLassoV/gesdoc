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

// Modulo clientes
Route::middleware('auth')->get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');

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

// Modulo TipoDocumento
Route::middleware('auth')->get('/tipo_documento', [TipoDocumentoController::class, 'index'])->name('tipoDocumento.index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');