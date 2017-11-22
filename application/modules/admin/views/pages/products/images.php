<div class="row">
	<div class="col-md-4">
		<form id="product_form" method="post" enctype="multipart/form-data">
			<a href="<?= base_url('painel/produtos') ?>" class="btn btn-primary waves-effect waves-light">Salvar</a>
			<input type="hidden" name="id" id="id" value="<?= $this->uri->segment(4) ?>">
			<label class="btn btn-primary waves-effect waves-light"> 
				Adicionar Imagem 
				<input type="file" class="product_images" style="display: none;" name="userfile[]" multiple="multiple">
			</label>
		</form>
	</div>
	<div class="col-md-8">
		<div class="progress" id="progress" style="display: none;">
			<div class="progress-bar progress-bar-custom" id="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<?php if(count($products) > 0): ?>
		<div class="product" id="product">
			<?php foreach($products as $product): ?>
				<div class="col-xs-2 col-md-2 draggable" id="image-<?= $product->id ?>">
					<a href="#" data-href="<?= base_url('painel/produtos/imagens/destroy/'.$product->id) ?>" data-toggle="modal" data-id="<?= $product->id ?>" data-target="#remove" class="remove" ><i class="fa fa-close"></i></a>					
					<a href="<?= base_url('') ?>assets/img/<?= ($product->image) ? 'products/'.$product->image : 'no-image.jpg' ?>" data-lightbox="<?= $product->id ?>" class="thumbnail">
						<img src="<?= base_url('') ?>assets/img/<?= ($product->image) ? 'products/thumb-'.$product->image : 'thumb-no-image.jpg' ?>" alt="Imagem">
					</a>
				</div>
			<?php endforeach ?>
		</div>
	<?php else: ?>
		<div class="col-md-12">
			<div class="product" id="product"></div>
			<div class="alert alert-info alert-dismissible fade in" role="alert" id="alert">
				<i class="fa fa-info-circle"></i> Ainda não existem imagens cadastradas. Comece agora mesmo criando sua primeira imagem!
			</div>
		</div>
	<?php endif ?>
</div>

<?php if (verifyPermission('ProductController', 'destroy')): ?>
	<?= loadModal('default/remove') ?>
<?php endif ?>