<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('GroupController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button"  class="btn btn-laranja">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$groups == 0): ?>    
        <div class="row">
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-striped" id="table-groups">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Grupos</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem grupos cadastrados.', 'Comece agora mesmo criando seu primeiro grupo!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('UserController', 'create')): ?>
    <?= loadModal('groups/create') ?>
<?php endif ?>
<?php if (verifyPermission('UserController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>