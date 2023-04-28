@extends('layouts/app')

@section('content')
<div class="container">
    @include('messages')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categorias as $categoria)
    <tr>
      <th scope="row">{{$categoria->id}}</th>
      <td>{{$categoria->imagen_ruta}}</td>
      <td>{{$categoria->nombre}}</td>
      <td>{{$categoria->descripcion}}</td>
      <td>
        <form action="/categorias/{{$categoria->id}}" method="POST">
            @method('DELETE')
            @csrf 
            <a href="/categorias/{{$categoria->id}}" class="btn btn-success">View</a>
            <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-success">Edit</a>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection