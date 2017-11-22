<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('TipController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$tips == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                    <table class="table table-striped" id="table-tips">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Dicas</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem dicas cadastrados.', 'Comece agora mesmo criando sua primeira dica!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('TipController', 'create')): ?>
    <?= loadModal('tips/create') ?>    
<?php endif ?>
<?php if (verifyPermission('TipController', 'edit')): ?>
    <?= loadModal('tips/edit') ?>
<?php endif ?>
<?php if (verifyPermission('TipController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>