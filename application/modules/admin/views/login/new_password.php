<div class="card-box">
	<div class="panel-heading"> 
		<img class="img-responsive" src="<?= base_url() ?>/assets/img/logo-login.png" alt="">
	</div> 

	<div class="panel-body">
		<div id="message"></div>
		<form action="<?= base_url('painel/save_password') ?>" method="post">
			<div class="form-group">
				<label for="password">Senha</label>
				<input type="hidden" name="token" value="<?= $this->uri->segment(3) ?>">
				<input type="password" class="form-control" name="password">
			</div>
			<div class="form-group">
				<label for="re_password">Confirmar Senha</label>
				<input type="password" class="form-control" name="re_password">
			</div>
			<button type="submit" class="ladda-button btn btn-padrao btn-block text-uppercase waves-effect waves-light">Salvar</button>
			<a href="<?= base_url('painel/entrar') ?>" class="ladda-button btn btn-danger btn-block text-uppercase waves-effect waves-light">Entrar</a>
		</form>
	</div>
</div>