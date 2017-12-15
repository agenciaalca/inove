<div style="background-color: #0E4195;" class="espacamento-titulo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titulo-pagina">
                    <?= $title ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container top20 bot20">
    <div class="row">

        <div class="container">
            <div class="row">

                <div class="col-xs-12 ">
                    <div class="titulo linha">Informações</div>
                    <?= $product->description ?>
                </div>

            </div>

            <hr>

            <div class="row">
                <div class="col-xs-12">
                    <div class="titulo linha">Galeria de fotos</div>
                    <div class="row">

                        <?php foreach ($images as $image): ?>
                            <div class="col-md-3">
                                <a href="<?= base_url('assets/img/products/'.$image->image) ?>" data-lightbox="example-set">
                                <img src="<?= base_url('assets/img/products/thumb-'.$image->image) ?>" class="img-responsive thumbnail" alt="">
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>