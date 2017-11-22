<form action="<?= base_url('painel/institucional/update') ?>">
	<textarea name="content" id="summernote" class="form-control" ><?= $content ?></textarea>
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<button type="submit" class="btn btn-success waves-effect waves-light">
					<span class="btn-label"><i class="fa fa-check"></i></span>Salvar
				</button> 
				<a href="<?= $this->agent->referrer() ?>" class="btn btn-danger waves-effect waves-light">Cancelar</a>
			</div>
		</div>
	</div>
</form>