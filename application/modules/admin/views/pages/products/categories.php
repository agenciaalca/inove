<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('ProductCategoryController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$product_categories == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                    <table class="table table-striped" id="table-product-categories">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Categorias</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem categorias cadastrados.', 'Comece agora mesmo criando sua primeira categoria!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('ProductCategoryController', 'create')): ?>
    <?= loadModal('products/categories/create') ?>    
<?php endif ?>
<?php if (verifyPermission('ProductCategoryController', 'edit')): ?>
    <?= loadModal('products/categories/edit') ?>
<?php endif ?>
<?php if (verifyPermission('ProductCategoryController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>