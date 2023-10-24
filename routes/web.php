<?php

use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\StatuController;
use App\Http\Controllers\EmergenciaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Statu;
use App\Models\Incidencia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [HomeController::class,'index'])->name('home')->middleware('auth');

// Route::resource('/incidencias', IncidenciaController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/incidencias/mis-asignadas', [IncidenciaController::class, 'misAsignadas'])->name('incidencias.mis-asignadas');
    Route::resource('/incidencias', IncidenciaController::class);
});


Route::get('subcategorias/{categoria}', [IncidenciaController::class, 'getSubcategorias']);


/* Route::prefix('administrador')->group(function () {
    Route::resource('/categorias', CategoriaController::class);
    Route::resource('/subcategorias', SubcategoriaController::class);
    Route::resource('/estatus', StatuController::class);
    Route::resource('/emergencias', EmergenciaController::class);

}); */
