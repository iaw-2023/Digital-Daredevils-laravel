@extends('layouts/app')

@section('content')
<div class="container">
  @include('messages')
  <h1 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center">
          <strong>{{ __('Categorías') }}</strong>
  </h1>

  <a href="/categorias/create" class="btn btn-dark btn-lg mb-3">Create</a>

  <table class="table text-white"">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
      <tr>
        <th scope="row">{{$categoria->id}}</th>
        <td>{{$categoria->nombre}}</td>
        <td>{{$categoria->descripcion}}</td>
        <td>
          <form action="/categorias/{{$categoria->id}}" method="POST">
              @method('DELETE')
              @csrf 
              <a href="/categorias/{{$categoria->id}}" class="btn btn-dark">View</a>
              <a href="/categorias/{{$categoria->id}}/edit" class="btn btn-dark">Edit</a>
              <button type="submit" class="btn botonColor">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection