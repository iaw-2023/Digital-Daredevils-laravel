<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;

class ApiController extends Controller
{

    public function productos()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }

    public function categorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    public function storePedido(StorePedidoRequest $request)
    {
        $pedido = Pedido::create($request->validated());

        foreach ($request->input('productos') as $producto) {
            $pedido->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
        }

        return response()->json([
            'message' => 'Pedido creado exitosamente',
            'pedido' => $pedido,
        ], 201);
    }
}
