<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('PageController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$pages == 0): ?>   
        <div class="row">
            <div class="col-md-12">     
                <div class="table-responsive">
                    <table class="table table-striped" id="table-pages">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Páginas</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem páginas cadastradas.', 'Comece agora mesmo criando sua primeira página!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('PageController', 'create')): ?>
    <?= loadModal('pages/create') ?>    
<?php endif ?>
<?php if (verifyPermission('PageController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>