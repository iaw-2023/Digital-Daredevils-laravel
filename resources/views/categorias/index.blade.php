@extends('layouts/app')

@section('content')
<div class="container">
  @include('messages')
  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
          {{ __('Categorías') }}
  </h2>

  <a href="/categorias/create" class="btn btn-light btn-lg mb-3">Create</a>

  <div class="row mb-3">
    <div class="col-md-12">
      <div style="height: 2px; background: repeating-linear-gradient(to right, red, red 250px, white 250px, white 500px); border-radius: 7px;"></div>
    </div>
  </div>

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