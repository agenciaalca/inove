<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('ModuleCategoryController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" type="button" class="btn btn-laranja">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$module_categories == 0): ?>    
        <div class="row">
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-striped" id="table-module-categories">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Permissão</th>
                            <th></th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem módulos cadastrados.', 'Comece agora mesmo criando seu primeiro módulo!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('ModuleCategoryController', 'create')): ?>
    <?= loadModal('modules/categories/create') ?>
<?php endif ?>

<?php if (verifyPermission('ModuleCategoryController', 'edit')): ?>
    <?= loadModal('modules/categories/edit') ?>
<?php endif ?>

<?php if (verifyPermission('ModuleCategoryController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>