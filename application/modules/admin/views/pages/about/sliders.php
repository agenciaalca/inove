<div class="table-wrapper">
    <div class="btn-toolbar bot20">
        <?php if (verifyPermission('AboutSliderController', 'create')): ?>
            <a href="#" data-toggle="modal" data-target="#create" type="button" class="btn btn-laranja waves-effect waves-light">Adicionar</a>
        <?php endif ?>
    </div>
    <?php if (!$about_sliders == 0): ?>   
        <div class="row">
            <div class="col-md-12">    
                <div class="table-responsive">
                    <table class="table table-striped" id="table-about-sliders">
                        <thead>
                            <th style="display: none;"></th>
                            <th>Sliders</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?= loadMessage('info', 'Ainda não existem sliders cadastrados.', 'Comece agora mesmo criando seu primeiro slider!' , false) ?>
    <?php endif ?>
</div>

<?php if (verifyPermission('AboutSliderController', 'create')): ?>
    <?= loadModal('about_sliders/create') ?>    
<?php endif ?>
<?php if (verifyPermission('AboutSliderController', 'edit')): ?>
    <?= loadModal('about_sliders/edit') ?>
<?php endif ?>
<?php if (verifyPermission('AboutSliderController', 'destroy')): ?>
    <?= loadModal('default/remove') ?>
<?php endif ?>