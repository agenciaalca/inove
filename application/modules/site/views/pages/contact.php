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
    <div class="row">
        <div class="col-md-8">
            <?= $this->session->userdata('message') ?>
            <form action="<?= base_url('fale-conosco/send_mail') ?>" method="post">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Seu nome" id="" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input type="text" name="email" placeholder="Seu email" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Assunto" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <textarea name="message" placeholder="Mensagem" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="btn-yellow text-uppercase" value="Enviar mensagem" type="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="titulo linha bot20">Informações</div>

                    <div class="check">
                        <li><b>Telefone:</b> <?= loadConfig('phone') ?></li>
                        <li><b>Email:</b> <?= loadConfig('email') ?></li>
                        <li><b>Endereço:</b> <?= loadConfig('address') ?></li>
                    </div>
                </div>

                <div class="col-sm-12 top20">
                    <div class="titulo linha bot20">Localização</div>

                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3822.7291526223403!2d-49.33385934675173!3d-16.640356974198635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x935ef51af9388e51%3A0x56071cf0b5abd02d!2sInove+G%C3%B4ndolas!5e0!3m2!1spt-BR!2sbr!4v1476131361047" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                </div>
            </div>
        </div>
    </div>
</div>