@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <form class="form-horizontal" method="POST" action="{{ route('pedido.store') }}" >
         {{ csrf_field() }}
            <fieldset>

                <!-- Form Name -->
                <legend>Finalize seu pedido</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Nome do Proprietário">Nome</label>
                    <div class="col-md-4">
                        <input name="requester" placeholder="Nome do solicitante" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Rua">Endereço</label>
                    <div class="col-md-4">
                        <input id="street" name="street" placeholder="Rua" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Numero">Número</label>
                    <div class="col-md-4">
                        <input name="number" placeholder="100" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Bairro">Bairro</label>
                    <div class="col-md-4">
                        <input id="neighborhood" name="neighborhood" placeholder="Bairro" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Cidade">Cidade</label>
                    <div class="col-md-4">
                        <input name="city" placeholder="Cidade" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Estado">Estado</label>
                    <div class="col-md-4">
                        <input name="uf" placeholder="Estado" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Estado">Municipio</label>
                    <div class="col-md-4">
                        <input name="county" placeholder="Municipio" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Estado">CEP</label>
                    <div class="col-md-4">
                        <input name="cep" placeholder="CEP" class="form-control input-md" required="" type="text">

                    </div>
                </div>

                <input type="hidden" name="idpedido" value="{{$idPedido}}">

                <div class="form-group">
                    <div class="col-md-8">
                    <button type="submit" class="btn btn-success" style="float: right">Finalizar pedido</button>
                </div>
                </div>

            </fieldset>


        </form>

    </div>

@endsection
