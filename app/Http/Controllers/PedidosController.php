<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Http\Controllers\Controller;

class PedidosController extends Controller
{
    public function __construct(){
        $this->middleware('can:pedidos.index')->only('index');
        $this->middleware('can:pedidos.view')->only('show');

    }
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