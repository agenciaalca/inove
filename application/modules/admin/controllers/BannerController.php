<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerController extends MY_Controller 
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
					<a href="#" data-href="'. base_url('painel/slides/update') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/slides/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->db->order_by('order', 'asc');
			$this->datatables->from('banners');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['banners'] = $this->db->get('banners')->num_rows();
			$this->data['title'] = '<i class="fa fa-image"></i> Slides';

			return load_admin('banners/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		if (empty($_FILES['userfile']['name']))
			$this->form_validation->set_rules('userfile', 'imagem', 'required');
		$this->form_validation->set_rules('order', 'posição', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['order'] = $this->input->post('order');

			$data['cover'] = uploadIMage('banners', FALSE);

			if($data['cover'])
			{
				try
				{
					$banner = $this->db->where('order' , $data['order'])->get('banners')->row();
					
					if($banner)
					{
						$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `banners` LIMIT 1')->row()->maxorder;

						for($i = $maxorder; $i >= $banner->order; $i--)
						{
							$this->db->where('order' , $i)->update('banners', ['order' => $i+1]);
						}
					}

					if($this->db->insert('banners', $data))
						return toJson(['redirect' => base_url('painel/slides')]);
					else
						return toJson(['message_add' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
				}
				catch(Exception $e)
				{
					return toJson(['message_add' => loadMessage('error', 'Erro!', $e->getMessage())]);
				}
			}
			else
			{
				return toJson(['message_add' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
		}
	}

	public function edit($id)
	{
		$banner = $this->db->where('id', $id)->get('banners')->row();
		$banner->cover = base_url('assets/img/banners/'.$banner->cover);
		return toJson(['edit' => $banner]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('order', 'posição', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['order'] = $this->input->post('order');

			$banner = $this->db->where('id', $id)->get('banners')->row();
			
			if(!empty($_FILES['userfile']['name']))
			{
				$data['cover'] = uploadIMage('banners', FALSE);
				
				if(!$data['cover'])
					return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
				else
					@unlink(FCPATH.'assets/img/banners/'.$banner->cover);
			}

			try
			{
				$order = $this->db->where('order' , $data['order'])->get('banners')->row();

				if($order && ($order->order != $banner->order))
				{
					$banners = $this->db->where('order >', $banner->order)->get('banners')->result();

					$this->db->where('id', $banner->id)->update('banners', ['order' => NULL]);

					foreach ($banners as $ban) 
					{
						$this->db->where('id', $ban->id)->update('banners', ['order' => $ban->order-1]);
					}

					$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `banners` LIMIT 1')->row()->maxorder;

					for($i = $maxorder; $i >= $order->order; $i--)
					{
						$this->db->where('order' , $i)->update('banners', ['order' => $i+1]);
					}
					
				}
				
				$this->db->where('id', $id)->update('banners', $data);
				$count = $this->db->affected_rows();

				if(!$count == 0)
					return toJson(['redirect' => base_url('painel/slides')]);
				else
					return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
				
				}
				catch(Exception $e)
				{
					return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
				}
			}
		}

		public function destroy($id)
		{
			$banner = $this->db->where('id', $id)->get('banners')->row();

			try
			{			
				if($this->db->where('id', $id)->delete('banners'))
				{
					$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `banners` LIMIT 1')->row()->maxorder;

					for($i = $banner->order; $i < $maxorder; $i++)
					{
						$this->db->where('order' , $i+1)->update('banners', ['order' => $i]);
					}

					@unlink(FCPATH.'assets/img/banners/'.$banner->cover);

					$count = $this->db->get('banners')->num_rows();

					if($count == 0)
						return toJson(['redirect' => base_url('painel/slides')]);
					else
						return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O slide '.$banner->title.' foi removido com sucesso.')]);
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

	/* End of file BannerController.php */
/* Location: ./application/controllers/admin/BannerController.php */