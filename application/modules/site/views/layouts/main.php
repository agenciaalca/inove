<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= loadSocial('description') ?>">
    <meta name="keywords" content="<?= loadSocial('keywords') ?>">
    <title><?= loadConfig('title') ?> <?= loadConfig('subtitle') ?> | <?= $title ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/alt.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/revolution-slider.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.fancybox.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/lightbox.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/estilo.css">
    
</head>

<body>
    <div class="wrapper home01">
        <div class="header-top hidden-xs">
            <div class="container">
                <div class="pull-right hidden-xs hidden-sm">
                    <ul class="header-information">
                        <li><i class="fa fa-phone branco"></i> Atendimento: <?= loadConfig('phone') ?></li>
                        <li><i class="fa fa-envelope branco"></i> E-mail: <?= loadConfig('email') ?></li>
                    </ul>
                </div>
            </div>
        </div>

        <header id="header" class="header header-sticky" style="background-image: url('<?= base_url() ?>assets/img/fundo-topo.png')">
            <div class="header-wrap">
                <div class="header-nav">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2 col-lg-3">
                                <div class="header-brand">
                                    <a href="<?= base_url() ?>">
                                        <img src="<?= base_url() ?>assets/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-9">
                                <div class="btn-menu"></div>
                                <nav id="mainnav" class="mainnav pull-right">
                                    <ul class="menu">
                                        <li><a href="<?= base_url() ?>">Início</a></li>
                                        <li><a href="<?= base_url() ?>sobre-nos">Sobre nós</a></li>
                                        <?php if ($parent_categories): ?>                                            
                                            <li><a href="#">Serviços</a>
                                                <ul class="sub-menu">
                                                    <?php foreach ($parent_categories as $categories): ?>
                                                        <li><a href="<?= base_url('servicos/'.$categories->slug) ?>"><?= $categories->title ?></a></li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </li>
                                        <?php endif ?>
                                        <li><a href="<?= base_url() ?>clientes">Clientes</a></li>
                                        <li><a href="<?= base_url() ?>dicas">Dicas</a></li>
                                        <li><a href="<?= base_url() ?>fale-conosco">Fale conosco</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?= $content ?>

        <footer id="footer" class="bgi-gray">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="footer-page">
                            <div class="row">
                                <div class="col-md-10 copyright branco upper">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4>Aceitamos</h4>
                                            <div class="cartoes">
                                                <img src="<?= base_url() ?>assets/img/visa.png" alt=""> <img src="<?= base_url() ?>assets/img/mastercard.png" alt=""> <img src="<?= base_url() ?>assets/img/bndes.png" alt="">
                                            </div>

                                        </div>

                                        <div class="col-sm-12 top20">
                                            <p>&copy; <?php echo date('Y'); ?> <?= loadConfig('title') ?> - Todos os direitos reservados.</p>
                                            <div class="enderecoRodape hidden-xs">
                                                <i class="fa fa-map-marker"></i> <?= loadConfig('address') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="kodev">
                                        <a href="http://kodev.com.br" target="_blank">
                                            <img src="<?= base_url() ?>assets/img/kodev.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript">
            var base_url = "<?= base_url('produtos/') . $this->uri->segment(2) . $this->uri->segment(3) ?>";
            var total    = <?= isset($total) ? $total : 0 ?>;
            var offset   = 0;
        </script>


        <script src="<?= base_url() ?>assets/js/lightbox-plus-jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/slider.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>

    </body>
    </html>