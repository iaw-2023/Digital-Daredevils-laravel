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
        $productos = Producto::paginate(100);
        return $this->responseOrError($productos, 'Productos no encontrados');
    }

    public function producto($id){
        $producto = Producto::find($id);
        return $this->responseOrError($producto, 'Producto no encontrado');
    }

    public function categorias()
    {
        $categorias = Categoria::paginate(100);
        return $this->responseOrError($categorias, 'Categorias no encontradas');
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        return $this->responseOrError($categoria, 'Categoria no encontrada');
    }


    public function storePedido(StorePedidoRequest $request)
    {
        try {
            $pedido = Pedido::create($request->validated());

            foreach ($request->input('productos') as $producto) {
                $pedido->productos()->attach($producto['id'], ['cantidad' => $producto['cantidad']]);
            }

            return response()->json([
                'message' => 'Pedido creado exitosamente',
                'pedido' => $pedido,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo crear el pedido'], 500);
        }
    }
    
    private function responseOrError($recoveredDataObject, $message){
        if ($recoveredDataObject) {
            return response()->json($recoveredDataObject, 200);
        } else {
            return response()->json(['error' => $message], 404);
        }
    }
}
