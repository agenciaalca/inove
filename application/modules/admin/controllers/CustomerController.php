<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends MY_Controller 
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
					<a href="#" data-href="'. base_url('painel/clientes/update') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/clientes/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->db->order_by('order', 'asc');
			$this->datatables->from('customers');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['customers'] = $this->db->get('customers')->num_rows();
			$this->data['title'] = '<i class="fa fa-group"></i> Clientes';

			return load_admin('customers/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('order', 'ordem', 'required');
		$this->form_validation->set_rules('name', 'nome', 'required');
		$this->form_validation->set_rules('position', 'cargo', 'required');
		$this->form_validation->set_rules('text', 'texto', 'required');

		if (empty($_FILES['userfile']['name']))
			$this->form_validation->set_rules('userfile', 'imagem', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['text'] = $this->input->post('text');
			$data['name'] = $this->input->post('name');
			$data['position'] = $this->input->post('position');
			$data['order'] = $this->input->post('order');
			$data['logo']  = uploadIMage('customers', TRUE);

			try
			{
				$customer = $this->db->where('order' , $data['order'])->get('customers')->row();
				
				if($customer)
				{
					$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `customers` LIMIT 1')->row()->maxorder;

					for($i = $maxorder; $i >= $customer->order; $i--)
					{
						$this->db->where('order' , $i)->update('customers', ['order' => $i+1]);
					}
				}

				if($this->db->insert('customers', $data))
					return toJson(['redirect' => base_url('painel/clientes')]);
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
		$customer = $this->db->where('id', $id)->get('customers')->row();
		$customer->logo = base_url('assets/img/customers/'.$customer->logo);
		return toJson(['edit' => $customer]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('order', 'ordem', 'required');
		$this->form_validation->set_rules('name', 'nome', 'required');
		$this->form_validation->set_rules('position', 'cargo', 'required');
		$this->form_validation->set_rules('text', 'texto', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['text'] = $this->input->post('text');
			$data['name'] = $this->input->post('name');
			$data['position'] = $this->input->post('position');
			$data['order'] = $this->input->post('order');
			if(!empty($_FILES['userfile']['name']))
				$data['logo']  = uploadIMage('customers', TRUE);

			$customer = $this->db->where('id', $id)->get('customers')->row();

			try
			{

				$order = $this->db->where('order' , $data['order'])->get('customers')->row();

				if($order && ($order->order != $customer->order))
				{
					$customers = $this->db->where('order >', $customer->order)->get('customers')->result();

					$this->db->where('id', $customer->id)->update('customers', ['order' => NULL]);

					foreach ($customers as $ban) 
					{
						$this->db->where('id', $ban->id)->update('customers', ['order' => $ban->order-1]);
					}

					$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `customers` LIMIT 1')->row()->maxorder;

					for($i = $maxorder; $i >= $order->order; $i--)
					{
						$this->db->where('order' , $i)->update('customers', ['order' => $i+1]);
					}
					
				}

				$this->db->where('id', $id)->update('customers', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}

			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/clientes')]);
			else
				return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{
		$customer = $this->db->where('id', $id)->get('customers')->row();
		
		try
		{			
			if($this->db->where('id', $id)->delete('customers'))
			{
				$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `customers` LIMIT 1')->row()->maxorder;

				for($i = $customer->order; $i < $maxorder; $i++)
				{
					$this->db->where('order' , $i+1)->update('customers', ['order' => $i]);
				}
				
				@unlink(FCPATH.'assets/img/customers/'.$customer->logo1);
				@unlink(FCPATH.'assets/img/customers/'.$customer->logo2);

				$count = $this->db->get('customers')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/clientes')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O cliente '.$customer->title.' foi removido com sucesso.')]);
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

/* End of file CustomerController.php */
/* Location: ./application/controllers/admin/CustomerController.php */