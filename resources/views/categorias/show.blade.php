@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
        <h5 class="card-header">{{$categoria->nombre}}</h5>
        <div class="card-body">
            <img class="card-img-top img-fluid" src="{{$categoria->imagen_ruta}}" alt="Imagen de la categoria" style="max-width: 300px;max-height: 300px">
            <p class="card-text">Descripcion = {{$categoria->descripcion}}</p>
            <a href="/categorias" class="btn btn-success">Go Back</a>
        </div>
    </div>
</div>
@endsection