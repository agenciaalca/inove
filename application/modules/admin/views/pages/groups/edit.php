<form action="<?= base_url('painel/grupos/update') ?>">
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<label for="title">Nome do grupo</label>
				<input type="hidden" name="id" id="id" value="<?= $group->id ?>">
				<input type="text" name="title" class="form-control" value="<?= $group->title ?>">
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-12">
			<div class="form-group">
				<button type="submit" class="btn btn-success waves-effect waves-light">
					<span class="btn-label"><i class="fa fa-check"></i></span>Salvar
				</button> 
				<a href="<?= $this->agent->referrer() ?>" class="btn btn-danger waves-effect waves-light">Cancelar</a>
				<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add-module">
					<span class="btn-label"><i class="fa fa-plus"></i></span>
					Adicionar Permissões
				</button>
			</div>
		</div>
	</div>
	<h4>Permissões</h4>
	<div class="row">
		<div class="col-md-12">			
			<div class="table-responsive">
				<table class="table table-striped table-condensed" id="table-module-groups">
					<thead>
						<tr>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody id="modules">
						<?php foreach ($modules as $module): ?>
							<tr>
								<td><?= $module->title ?></td>
								<td>
									<div class="pull-right">
										<a href="<?= base_url('painel/modulos/editar/'.$module->id) ?>" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
										<a href="#" data-href="<?= base_url('painel/grupos/modulos/destroy/'.$module->id) ?>" data-toggle="modal" data-id="<?= $module->id ?>" data-target="#remove" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</form>

<div class="modal fade" id="add-module" role="dialog" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="addModule">Adicionar Permissão</h4>
			</div>
			<div class="modal-body">
				<form id="form_module" action="<?= base_url('painel/grupos/modulos/store') ?>">
					<select name="module" class="form-control" tabindex="-1" style="width: 100%!important;">
						<option></option>
						<?php foreach($modules_all as $mod): ?>
							<?php if(getModuleCategoryStatus($mod->slug)): ?>
								<option value="<?= $mod->id ?>"><?= $mod->module_category.' - '.$mod->title ?></option>
							<?php elseif($mod->slug != 'modules'): ?>
								<option value="<?= $mod->id ?>"><?= $mod->module_category.' - '.$mod->title ?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				</form>
			</div>
			<div class="modal-footer">
			</div>

		</div>
	</div>
</div>

<?php if (verifyPermission('GroupModuleController', 'destroy')): ?>
	<?= loadModal('default/remove') ?>
<?php endif ?>