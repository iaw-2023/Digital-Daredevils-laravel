@extends('layouts/app')

@section('content')
<div class="container" > 
  @include('messages')
  <h1 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center">
    <strong>{{ __('Productos') }}  </strong>
  </h1>
  
  <a href="/productos/create" class="btn btn-dark btn-lg mb-3">Create</a>

  <table class="table text-white">
    <thead >
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
    <tbody >
      @foreach($productos as $producto)
      <tr>
        <th scope="row">{{$producto->id}}</th>
        <td>{{$producto->talle}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->modelo}}</td>
        <td>{{$producto->marca}}</td>
        <td>{{$producto->categoria_id}}</td>
        <td>
          <form action="/productos/{{$producto->id}}" method="POST">
              @method('DELETE')
              @csrf 
              <a href="/productos/{{$producto->id}}" class="btn btn-dark">View</a>
              <a href="/productos/{{$producto->id}}/edit" class="btn btn-dark">Edit</a>
              <button type="submit" class="btn botonColor">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection