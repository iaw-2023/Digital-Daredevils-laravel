<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\DetallesPedido;
use App\Models\Producto;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;

class ApiController extends Controller
{

    public function productos()
    {
        $productos = Producto::paginate(24);
        return $this->responseOrError($productos, 'Productos no encontrados');
    }

    public function productosByCategoria($id)
    {
        $this->validateId($id);
        $categoria = Categoria::find($id);
        if ($categoria){
            $productos = Producto::where('categoria_id', $id)->paginate(24);
            return $this->responseOrError($productos, 'Productos no encontrados para esa categoria');
        }
        else{
            return $this->responseOrError($categoria, 'Categoria no encontrada');
        }
    }

    public function productosByQuery($query)
    {
        $productos = Producto::where('modelo', 'LIKE', '%' . $query . '%')
            ->orWhere('marca', 'LIKE', '%' . $query . '%')
            ->paginate(24);
    
        return $this->responseOrError($productos, 'Productos no encontrados');
    }
    

    public function producto($id){
        $this->validateId($id);

        $producto = Producto::find($id);

        return $this->responseOrError($producto, 'Producto no encontrado');
    }

    public function categorias()
    {
        $categorias = Categoria::paginate(24);
        return $this->responseOrError($categorias, 'Categorias no encontradas');
    }

    public function categoria($id)
    {
        $this->validateId($id);
    
        $categoria = Categoria::find($id);
        
        return $this->responseOrError($categoria, 'Categoria no encontrada');
    }

    public function pedidosUsuario($email)
    {
        $pedidos = Pedido::where('cliente', $email)->paginate(24);
        
        return $this->responseOrError($pedidos, 'Pedidos no encontrados para ese email');
    }

    public function detallesPedido($pedido_id)
    {
        $detallesPedido = DetallesPedido::where('pedido_id', $pedido_id)->get();

        return $this->responseOrError($detallesPedido, '');
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

    private function validateId($id){
        if (!is_numeric($id)) {
            abort(404);
        }
    }
}