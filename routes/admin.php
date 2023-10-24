<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IncidenciaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmergenciaController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\SubcategoriaController;
use App\Models\Emergencia;
use App\Models\Estatu;
use App\Models\Incidencia;
use App\Models\Statu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// DB::listen(function($query){
//     echo "<pre> {$query->sql} </pre>";

// });

// dd(User::first()->toArray());

/* Route::prefix('administrador')->group(function () {
    Route::resource('/categorias', CategoriaController::class);
    Route::resource('/subcategorias', SubcategoriaController::class);
    Route::resource('/estatus', StatuController::class);
    Route::resource('/emergencias', EmergenciaController::class);

}); */

Route::get('/', [HomeController::class, 'index'])/* ->middleware('can:admin.home') */->name('admin.home');

Route::resource('categorias', CategoriaController::class)/* ->except('show') */->names('admin.categorias');

Route::resource('subcategorias', SubcategoriaController::class)/* ->except('show') */->names('admin.subcategorias');

Route::resource('estatus', StatuController::class)/* ->except('show') */->names('admin.estatus');

Route::resource('emergencias', EmergenciaController::class)/* ->except('show') */->names('admin.emergencias');

Route::get('incidencias/asignar/{incidencia}', [IncidenciaController::class, 'asignar'])->name('admin.incidencias.asignar');

Route::post('incidencias/{incidencia}/asignar', [IncidenciaController::class, 'asignarIncidencia'])->name('admin.incidencias.asignarIncidencia');

Route::resource('incidencias', IncidenciaController::class)/* ->except('show') */->names('admin.incidencias');

// Route::resource('modos', ModoController::class)->except('show')->names('admin.modos');
// Route::resource('estatus', EstatuController::class)->except('show')->names('admin.estatus');

// Route::get('incidencias/{incidencia}/atender',  [IncidenciaController::class,  'atender'])->name('admin.incidencias.atender');
// Route::put('incidencias/{incidencia}/asignar',  [IncidenciaController::class,  'asignar'])->name('admin.incidencias.asignar');
// Route::get('incidencias/{incidencia}/resolver', [IncidenciaController::class, 'resolver'])->name('admin.incidencias.resolver');
// Route::resource('incidencias', IncidenciaController::class)->names('admin.incidencias');

// Route::resource('mis-incidencias', MisIncidenciaController::class)->except('show')->names('admin.mis-incidencias');
// Route::resource('mis-asignadas', MisAsignadasController::class)->except('show')->names('admin.mis-asignadas');

// Route::resource('cargas', CargaController::class)->names('admin.cargas');
// Route::get('cargas/{carga}/download', [CargaController::class, 'download'])->name('admin.cargas.download');