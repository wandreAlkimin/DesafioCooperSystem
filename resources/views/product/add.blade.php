@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Adicionar produto</h3>
            <form class="form-horizontal" method="POST" action="{{ route('produtos.store') }}">
                {{ csrf_field() }}
                @include('product._form')

                <div class="form-group">
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-success" style="float: right">Criar produto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection