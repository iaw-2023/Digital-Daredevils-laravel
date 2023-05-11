@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-5 offset-3">
        <h2 class="card-header">{{$pedido->cliente}}</h2>
        <div class="card-body">
        <h2 class="card-header">{{$pedido->fecha}}</h2>
            <h4 class="card-text text-center">
                <img class="card-img-top img-fluid imagenesShow" src="{{$pedido->producto->imagen_ruta}}" alt="Imagen del producto" >
            </h4>
            <h2 class="card-header">{{$pedido->productos->cliente}}</h2>
            <h5 class="card-text"> {{$pedido->precio}}</h5>
            <h5 class="card-text"> {{$pedido->marca}}</h5>
            <h5 class="card-text"> {{$pedido->categoria->nombre}}</h5>
            <h5 href="/productos" class="btn btn-dark">Go Back</h5>
        </div>
    </div>
</div>
@endsection