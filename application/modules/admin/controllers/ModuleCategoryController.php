<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModuleCategoryController extends MY_Controller 
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

			$this->datatables->select('module_categories.id, module_categories.title, module_categories.slug, module_categories.status');
			$this->datatables->edit_column('status', '<div><label><input name="status" type="checkbox" class="js-switch" id="$1" value="$2"></label><div>', 'id, status');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="#" data-href="'. base_url('painel/modulos/categorias/editar/$1') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/modulos/categorias/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>
				', 'id');
			$this->db->order_by('module_categories.title', 'asc');
			$this->datatables->from('module_categories');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['module_categories'] = $this->db->get('module_categories')->result();
			$this->data['title'] = '<i class="fa fa-puzzle-piece"></i> Módulos';

			return load_admin('modules/categories', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'nome da módulo', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug']  = $this->input->post('slug');

			try
			{
				if($this->db->insert('module_categories', $data))
					return toJson(['redirect' => base_url('painel/modulos/categorias')]);
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
		$category = $this->db->where('id', $id)->get('module_categories')->row();

		return toJson(['edit' => $category]);
	}

	public function update()
	{
		$id = $this->input->post('id');

		$category = $this->db->where('id', $id)->get('module_categories')->row();

		if($this->input->post('status') != NULL)
		{
			if($category->status == TRUE)
				$data['status'] = FALSE;
			else
				$data['status'] = TRUE;
		}

		try
		{
			if($this->input->post('status') == NULL)
			{
				$this->form_validation->set_rules('title', 'nome da módulo', 'required');

				if ($this->form_validation->run() == FALSE) 
				{
					return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
				} 
				else 
				{
					$data['title'] = $this->input->post('title');
				}
			}

			$this->db->where('id', $id)->update('module_categories', $data);
			$count = $this->db->affected_rows();

		}
		catch(Exception $e)
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}

		if(!$count == 0)
		{
			if(isset($data['status']) && $data['status'] == TRUE)
			{
				return toJson(['message' => loadMessage('success', 'Sucesso!', 'O módulo '.$category->title.' agora está disponível.')]);
			}
			elseif(isset($data['status']) && $data['status'] == FALSE)
			{
				return toJson(['message' => loadMessage('warning', 'Alerta!', 'O módulo '.$category->title.' não estará mais disponível.')]);
			}
			return toJson(['redirect' => base_url('painel/modulos/categorias')]);
		}
		else
			return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
	}

	public function destroy($id)
	{
		$category = $this->db->where('id', $id)->get('module_categories')->row();

		try
		{			
			if($this->db->where('id', $id)->delete('module_categories'))
			{
				$modules = $this->db->where('id', $category->id)->get('modules')->result();
				
				foreach ($modules as $module) 
				{
					$this->db->where('category', $module->id)->delete('modules');
				}

				$count = $this->db->get('module_categories')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/modulos/categorias')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O módulo '.$category->title.' foi removida com sucesso.')]);
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

/* End of file ModuleCategoryController.php */
/* Location: ./application/controllers/admin/ModuleCategoryController.php */