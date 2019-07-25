@extends('layouts.app')

@section('content')

    <div class="container">
        <hr>
        <div class="row">

            @foreach($results as $registro)
                @if($registro->available == 1)
                <div class="col-md-4" style="margin-bottom: 20px">
                    <figure class="card card-product">

                        <div class="img-wrap"><img src="{{ $registro->photo}}"></div>

                        <figcaption class="info-wrap">
                            <h4 class="title">{{ $registro->name }}</h4>
                            <p class="desc">{{ $registro->description }}</p>
                            <div class="rating-wrap">
                                <div class="label-rating">{{ $registro->stock_quantity }} em estoque</div><br>
                            </div> <!-- rating-wrap.// -->
                        </figcaption>

                        <div class="bottom-wrap">

                            @if($registro->stock_quantity > 0)
                                <a href="{{ route('novo.pedido', $registro->id) }}" class="btn btn-primary" style="float: right">Fazer pedido</a>
                                <div class="price-wrap h5">
                                    R$ {{ number_format($registro->unitary_value, 2, ',', '.') }}
                                </div> <!-- price-wrap.// -->
                            @else
                                <p style="color: red"> PRODUTO INDISPONIVEL </p>
                            @endif


                        </div> <!-- bottom-wrap.// -->

                    </figure>
                </div> <!-- col // -->
                @endif
            @endforeach

        </div> <!-- row.// -->
    </div>
    <!--container.//-->

@endsection
