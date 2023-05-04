@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
        <h5 class="card-header">{{$producto->modelo}}</h5>
        <div class="card-body">
            <img class="card-img-top img-fluid" src="{{$producto->imagen_ruta}}" alt="Imagen del producto" style="max-width: 300px;max-height: 300px">
            <p class="card-text">Talle = {{$producto->talle}}</p>
            <p class="card-text">Precio = {{$producto->precio}}</p>
            <p class="card-text">Marca = {{$producto->marca}}</p>
            <p class="card-text">Categoria = {{$producto->categoria_id}}</p>
            <a href="/productos" class="btn btn-success">Go Back</a>
        </div>
    </div>
</div>
@endsection