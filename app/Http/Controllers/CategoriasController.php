<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    public function __construct(){
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.edit')->only('edit','update');
        $this->middleware('can:categorias.create')->only('create','store');
        $this->middleware('can:categorias.view')->only('show');
        $this->middleware('can:categorias.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::paginate(24);
        return view('categorias/index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        Categoria::create($request->validated());
        return back()->with('success','Categoria creada con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $categoria = Categoria::find($id);

        if (!$categoria) {
            abort(404);
        }

        return view('categorias/show')->with('categoria',$categoria);
    }

    public function edit($id)
    {
        if (!is_numeric($id)) {
            abort(404);
        }

        $categoria = Categoria::find($id);

        if (!$categoria) {
            abort(404);
        }

        return view('categorias/edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->validated());
        return back()->with('success','Categoría modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return back()->with('success','Categoría removida con éxito');
    }
}