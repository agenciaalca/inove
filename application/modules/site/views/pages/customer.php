<div class="section-subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption text-uppercase"><?= $title ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container top20 bot20">

    <?php foreach ($customers as $customer): ?>
        <!-- INICIO DEPOIMENTO -->
        <div class="depoBox">
            <div class="row bot20">
                <div class="col-md-3">
                    <img src="<?= base_url('assets/img/customers/'.$customer->logo) ?>" class="thumbnail img-responsive" alt="">
                </div>

                <div class="col-md-9">
                    <div class="tituloDepoimento"><?= $customer->title ?></div>

                    <div class="caixaDepoimento">
                        <div class="depoimento">
                            <blockquote><?= $customer->text ?></blockquote>
                        </div>
                    </div>

                    <div class="autorDepoimento">
                        <div class="nome"><?= $customer->name ?></div>
                        <div class="cargo"><?= $customer->position ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM DEPOIMENTO -->
    <?php endforeach ?>

</div>