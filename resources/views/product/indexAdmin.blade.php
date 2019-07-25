@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="/admin/produtos/create" class="btn btn-primary">Adicionar Produto</a>
        <hr>
        <div class="row">
        @if(!empty($results))
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
                                    <div class="price-wrap h5">
                                        R$ {{ number_format($registro->unitary_value, 2, ',', '.') }}
                                    </div>
                                    <a onclick="deleteProduct()" class="btn btn-danger" >Deletar</a>
                                    <a href="{{ route('produtos.show', $registro->id) }}" class="btn btn-primary" style="float: right">Editar</a>
                                </div> <!-- bottom-wrap.// -->

                            </figure>
                        </div> <!-- col // -->
                    @endif



                @endforeach
            @endif


        </div> <!-- row.// -->
    </div>
    <!--container.//-->
    @if(!empty($registro))
    <form id=deleteProduct method="POST" action="{{ route('produtos.destroy', $registro->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    @endif

@endsection
