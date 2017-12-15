<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipController extends MY_Controller 
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
			
			$this->datatables->select('id, title');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="#" data-href="'. base_url('painel/dicas/update') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/dicas/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->db->order_by('id', 'desc');
			$this->datatables->from('tips');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['tips'] = $this->db->get('tips')->num_rows();
			$this->data['title'] = '<i class="fa fa-edit"></i> Dicas';

			return load_admin('tips/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('content', 'descrição', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['description'] = $this->input->post('content');

			try
			{
				if($this->db->insert('tips', $data))
					return toJson(['redirect' => base_url('painel/dicas')]);
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
		$tip = $this->db->where('id', $id)->get('tips')->row();
		return toJson(['edit' => $tip]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('content', 'descrição', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['description'] = $this->input->post('content');

			$tip = $this->db->where('id', $id)->get('tips')->row();

			try
			{
				$this->db->where('id', $id)->update('tips', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}

			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/dicas')]);
			else
				return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{
		$tip = $this->db->where('id', $id)->get('tips')->row();
		
		try
		{			
			if($this->db->where('id', $id)->delete('tips'))
			{
				@unlink(FCPATH.'assets/img/tips/'.$tip->cover);

				$count = $this->db->get('tips')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/dicas')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'A dica '.$tip->title.' foi removido com sucesso.')]);
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

/* End of file TipController.php */
/* Location: ./application/controllers/admin/TipController.php */