<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('CustomerController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$customers == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                <table class="table table-striped" id="table-customers">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Clientes</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem clientes cadastrados.', 'Comece agora mesmo criando seu primeiro cliente!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('CustomerController', 'create')): ?>
    <?= loadModal('customers/create') ?>    
<?php endif ?>
<?php if (verifyPermission('CustomerController', 'edit')): ?>
    <?= loadModal('customers/edit') ?>
<?php endif ?>
<?php if (verifyPermission('CustomerController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>