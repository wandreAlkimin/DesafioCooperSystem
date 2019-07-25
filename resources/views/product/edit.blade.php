@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Adicionar produto</h3>
            <form class="form-horizontal" method="POST" action="{{ route('produtos.update', $dados->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                @include('product._form')

                <div class="form-group">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success" style="float: right">Atualizar produto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection