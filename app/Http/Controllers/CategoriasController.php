<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use SplFileInfo;

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
       $imageUrl = null;
       $imagePublicId = null;
       $requestData = $request->validated();
       if(isset($requestData['imagen_ruta'])){
        $fileInfo = new SplFileInfo($requestData['imagen_ruta']);
        $realPath = $fileInfo->getRealPath();
        $cloudinaryResponse=cloudinary()->upload($realPath,['folder'=>'Categorias']);
        $imageUrl = $cloudinaryResponse->getSecurePath();
        $imagePublicId = $cloudinaryResponse->getPublicId();
       }

       Categoria::create([
        'imagen_ruta'=>$imageUrl,
        'public_id'=>$imagePublicId,
        'nombre'=>$requestData['nombre'],
        'descripcion'=>$requestData['descripcion'],
       ]);
       
      
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
        $requestData = $request->validated();
        $imageUrl = $categoria['imagen_ruta'];
        $imagePublicId = $categoria['public_id'];

        if(isset($requestData['imagen_ruta'])){
            if(!is_null($imagePublicId)){
                Cloudinary::destroy($imagePublicId);
            }
            $fileInfo = new SplFileInfo($requestData['imagen_ruta']);
            $realPath = $fileInfo->getRealPath();
            $cloudinaryResponse=cloudinary()->upload($realPath,['folder'=>'Categorias']);
            $imageUrl = $cloudinaryResponse->getSecurePath();
            $imagePublicId = $cloudinaryResponse->getPublicId();
           }
        $categoria->update([
            'imagen_ruta'=>$imageUrl,
            'public_id'=>$imagePublicId,
            'nombre'=>$requestData['nombre'],
            'descripcion'=>$requestData['descripcion'],
        ]);
    
        return back()->with('success','Categoría modificada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $imagePublicId = $categoria['public_id'];
        if(!is_null($imagePublicId)){
            Cloudinary::destroy($imagePublicId);
        }
        $categoria->delete();
        return back()->with('success','Categoría removida con éxito');
    }
}