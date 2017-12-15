<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar</h4>
            </div>

            <div class="modal-body">
                <div id="message_add"></div>
                <form action="<?= base_url('painel/clientes/store') ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Nome da empresa</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Nome do representante</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="position">Cargo do representante</label>
                                <input type="text" name="position" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="order">Ordem</label>
                                <input type="number" name="order" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="userfile1">Imagem</label>
                                <input type="file" name="userfile" class="form-control create">
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-12">
                            <img id="img_create" src="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="text">Texto</label>
                                <textarea type="text" name="text" class="form-control" id="summernote" ></textarea>
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