@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">{{$categoria->imagen_ruta}}</h5>
    <div class="card-body">
        <h5 class="card-title">Nombre = {{$categoria->nombre}}</h5>
        <p class="card-text">Descripcion = {{$categoria->descripcion}}</p>
        <a href="/categorias" class="btn btn-success">Go Back</a>
    </div>
    </div>
</div>
@endsection