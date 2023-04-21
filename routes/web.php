<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DetallesPedidosController;
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
    return view('welcome');
});
Route::get('/pedidos', [PedidosController::class, 'index']);
Route::get('/productos', [ProductosController::class, 'index']);
Route::get('/categorias', [CategoriasController::class, 'index']);
Route::get('/detallesPedidos', [DetallesPedidosController::class, 'index']);