@extends('layouts/app')

@section('content')
<div class="container">
    <div class="card col-5 offset-3">
        <div class="card-header">
            Pedido #{{ $pedido->id }}
        </div>
        <div class="card-body">
            <div class="pedido-info">
                <span class="pedido-label">Cliente:</span>
                <span class="pedido-value">{{$pedido->cliente}}</span>
            </div>
            <div class="pedido-info">
                <span class="pedido-label">Fecha:</span>
                <span class="pedido-value">{{$pedido->fecha}}</span>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalPedido = 0;
                    @endphp
                    @foreach ($pedido->productos as $producto)
                        <tr>
                            <td>{{ $producto->modelo }}</td>
                            <td>{{ $producto->pivot->cantidad }}</td>
                            <td>{{ $producto->precio }}</td>
                        </tr>
                        @php
                            $totalPedido += $producto->pivot->cantidad * $producto->precio;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="pedido-info">
                <span class="pedido-label">Total del pedido:</span>
                <span class="pedido-value">${{$totalPedido}}</span>
            </div>
        </div>
    </div>
</div>
@endsection
