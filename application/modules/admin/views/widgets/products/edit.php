<!-- Modal -->
<div class="modal fade" id="edit" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar</h4>
            </div>
            <div class="modal-body">
                <div id="message_edit"></div>
                <form action="<?= base_url('painel/produtos/update') ?>">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="hidden" name="id" id="id">
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label for="order">Ordem</label>
                                <input type="number" name="order" id="order" class="form-control">
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="userfile">Imagem em destaque</label>
                                <input type="file" name="userfile" class="form-control edit">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        <img id="img_edit" src="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="categories">Selecione uma ou mais categorias</label>
                                <select name="category" id="categories" class="form-control">
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
                                <textarea type="text" name="description" class="form-control summernote" id="description"></textarea>
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