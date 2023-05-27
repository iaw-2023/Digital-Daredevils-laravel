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
        $pedidos = Pedido::paginate(24);
        return view('pedidos/index')->with('pedidos', $pedidos);
    }

    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $pedido = Pedido::find($id);

        if (!$pedido) {
            abort(404);
        }

        return view('pedidos/show')->with('pedido', $pedido);
    }
}