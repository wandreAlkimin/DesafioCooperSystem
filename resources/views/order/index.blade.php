@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Pedidos realizados</h2>
        <p></p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Solicitante</th>
                <th>Data</th>
                <th>Produto</th>
                <th>Status</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                @if(isset($pedido->address_id))
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->requester}}</td>
                        <td>{{$pedido->created_at}}</td>
                        <td>{{$pedido->product[0]->name}}</td>
                        <td>{{$pedido->status}}</td>
                        <td> <a class="label label-success" href="pedido/{{$pedido->id}}">Visualizar</a> </td>
                    </tr>
                @endif
            @endforeach

            </tbody>
        </table>
    </div>



@endsection