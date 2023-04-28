@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
    <h5 class="card-header">Add Categoria</h5>
    <div class="card-body">
    @include('messages')
        <form action="/categorias" method="POST">
            @csrf
            <div class="mb-3">
                <label  class="form-label">Talle</label>
                <input type="text" name="talle" class="form-control @error('talle') is-invalid @enderror" value="{{old('talle')}}">
                @error('talle')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label  class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{old('precio')}}">
                @error('precio')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
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
                <label  class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{old('modelo')}}">
                @error('modelo')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label  class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{old('marca')}}">
                @error('marca')
                    <span class="tex-danger">
                    <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class ="mb-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
    </div>    
</div>
@endsection