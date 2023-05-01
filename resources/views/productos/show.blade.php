@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">{{$producto->imagen_ruta}}</h5>
    <div class="card-body">
        <h5 class="card-title">Modelo = {{$producto->modelo}}</h5>
        <p class="card-text">Talle = {{$producto->talle}}</p>
        <p class="card-text">Precio = {{$producto->precio}}</p>
        <p class="card-text">Marca = {{$producto->marca}}</p>
        <a href="/productos" class="btn btn-success">Go Back</a>

    </div>
    </div>
</div>
@endsection