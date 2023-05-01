<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

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
}
