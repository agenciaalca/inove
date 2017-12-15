<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends MY_Controller 
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
			
			$this->datatables->select('id, title, slug');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="'. base_url('painel/paginas/editar/$2') .'" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/paginas/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id, slug');
			$this->datatables->from('pages');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['pages'] = $this->db->get('pages')->num_rows();
			$this->data['title'] = '<i class="fa fa-files-o"></i> Páginas';

			return load_admin('pages/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'nome da página', 'required');
		$this->form_validation->set_rules('icon', 'ícone', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['icon'] = $this->input->post('icon');

			try
			{
				if($this->db->insert('pages', $data))
					return toJson(['redirect' => base_url('painel/paginas')]);
				else
					return toJson(['message_add' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
			catch(Exception $e)
			{
				return toJson( ['message' => loadMessage('error', 'Erro!', $e->getMessage())] );
			}
		}
		
	}

	public function edit($slug)
	{
		$page = $this->db->where('slug', $slug)->get('pages')->row();

		$this->data['title'] = '<i class="fa fa-'.$page->icon.'"></i> '. $page->title;

		$this->data['page'] = $page;

		return load_admin('pages/edit', $this->data);
	}

	public function update()
	{
		$slug = $this->input->post('slug');

		if($this->input->post('title'))
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
		}
		if($this->input->post('icon'))
			$data['icon'] = $this->input->post('icon');
		$data['content'] = $this->input->post('content');
		
		try
		{
			$this->db->where('slug', $slug)->update('pages', $data);
			$count = $this->db->affected_rows();
		}
		catch(Exception $e)
		{
			return toJson( ['message' => loadMessage('error', 'Erro!', $e->getMessage())] );
		}

		if(!$count == 0)
			return toJson( ['message' => loadMessage('success', 'Sucesso!', 'Informações salvas com sucesso!')] );
		else
			return toJson( ['message' => loadMessage('warning', 'Alerta!', 'Não houve alteração!')] );
	}

	public function destroy($id)
	{
		$page = $this->db->where('id', $id)->get('pages')->row();

		try
		{
			if($this->db->where('id', $id)->delete('pages'))
			{
				$count = $this->db->get('pages')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/paginas')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'A página '.$page->title.' foi removida com sucesso.')]);
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

/* End of file PageController.php */
/* Location: ./application/controllers/admin/PageController.php */