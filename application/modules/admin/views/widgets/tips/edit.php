<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar</h4>
      </div>
      <div class="modal-body">
        <div id="message_edit"></div>
        <form action="<?= base_url('painel/dicas/update') ?>">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="title">Título da dica</label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="title" id="title" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="content">Descrição</label>
                <div name="content" id="description" class="form-control summernote">
                </div>
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