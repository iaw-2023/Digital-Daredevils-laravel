@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">Nueva categoría</h5>
    <div class="card-body">
    @include('messages')
        <form action="/categorias" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Imagen</label>
                <input type="text" name="imagen_ruta" class="form-control @error('imagen_ruta') is-invalid @enderror" value="{{old('imagen_ruta')}}">
                @error('imagen_ruta')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{old('nombre')}}">
                @error('nombre')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Descripcion</label>
                <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{old('descripcion')}}">
                @error('descripcion')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class ="mb-3">
                <a href="/categorias" class="btn btn-light">Go Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    </div>    
</div>
@endsection