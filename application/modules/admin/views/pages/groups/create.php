<form action="<?= base_url('painel/grupos/store') ?>">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="title">Nome do grupo</label>
                <input type="text" name="title" class="form-control">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    <span class="btn-label"><i class="fa fa-check"></i></span>Salvar
                </button> 
                <a href="<?= $this->agent->referrer() ?>" class="btn btn-danger waves-effect waves-light">Cancelar</a>
            </div>
        </div>
    </div>
</form>