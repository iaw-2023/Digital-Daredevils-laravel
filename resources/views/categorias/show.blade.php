@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">{{$categoria->imagen}}</h5>
    <div class="card-body">
        <h5 class="card-title">{{$categoria->nombre}}</h5>
        <p class="card-text">{{$categoria->descripcion}}</p>

    </div>
    </div>
</div>
@endsection