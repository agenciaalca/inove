<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('ProductController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$products == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                    <table class="table table-striped" id="table-products">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Produto</th>
                            <th>Categoria</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem produtos cadastrados.', 'Comece agora mesmo criando seu primeiro produto!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('ProductController', 'create')): ?>
    <?= loadModal('products/create') ?>    
<?php endif ?>
<?php if (verifyPermission('ProductController', 'edit')): ?>
    <?= loadModal('products/edit') ?>
<?php endif ?>
<?php if (verifyPermission('ProductController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>