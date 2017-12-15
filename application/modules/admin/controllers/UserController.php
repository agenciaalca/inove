<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends MY_Controller 
{
	private $permission;

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
			
			$this->datatables->select('id, name, email');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="'. base_url('painel/usuarios/editar/$1') .'" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/usuarios/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->datatables->from('users');

			if(!$this->permission)
				$this->datatables->where('id !=', 1);
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['users'] = $this->db->get('users')->num_rows();
			$this->data['title'] = '<i class="fa fa-user"></i> Usuários';

			return load_admin('users/index', $this->data);
		}
	}

	public function create()
	{
		$this->data['title'] = '<i class="fa fa-user"></i> Novo Usuário';

		return load_admin('users/create', $this->data);
	}

	public function store()
	{
		$this->form_validation->set_rules('name', 'nome', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'senha', 'required');
		$this->form_validation->set_rules('passconf', 'confirmar senha', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['password'] = $data['password'] = hash('sha512', $this->input->post('password'));

			try
			{
				if($this->db->insert('users', $data))
					return toJson(['redirect' => base_url('painel/usuarios')]);
				else
					return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
			catch(Exception $e)
			{
				return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
		}
		
	}

	public function edit($id)
	{
		$this->data['user'] = $this->db->where('id', $id)->get('users')->row();
		$this->data['title'] = '<i class="fa fa-user"></i> Editar Usuário';

		$this->data['modules'] = $this->db->select('modules.*')->join('modules', 'modules.id = user_modules.module_id')->where('user_id', $id)->get('user_modules')->result();
		$this->data['groups'] = $this->db->select('groups.*')->join('groups', 'groups.id = user_groups.group_id')->where('user_id', $id)->get('user_groups')->result();

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
		$this->data['groups_all'] = $this->db->get('groups')->result();

		return load_admin('users/edit', $this->data);
	}

	public function update()
	{
		$this->form_validation->set_rules('name', 'nome', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		
		if($this->input->post('password') != NULL)
		{
			$this->form_validation->set_rules('password', 'senha', 'required');
			$this->form_validation->set_rules('passconf', 'confirmar senha', 'required|matches[password]');
		}

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			
			if($this->input->post('password') != NULL)
				$data['password'] = $data['password'] = hash('sha512', $this->input->post('password'));
			
			try
			{
				$this->db->where('id', $id)->update('users', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/usuarios')]);
			else
				return toJson(['message' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{
		$user = $this->db->where('id', $id)->get('users')->row();
		
		try
		{
			if($this->db->where('id', $id)->delete('users'))
			{
				$this->db->where('user_id', $user->id)->delete('user_modules');
				$this->db->where('user_id', $user->id)->delete('user_groups');
				
				$count = $this->db->get('users')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/usuarios')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O usuário '.$user->name.' foi removido com sucesso.')]);
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

/* End of file UserController.php */
/* Location: ./application/controllers/admin/UserController.php */