<form action="<?= base_url('painel/usuarios/store') ?>">

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="passconf">Repetir senha</label>
                <input type="password" name="passconf" class="form-control">
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