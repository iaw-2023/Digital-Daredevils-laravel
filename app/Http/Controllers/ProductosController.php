<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Http\Controllers\Controller;

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
        Producto::create($request->validated());
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
        $producto->update($request->validated());
        return back()->with('success','Producto modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return back()->with('success','Producto removido con éxito');
    }
}