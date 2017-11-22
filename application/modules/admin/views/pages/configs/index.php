<form action="<?= base_url('painel/configuracoes/update') ?>">

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">Nome da empresa</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $configs->title ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="subtitle">Slogan</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="<?= $configs->subtitle ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= $configs->email ?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="phone">Telefone</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="<?= $configs->phone ?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="cell">Whatsapp</label>
                <input type="tel" name="cell" id="cell" class="form-control" value="<?= $configs->cell ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="address">Endereço completo</label>
                <input type="text" name="address" id="address" class="form-control" value="<?= $configs->address ?>">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="city">Cidade</label>
                <input type="text" name="city" id="city" class="form-control" value="<?= $configs->city ?>">
            </div>
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="zipcode">CEP</label>
                <input type="tel" name="zipcode" id="zipcode" class="form-control" value="<?= $configs->zipcode ?>">
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="description">Descrição para o Google</label>
                <input type="text" name="description" id="description" class="form-control" value="<?= $socials->description ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="keywords">Palavras-chave</label>
                <input type="text" name="keywords" id="keywords" class="form-control" value="<?= $socials->keywords ?>">
            </div>
        </div>
    </div>
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