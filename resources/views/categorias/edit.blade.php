@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">Edit Categoria</h5>
    <div class="card-body">
    @include('messages')
        <form action="/categorias/{{$categoria->id}}" method="POST">
            @csrf
            @method('PUT')
            @include('/categorias/form-categoria')
        </form>
    </div>
    </div>    
</div>
@endsection