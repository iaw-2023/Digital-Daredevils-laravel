@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">Nuevo producto</h5>
    <div class="card-body">
    @include('messages')
        <form action="/productos" method="POST">
            @csrf
            @include('/productos/form-producto')
        </form>
    </div>
    </div>    
</div>
@endsection