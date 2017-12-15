<div class="card-box">
	<div class="panel-heading"> 
		<img class="img-responsive" src="<?= base_url() ?>/assets/img/logo-login.png" alt="">
	</div> 

	<div class="panel-body">
		<div id="message"></div>
		<form class="form-horizontal m-t-20" action="<?= base_url('painel/request_login') ?>">

			<div class="form-group ">
				<div class="col-xs-12">
					<input class="form-control" type="email" name="email" placeholder="E-mail">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-12">
					<input class="form-control" type="password" name="password" placeholder="Senha">
				</div>
			</div>

			<div class="form-group ">
				<div class="col-xs-12">
					<div class="checkbox checkbox-primary">
						<input id="checkbox-signup" type="checkbox">
						<label for="checkbox-signup">
							Lembrar dados
						</label>
					</div>

				</div>
			</div>

			<div class="form-group text-center m-t-40">
				<div class="col-xs-12">
					<button class="btn btn-padrao btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
				</div>
			</div>

			<div class="form-group m-t-30 m-b-0">
				<div class="col-sm-12 centro">
					<a href="<?= base_url('painel/recuperar_senha') ?>" class="text-dark"><i class="fa fa-lock m-r-5"></i> Esqueceu sua senha?</a>
				</div>
			</div>
		</form> 
	</div>   
</div> 