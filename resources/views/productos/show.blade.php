@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-5 offset-3">
        <h2 class="card-header">{{$producto->modelo}}</h2>
        <div class="card-body">
            <h4 class="card-text text-center">
                <img class="card-img-top img-fluid imagenesShow" src="{{$producto->imagen_ruta}}" alt="Imagen del producto" >
            </h4>
            <h5 class="card-text"> {{$producto->talle}}</h5>
            <h5 class="card-text"> {{$producto->precio}}</h5>
            <h5 class="card-text"> {{$producto->marca}}</h5>
            <h5 class="card-text"> {{$producto->categoria->nombre}}</h5>
            <h5 href="/productos" class="btn btn-dark">Go Back</h5>
        </div>
    </div>
</div>
@endsection