<tr>
	<td><?= $module->title ?></td>
	<td>
		<div class="pull-right">
			<a href="<?= base_url('painel/modulos/editar/'.$module->id) ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar módulo"><i class="fa fa-pencil"></i> </a>
			<a href="#" data-id="<?= $module->id ?>" data-href="<?= base_url('painel/grupos/modulos/destroy/'.$module->id) ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remove" data-tooltip="tooltip" data-placement="top" data-original-title="Remover módulo"><i class="fa fa-trash-o"></i> </a>
		</div>
	</td>
</tr>