<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\DetallesPedido;
use App\Models\Producto;
use App\Models\Pedido;
use App\Http\Requests\StorePedidoRequest;
use Illuminate\Http\Request;
use MercadoPago\SDK;
use MercadoPago\Payment;
use MercadoPago\Payer;

class ApiController extends Controller
{
    public function procesarPagoMercadoPago(Request $request){
        require __DIR__ . '/../../../vendor/autoload.php';
        SDK::setAccessToken($_ENV['MERCADOPAGO_ACCESS_TOKEN']);
        $contents = $request->input();
        
        $payment = new Payment();
        $payment->transaction_amount = $contents['transaction_amount'];
        $payment->token = $contents['token'];
        $payment->installments = $contents['installments'];
        $payment->payment_method_id = $contents['payment_method_id'];
        $payment->issuer_id = $contents['issuer_id'];
        $payer = new Payer();
        $payer->email = $contents['payer']['email'];
        $payer->identification = array(
            "type" => $contents['payer']['identification']['type'],
            "number" => $contents['payer']['identification']['number']
        );
        $payment->payer = $payer;
        $payment->save();
        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        return json_encode($response);
    }

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

    public function pedidosUsuario(Request $request)
    {
        $userEmail = $request->input('email');
        $pedidos = Pedido::where('cliente', $userEmail)->paginate(24);
        
        return $this->responseOrError($pedidos, 'Pedidos no encontrados para ese email');
    }

    public function detallesPedido($pedido_id)
    {
        
        $detallesPedido = DetallesPedido::where('pedido_id', $pedido_id)->join('productos', 'detalles_pedidos.producto_id', '=', 'productos.id')->get();

        return $this->responseOrError($detallesPedido, '');
    }



    public function storePedido(StorePedidoRequest $request)
    {
        try {
            $pedidoData = $request->validated();
            
            $userEmail = $request->input('email');
            $pedidoData['cliente'] = $userEmail;

            $pedido = Pedido::create($pedidoData);
            
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