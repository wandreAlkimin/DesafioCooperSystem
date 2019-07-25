@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-12 ">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="col-sm-8 col-md-8">
                            <div class="media">
                                <a class="thumbnail pull-left" style="margin-right: 10px" href="#"> <img class="media-object" src="{{ $produto->photo}}" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body" >
                                    <h4 class="media-heading">{{$produto->name}}</h4>
                                    <h5 class="media-heading"> {{$produto->description}}</h5>
                                    <span>Status: </span><span class="text-success"><strong>{{ $produto->stock_quantity }} em estoque</strong></span>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-2" style="text-align: center">


                            <div class="input-group">
                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-danger btn-number" onclick="removeQtdProduto({{ $order->id }},{{$produto->id}})" data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                </span>

                                <input type="text" id="quantity" name="quantity" class="form-control input-number" value="{{$order->quantity_products}}" min="1" max="{{ $produto->stock_quantity }}">

                                <span class="input-group-btn">
                                        <button type="button" class="btn btn-success btn-number" onclick="addQtdProduto({{ $order->id }},{{$produto->id}})" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                </span>
                            </div>


                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>R$ {{ number_format($produto->unitary_value, 2, ',', '.') }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>R$ {{ number_format($order->unitary_value, 2, ',', '.') }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>R$ {{ number_format($order->unitary_value, 2, ',', '.') }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a class="btn btn-default" href="/">Cancelar</a>
                        </td>
                        <td>
                            <a type="button" class="btn btn-success" href="/checkout/{{$order->id}}">Checkout <span class="glyphicon glyphicon-play"></span> </a>
                    </tr>
                    </tbody>
                </table>
            </div>



        </div> <!-- row.// -->
    </div>
    <!--container.//-->


    <form id="form-quantidade-produto" method="POST" action="{{ route('quantidade.produto') }}">
        {{ csrf_field() }}
        <input type="hidden" name="idOrder">
        <input type="hidden" name="idProduct">
        <input type="hidden" name="status">
    </form>


@endsection