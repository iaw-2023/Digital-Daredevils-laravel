<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use SplFileInfo;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('can:productos.index')->only('index');
        $this->middleware('can:productos.edit')->only('edit','update');
        $this->middleware('can:productos.create')->only('create','store');
        $this->middleware('can:productos.view')->only('show');
        $this->middleware('can:productos.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $productos = Producto::paginate(12);
        return view('productos/index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductoRequest $request)
    {
        $requestData = $request->validated();
        if(isset($requestData['imagen_ruta'])){
            $fileInfo = new SplFileInfo($requestData['imagen_ruta']);
            $realPath = $fileInfo->getRealPath();
            $cloudinaryResponse=cloudinary()->upload($realPath,['folder'=>'Productos']);
            $imageUrl = $cloudinaryResponse->getSecurePath();
            $imagePublicId = $cloudinaryResponse->getPublicId();
        }
        
        Producto::create([
         'talle'=>$requestData['talle'],
         'precio'=>$requestData['precio'],
         'imagen_ruta'=>$imageUrl,
         'public_id'=>$imagePublicId,
         'modelo'=>$requestData['modelo'],
         'marca'=>$requestData['marca'],
         'categoria_id'=>$requestData['categoria_id'],
         
        ]);
        return back()->with('success','Producto creado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $producto = Producto::find($id);

        if (!$producto) {
            abort(404);
        }

        return view('productos.show')->with('producto', $producto);
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $producto = Producto::find($id);

        if (!$producto) {
            abort(404);
        }

        return view('productos/edit')->with('producto',$producto);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $requestData = $request->validated();
        $imageUrl = $producto['imagen_ruta'];
        $imagePublicId = $producto['public_id'];
        
        if(isset($requestData['imagen_ruta'])){
            if(!is_null($imagePublicId)){
                Cloudinary::destroy($imagePublicId);
            }
        
            $fileInfo = new SplFileInfo($requestData['imagen_ruta']);
            $realPath = $fileInfo->getRealPath();
            $cloudinaryResponse=cloudinary()->upload($realPath,['folder'=>'Productos']);
            $imageUrl = $cloudinaryResponse->getSecurePath();
            $imagePublicId = $cloudinaryResponse->getPublicId();
           }
        
        $producto->update([
            'imagen_ruta'=>$imageUrl,
            'public_id'=>$imagePublicId,
            'talle'=>$requestData['talle'],
            'precio'=>$requestData['precio'],
            'modell'=>$requestData['modelo'],
            'marca'=>$requestData['marca'],
            'categoria_id'=>$requestData['categoria_id'],
         
        ]);
        return back()->with('success','Producto modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $imagePublicId = $producto['public_id'];
        if(!is_null($imagePublicId)){
            Cloudinary::destroy($imagePublicId);
        }
        $producto->delete();
        return back()->with('success','Producto removido con éxito');
    }
}