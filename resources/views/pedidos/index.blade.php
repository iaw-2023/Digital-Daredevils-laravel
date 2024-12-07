@extends('layouts/app')

@section('content')

<div class="container" > 
  @include('messages')
  <h1 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center">
    <strong>{{ __('Pedidos') }}  </strong>
  </h1>

  <table class="table text-white">
    <thead >
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cliente</th>
        <th scope="col">Fecha</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody >
      @foreach($pedidos as $pedido)
      <tr>
        <th scope="row">{{$pedido->id}}</th>
        <td>{{$pedido->cliente}}</td>
        <td>{{$pedido->fecha}}</td>
        <td>
          <form action="/pedidos/{{$pedido->id}}" method="GET">
              @csrf 
              <a href="/pedidos/{{$pedido->id}}" class="btn btn-dark">View</a>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="pagination-container">
    {{ $pedidos->links() }}
  </div>
</div>
@endsection