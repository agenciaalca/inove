<!-- Modal -->
<div class="modal fade" id="alterar-senha" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Meus dados</h4>
            </div>

            <div class="modal-body">
                <div id="message_profile"></div>
                <form action="<?= base_url('painel/perfil/update') ?>">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Seu nome</label>
                                <input type="text" name="name" class="form-control" value="<?= $this->session->userdata('user')->name; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Seu e-mail</label>
                                <input type="email" name="email" class="form-control" value="<?= $this->session->userdata('user')->email; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="password">Nova senha</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="passconf">Repetir nova senha</label>
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
                                <button type="button" data-dismiss="modal" class="btn btn-danger waves-effect waves-light">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>