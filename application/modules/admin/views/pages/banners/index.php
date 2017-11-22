<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('BannerController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$banners == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                    <table class="table table-striped" id="table-banners">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Slides</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem slides cadastrados.', 'Comece agora mesmo criando seu primeiro slide!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('BannerController', 'create')): ?>
    <?= loadModal('banners/create') ?>    
<?php endif ?>
<?php if (verifyPermission('BannerController', 'edit')): ?>
    <?= loadModal('banners/edit') ?>
<?php endif ?>
<?php if (verifyPermission('BannerController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>