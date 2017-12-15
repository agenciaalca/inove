<div class=" card-box">
	<div class="panel-heading"> 
		<img class="img-responsive" src="<?= base_url() ?>assets/img/logo-login.png" alt="">
	</div> 


	<div class="panel-body">
		<form class="form-horizontal m-t-20" action="<?= base_url('painel/request_password') ?>">

			<div id="message"></div>

			<div class="form-group ">
				<div class="col-xs-12">
					<input class="form-control" type="email" name="email" placeholder="Insira aqui seu e-mail">
				</div>
			</div>


			<div class="form-group text-center m-t-40">
				<div class="col-xs-12">
					<button class="ladda-button btn btn-padrao btn-block text-uppercase waves-effect waves-light" type="submit" data-style="expand-left">Enviar nova senha</button>
				</div>
			</div>

			<div class="form-group m-t-30 m-b-0">
				<div class="col-sm-12 centro">
					<a href="<?= base_url('painel/entrar') ?>" class="text-dark"><i class="fa fa-angle-left m-r-5"></i> Voltar para o login</a>
				</div>
			</div>

		</form> 

	</div>   
</div> 