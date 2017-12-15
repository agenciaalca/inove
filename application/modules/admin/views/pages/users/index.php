<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('UserController', 'create')): ?>
            <a href="<?= base_url('painel/usuarios/novo') ?>" type="button" class="btn btn-laranja">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$users == 0): ?>    
        <div class="row">
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-striped" id="table-users">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Usuários</th>
                            <th></th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem usuarios cadastrados.', 'Comece agora mesmo criando seu primeiro usuario!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('UserController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>