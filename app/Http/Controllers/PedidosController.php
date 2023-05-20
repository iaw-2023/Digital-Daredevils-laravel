<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Controllers\Controller;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pedidos = Pedido::paginate(12);
        return view('pedidos/index')->with('pedidos', $pedidos);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        if (!$pedido->exists) {
            abort(404);
        }
        return view('pedidos/show')->with('pedido',$pedido);
    }
}