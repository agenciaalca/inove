<!-- Modal -->
<div class="modal fade" id="create" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adicionar</h4>
            </div>
            <div class="modal-body">
                <div id="message_add"></div>
                <form action="<?= base_url('painel/produtos/store') ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="order">Ordem</label>
                                <input type="number" name="order" class="form-control">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="userfile">Imagem em destaque</label>
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
                                <label for="categories">Selecione uma ou mais categorias</label>
                                <select name="category" class="form-control">
                                <?php $cat = ''; ?>
                                <?php foreach ($product_categories as $category): ?>
                                    <?php if ($cat != $category->title): ?>
                                        <?php if ($cat != ''): ?>
                                        </optgroup>
                                    <?php endif; ?>
                                    <?php echo '<optgroup label="'.$category->title.'">'; ?>
                                    <?php endif; ?>
                                    <option value="<?= $category->id?>"><?= $category->subtitle?></option>
                                    <?php $cat = $category->title; ?> 
                                <?php endforeach ?>
                                <?php if ($cat != ''): ?>
                                    </optgroup>
                                <?php endif; ?>
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Texto</label>
                                <textarea type="text" name="description" class="form-control" id="summernote" ></textarea>
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