<!DOCTYPE html>
<html lang="pt_BR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?= loadSocial('description') ?>">
        <meta name="keywords" content="<?= loadSocial('keywords') ?>">
        <title><?= loadConfig('title') ?> <?= loadConfig('subtitle') ?> | <?= $title ?></title>
        <link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/img/favicon.png">
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
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>assets/images/logo-inove.png" width="90px">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url() ?>">Início</a></li>
                        <li><a href="<?= base_url() ?>sobre-nos">Sobre nós</a></li>
                        <?php if ($parent_categories): ?>                                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                                   aria-expanded="false">Serviços <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($parent_categories as $categories): ?>
                                        <li><a href="<?= base_url('produtos/' . $categories->slug) ?>"><?= $categories->title ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li><a href="<?= base_url() ?>#contato">Contato</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?= $content ?>

        <footer id="footer" class="bgi-gray">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="footer-page">
                            <div class="row">
                                <div class="titulos-de-contexto ">
                                    <h1 class="block_title">CONTATO</h1>
                                    <p>Entre em contato consoco e tire suas dúvidas!</p>
                                </div>
                                <div id="contato" class="col-md-8">
                                    <form method="post" action="index.php#contato" name="formulario-contato">
                                        <div class="col-md-6">
                                            <div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="nome" id="nome" value="" placeholder="nome*" required />

                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" value="" placeholder="email*" required>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="telefone" id="telefone" value="" placeholder="telefone*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="4" 
                                                          id="message" name="mensagem" placeholder="mensagem*" required></textarea>
                                            </div>
                                            <div class="botao ">
                                                <button class="btn btn-custom" id="submit" name="submit" type="submit" value="ENVIAR">Enviar Mensagem</button>
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="informacoes-contato">
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i> contato@inovegondolas.com.br</p>
                                        <p><i class="fa fa-whatsapp" aria-hidden="true"></i> (062) 3636-0111</p>
                                        <p><i class="fa fa-globe" aria-hidden="true"></i> Rua 88-B, nº 73, Setor Sul, Goiânia - GO, 74085-030</p>
                                    </div>
                                    <div class="cartoes">
                                        <div class="cartoes-c col-xs-4">
                                            <img src="<?= base_url() ?>assets/img/icons-11.png">
                                        </div>
                                        <div class="cartoes-c col-xs-4">
                                            <img src="<?= base_url() ?>assets/img/icons-10.png">
                                        </div>
                                        <div class="cartoes-c col-xs-4">
                                            <img src="<?= base_url() ?>assets/img/icons-08.png">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="redes-sociais">
                                        <a href="#" target="_blank"><img src="<?= base_url() ?>assets/images/fb.png"></a>
                                        <a href="#" target="_blank"><img src="<?= base_url() ?>assets/images/ig.png"></a>
                                        <a href="#" target="_blank"><img src="<?= base_url() ?>assets/images/in.png"></a>
                                    </div>

                                    <div class="copyright">© INOVE GONDOLAS. ALL RIGHTS RESERVED. DESENVOLVIDO POR <a href="http://agenciaalca.com" target="_blank"> AGÊNCIA ALCA</a></div>        
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script type="text/javascript">
            var base_url = "<?= base_url('produtos/') . $this->uri->segment(2) . $this->uri->segment(3) ?>";
            var total = <?= isset($total) ? $total : 0 ?>;
            var offset = 0;
        </script>
        <script src="<?= base_url() ?>assets/js/lightbox-plus-jquery.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/slider.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.bxslider.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/script.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/mouseout.js"></script>
    </body>
</html>