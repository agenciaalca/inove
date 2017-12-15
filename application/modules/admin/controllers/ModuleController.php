<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModuleController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->input->method(TRUE) == 'POST')
		{
			$this->load->library('Datatables');

			$this->datatables->select('modules.id, modules.title, modules.class, modules.method, module_categories.title as category');
			$this->datatables->join('module_categories', 'modules.category = module_categories.id');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="#" data-href="'. base_url('painel/modulos/editar/$1') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/modulos/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->datatables->from('modules');

			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['modules'] = $this->db->get('modules')->result();
			$this->data['categories'] = $this->db->get('module_categories')->result();
			$this->data['title'] = '<i class="fa fa-puzzle-piece"></i> Permissões';

			return load_admin('modules/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'nome da galeria', 'required');
		$this->form_validation->set_rules('class', 'classe', 'required');
		$this->form_validation->set_rules('method', 'método', 'required');
		$this->form_validation->set_rules('category', 'categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['class'] = $this->input->post('class');
			$data['method'] = $this->input->post('method');
			$data['category'] = $this->input->post('category');

			try
			{
				if($this->db->insert('modules', $data))
					return toJson(['redirect' => base_url('painel/modulos')]);
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
		$module = $this->db->where('id', $id)->get('modules')->row();

		return toJson(['edit' => $module]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'nome do módulo', 'required');
		$this->form_validation->set_rules('class', 'classe', 'required');
		$this->form_validation->set_rules('method', 'método', 'required');
		$this->form_validation->set_rules('category', 'categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['class'] = $this->input->post('class');
			$data['method'] = $this->input->post('method');
			$data['category'] = $this->input->post('category');

			try
			{
				$this->db->where('id', $id)->update('modules', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/modulos')]);
			else
				return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{			
		$module = $this->db->where('id', $id)->get('modules')->row();

		try
		{			
			if($this->db->where('id', $id)->delete('modules'))
			{
				$this->db->where('module_id', $module->id)->delete('group_modules');
				$this->db->where('module_id', $module->id)->delete('user_modules');

				$count = $this->db->get('modules')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/modulos')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O modulo '.$module->title.' foi removido com sucesso.')]);
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

/* End of file ModuleController.php */
/* Location: ./application/controllers/admin/ModuleController.php */