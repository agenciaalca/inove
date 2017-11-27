<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img class="img-responsive" src="<?= base_url() ?>assets/images/fundo.png" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" src="<?= base_url() ?>assets/images/fundo.png" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="item">
            <img class="img-responsive" src="<?= base_url() ?>assets/images/fundo.png" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control scrooldown" href="#carousel-example-generic" role="button" data-slide="prev">
        <span>
            <img src="<?= base_url() ?>assets/images/seta_esq.png" />
        </span>
    </a>
    <a class="right carousel-control scrooldown" href="#carousel-example-generic" role="button" data-slide="next">
        <span>
            <img src="<?= base_url() ?>assets/images/seta_dire.png" />
        </span>
    </a>
</div>

<div class="container top20 bot20">
    <div class="row">
        <div class="col-md-6 bot20">
            <div class="titulo linha">Seja bem vindo!</div>
            <?= $about ?>
            <div class="titulo linha">Seja bem vindo!</div>
            <?= $about ?>
            <div class="titulo linha">Seja bem vindo!</div>
            <p>Conteudo do sdjfsadkfjk</p>
            
        </div>

        <div class="col-md-6 bot20">
            <div class="titulo linha">Conheça nossas linhas</div>
            <div class="out overout">
                <div class="col-md-4">
                    <p>Armazenagem</p>
                    <p>Casa</p>
                    <p>Farmacia</p>
                    <p>Mercado</p>
                    <p>Festa</p>
                </div>
                <div class="col-md-8">
                    <div class="in overout"><p></p></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>

<div class="container" style="margin-bottom: 30px;">
    <div class="row">
        <div class="col-xs-12">
            <div class="titulo linha">Clientes</div>
            <div class="brand-slider">
                <div id="owl-brand" class="owl-carousel">
                    <?php foreach ($customers as $customer): ?>
                        <div class="item">
                            <a  href="<?= base_url('clientes') ?>"><img src="<?= base_url('assets/img/customers/' . $customer->logo) ?>" style="width: 190px; height: 140px;" alt=""></a>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
