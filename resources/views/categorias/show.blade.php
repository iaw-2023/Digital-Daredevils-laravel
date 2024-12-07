@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-5 offset-3">
        <h2 class="card-header">{{$categoria->nombre}}</h2>
        <div class="card-body">
            <h4 class="card-text text-center">
                <img class="card-img-top img-fluid imagenesShow" src="{{$categoria->imagen_ruta}}" alt="Imagen de la categoria" width="300" height="300">
            </h4>
            <h5 class="card-text">{{$categoria->descripcion}}</h5>
            <a href="/categorias" class="btn btn-dark">Go Back</a>
        </div>
    </div>
</div>
@endsection