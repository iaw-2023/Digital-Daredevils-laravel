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

Route::get('/categoria/{id}',[ApiController::class,'categoria']);
Route::get('/categorias',[ApiController::class,'categorias']);
Route::get('/producto/{id}',[ApiController::class,'producto']);
Route::get('/productos',[ApiController::class,'productos']);
Route::get('/storePedido',[ApiController::class,'storePedido']);