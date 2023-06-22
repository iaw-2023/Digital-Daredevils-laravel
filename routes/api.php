<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/categorias/{id}',[ApiController::class,'categoria']);
Route::get('/categorias/{id}/productos',[ApiController::class,'productosByCategoria']);
Route::get('/categorias',[ApiController::class,'categorias']);
Route::get('/productos/{id}',[ApiController::class,'producto']);
Route::get('/productos',[ApiController::class,'productos']);
Route::get('/productos/query/{query}',[ApiController::class,'productosByQuery']);

Route::middleware('auth0')->group(function () {
    Route::get('/pedidos/{id}', [ApiController::class, 'pedidosUsuario']);
    Route::get('/detallesPedido/{id}', [ApiController::class, 'detallesPedido']);
    Route::post('/pedidos',[ApiController::class,'storePedido']);
});