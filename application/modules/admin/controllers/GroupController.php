<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->permission = getModuleCategoryStatus('modules');
	}

	public function index()
	{
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->load->library('Datatables');
			
			$this->datatables->select('id, title');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="'. base_url('painel/grupos/editar/$1') .'" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/grupos/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->datatables->from('groups');

			if(!$this->permission)
				$this->datatables->where('id !=', 1);

			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['groups'] = $this->db->get('groups')->num_rows();
			$this->data['title'] = '<i class="fa fa-users"></i> Grupos';
			
			return load_admin('groups/index', $this->data);
		}
	}
	
	public function store()
	{
		$this->form_validation->set_rules('title', 'nome do grupo', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');

			try
			{
				if($this->db->insert('groups', $data))
					return toJson(['redirect' => base_url('painel/grupos')]);
				else
					return toJson(['message_add' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
			catch(Exception $e)
			{
				return toJson(['message_add' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
		}
	}

	public function edit($id)
	{
		$this->data['group'] = $this->db->where('id', $id)->get('groups')->row();
		$this->data['title'] = '<i class="fa fa-users"></i> Editar Grupo';

		$this->data['modules'] = $this->db->select('modules.*')
		->join('group_modules', 'modules.id = group_modules.module_id')
		->where('group_id', $id)
		->get('modules')
		->result();

		
		$this->db->select('modules.*, module_categories.title as module_category, module_categories.slug');
		$this->db->distinct();
		$this->db->join('group_modules', 'modules.id = group_modules.module_id', 'left');
		$this->db->join('module_categories', 'modules.category = module_categories.id');

		if(!$this->permission)
		{
			$this->db->where('module_categories.slug !=', 'modules');
		}

		$this->db->where('module_categories.status', TRUE);
		$this->db->order_by('module_categories.slug', 'asc');
		$this->data['modules_all'] = $this->db->get('modules')->result();

		return load_admin('groups/edit', $this->data);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'nome do grupo', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			$data['title'] = $this->input->post('title');

			try
			{
				$this->db->where('id', $id)->update('groups', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/grupos')]);
			else
				return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{
		$group = $this->db->where('id', $id)->get('groups')->row();

		try
		{			
			if($this->db->where('id', $id)->delete('groups'))
			{
				$this->db->where('group_id', $group->id)->delete('group_modules');
				$this->db->where('group_id', $group->id)->delete('user_groups');

				$count = $this->db->get('groups')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/grupos')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O grupo '.$group->title.' foi removido com sucesso.')]);
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
		}
		catch(Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}
	}

}

/* End of file GroupController.php */
/* Location: ./application/controllers/admin/GroupController.php */