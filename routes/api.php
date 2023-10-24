<?php

use App\Http\Controllers\SubcategoriaController;
use App\Models\Categoria;
use App\Models\Subcategoria;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/subcategorias/{categoria}', [SubcategoriaController::class, 'getByCategoria']);

Route::get('/categorias/{categoria}/subcategorias', function (Request $request, Categoria $categoria) {
    $subcategorias = Subcategoria::where('categoria_id', $categoria->id)->get();
    return $subcategorias;
});