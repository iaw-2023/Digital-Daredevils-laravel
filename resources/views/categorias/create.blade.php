@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">Nueva categoría</h5>
    <div class="card-body">
    @include('messages')
        <form action="/categorias" method="POST">
            @csrf
            @include('/categorias/form-categoria')
        </form>
    </div>
    </div>    
</div>
@endsection