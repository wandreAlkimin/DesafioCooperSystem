@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h2>Detalhes do pedido</h2><br>
            <div class="col-md-4">
                <img alt="User Pic" src="{{$pedido->product[0]->photo}}" class="img-responsive">
            </div>

            <div class="col-md-8">
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>Solicitante:</td>
                            <td>{{$pedido->requester}}</td>
                        </tr>
                        <tr>
                            <td>Endereço</td>
                            <td>
                                Rua: {{$pedido->address->street}}
                                <br> Numero: {{$pedido->address->number}}
                                <br> Bairro: {{$pedido->address->street}}
                                <br> Municipio: {{$pedido->address->county}}
                                <br> Cep: {{$pedido->address->cep}}
                            </td>
                        </tr>

                        <tr>
                            <td>Data do pedido:</td>
                            <td>{{$pedido->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Produto</td>
                            <td>
                                {{$pedido->product[0]->name}}
                                <br> {{$pedido->product[0]->description}}
                            </td>
                        </tr>
                        <tr>
                            <td>Quantidade</td>
                            <td>{{$pedido->quantity_products}}</td>
                        </tr>
                        <tr>
                            <td>Valor Unitario</td>
                            <td>{{$pedido->product[0]->unitary_value}}</td>
                        </tr>
                        <tr>
                            <td>Valor Total do pedido</td>
                            <td>{{$pedido->unitary_value}}</td>
                        </tr>
                        <tr>
                            <td>Depachante</td>
                            <td>{{$pedido->forwarding_agent}}</td>
                        </tr>
                        <tr>
                            <td>Situação do pedido</td>
                            <td>{{$pedido->status}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection