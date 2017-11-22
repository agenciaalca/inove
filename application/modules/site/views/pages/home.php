<ul class="bxslider">
	<?php foreach ($banners as $banner): ?>
		<li><img src="<?= base_url('assets/img/banners/'.$banner->cover) ?>" /></li>
	<?php endforeach ?>
</ul>

<div class="container top20 bot20">
	<div class="row">
		<div class="col-md-6 bot20">
			<div class="titulo linha">Seja bem vindo!</div>
			<?= $about ?>
		</div>


		<div class="col-md-6 bot20">
			<div class="titulo linha">Conheça nossas linhas</div>
			<div class="row linha-produtos">
				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/farma-1.png" alt="">
					</a>
				</div>

				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/super-1.png" alt="">
					</a>
				</div>

				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/eletro-1.png" alt="">
					</a>
				</div>
			</div>

			<div class="row linha-produtos">
				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/festa-1.png" alt="">
					</a>
				</div>

				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/armazenagem-1.png" alt="">
					</a>
				</div>

				<div class="col-sm-4">
					<a href="">
						<img src="<?= base_url() ?>assets/img/linha/home-1.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<hr>
</div>

<div class="container" style="margin-bottom: 30px;">
	<div class="row">
		<div class="col-xs-12">
			<div class="titulo linha">Clientes</div>
			<div class="brand-slider">
				<div id="owl-brand" class="owl-carousel">
					<?php foreach ($customers as $customer): ?>
						<div class="item">
						<a  href="<?= base_url('clientes') ?>"><img src="<?= base_url('assets/img/customers/'.$customer->logo) ?>" style="width: 190px; height: 140px;" alt=""></a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>
