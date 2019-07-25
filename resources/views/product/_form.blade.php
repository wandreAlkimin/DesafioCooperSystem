


        <div class="form-group">
            <label class="col-md-4 control-label">Nome do produto</label>
            <div class="col-md-6">
                <input name="name" placeholder="Nome do produto" value="{{ isset($dados->name) ?  $dados->name : null}}" class="form-control input-md"  type="text">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Descrição</label>
            <div class="col-md-6">
                <input name="description" value="{{ isset($dados->description) ?  $dados->description : null}}" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Valor:</label>
            <div class="col-md-6">
                <input name="unitary_value" value="{{ isset($dados->unitary_value) ?  $dados->unitary_value : null}}" class="form-control input-md" required="" type="text">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Quantidade em estoque:</label>
            <div class="col-md-6">
                <input name="stock_quantity" value="{{ isset($dados->stock_quantity) ?  $dados->stock_quantity : null}}" class="form-control input-md" required="" type="number">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Url da foto:</label>
            <div class="col-md-6">
                <input name="photo" value="{{ isset($dados->photo) ?  $dados->photo : null}}" class="form-control input-md" required="" type="text">
            </div>
        </div>
