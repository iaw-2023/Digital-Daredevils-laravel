@extends('layouts/app')

@section('content')
<div class="container">
    @include('messages')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
    </h2>
    <a href="/productos/create" class="btn btn-success">Create</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Talle</th>
      <th scope="col">Precio</th>
      <th scope="col">Imagen</th>
      <th scope="col">Modelo</th>
      <th scope="col">Marca</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    <tr>
      <th scope="row">{{$producto->id}}</th>
      <td>{{$producto->talle}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->imagen_ruta}}</td>
      <td>{{$producto->modelo}}</td>
      <td>{{$producto->marca}}</td>
      <td>
        <form action="/productos/{{$producto->id}}" method="POST">
            @method('DELETE')
            @csrf 
            <a href="/productos/{{$producto->id}}" class="btn btn-success">View</a>
            <a href="/productos/{{$producto->id}}/edit" class="btn btn-success">Edit</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection