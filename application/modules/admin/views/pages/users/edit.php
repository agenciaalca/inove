<form action="<?= base_url('painel/usuarios/update') ?>">

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="hidden" name="id" id="id" value="<?= $user->id ?>">
                <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="passconf">Repetir senha</label>
                <input type="password" name="passconf" class="form-control">
            </div>
        </div>
    </div>
    <h4>Níveis de acesso</h4>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add-group">
                <span class="btn-label"><i class="fa fa-plus"></i></span>
                Adicionar Grupos
            </button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Grupos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="groups">
                    <?php foreach($groups as $group): ?>
                        <tr id="<?= $group->id ?>" class="<?= ($group->title == null) ? 'border-left-red' : '' ?>">
                            <td>
                                <?= ($group->title) ? word_limiter($group->title, 4) : '<i>Editar Grupo</i>' ?>
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="<?= base_url('painel/grupos/editar/'.$group->id) ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar grupo"><i class="fa fa-pencil"></i> </a>
                                    <a href="#" data-id="<?= $user->id ?>" data-href="<?= base_url('painel/usuarios/grupos/destroy/'.$group->id) ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remove" data-tooltip="tooltip" data-placement="top" data-original-title="Remover grupo"><i class="fa fa-trash-o"></i> </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add-module">
                <span class="btn-label"><i class="fa fa-plus"></i></span>
                Adicionar Permissões
            </button>    
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Permissãos</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="modules">
                    <?php foreach($modules as $module): ?>
                        <tr id="<?= $module->id ?>" class="<?= ($module->title == null || $module->class == null || $module->method == null) ? 'border-left-red' : '' ?>">
                            <td>
                                <?= ($module->title) ? word_limiter($module->title, 4) : '<i>Editar Permissão</i>' ?>
                            </td>
                            <td>
                                <div class="pull-right">
                                    <a href="<?= base_url('painel/modulos/editar/'.$module->id) ?>" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar módulo"><i class="fa fa-pencil"></i> </a>
                                    <a href="#" data-id="<?= $user->id ?>" data-href="<?= base_url('painel/usuarios/modulos/destroy/'.$module->id) ?>" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#remove" data-tooltip="tooltip" data-placement="top" data-original-title="Remover módulo"><i class="fa fa-trash-o"></i> </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
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

<div class="modal fade" id="add-module" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="addModule">Adicionar Permissão</h4>
            </div>
            <div class="modal-body">
                <form id="form_module" action="<?= base_url('painel/usuarios/modulos/store') ?>">
                    <select name="module" class="form-control" tabindex="-1" style="width: 100%!important;">
                        <option></option>
                        <?php foreach($modules_all as $module): ?>
                            <option value="<?= $module->id ?>"><?= $module->module_category.' - '.$module->title ?></option>
                        <?php endforeach ?>
                    </select>
                </form>
            </div>
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="add-group" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="addGroup">Adicionar Grupo</h4>
            </div>
            <div class="modal-body">
                <form id="form_group" action="<?= base_url('painel/usuarios/grupos/store') ?>">
                    <select name="group" class="form-control" tabindex="-1" style="width: 100%!important;">
                        <option></option>
                        <?php foreach($groups_all as $group): ?>
                            <?php if(getGroupStatus($group->id)): ?>
                                <option value="<?= $group->id ?>"><?= $group->title ?></option>
                            <?php elseif($group->id != 1): ?>
                                <option value="<?= $group->id ?>"><?= $group->title ?></option>
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

<?= loadModal('default/remove') ?>