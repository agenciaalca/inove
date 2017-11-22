<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('ModuleController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" type="button" class="btn btn-laranja">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$modules == 0): ?>    
        <div class="row">
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-striped" id="table-modules">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Permissãos</th>
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

<?php if (verifyPermission('ModuleController', 'create')): ?>
    <?= loadModal('modules/create', ['categories' => $categories] ) ?>
<?php endif ?>

<?php if (verifyPermission('ModuleController', 'edit')): ?>
    <?= loadModal('modules/edit', ['categories' => $categories] ) ?>
<?php endif ?>

<?php if (verifyPermission('ModuleController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>