<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends MY_Controller 
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
			
			$this->datatables->select('products.id, products.title, product_categories.title as category');
			$this->datatables->join('product_has_categories', 'product_has_categories.product_id = products.id');
			$this->datatables->join('product_categories', 'product_categories.id = product_has_categories.category_id');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="'. base_url('painel/produtos/imagens/$1') .'" class="btn btn-laranja btn-xs"><i class="fa fa-image"></i></a>
					<a href="#" data-href="'. base_url('painel/produtos/update') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/produtos/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			//$this->db->order_by('order', 'asc');
			$this->datatables->from('products');
			
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['products'] = $this->db->get('products')->num_rows();
			
			$this->db->select('sub.id, sub.title AS subtitle, cat.title');
			$this->db->join('product_categories as cat', 'cat.id = sub.parent');
			//->where('parent != ', 0)->
			$this->data['product_categories'] = $this->db->get('product_categories as sub')->result();
			

			$this->data['title'] = '<i class="fa fa-archive"></i> Produto';

			return load_admin('products/index', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('description', 'descrição', 'required');
		//$this->form_validation->set_rules('order', 'ordem', 'required');

		if (empty($_FILES['userfile']['name']))
			$this->form_validation->set_rules('userfile', 'imagem em destaque', 'required');
		
		$this->form_validation->set_rules('category', 'categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['description'] = $this->input->post('description');
			//$data['order'] = $this->input->post('order');

			$data['cover'] = uploadIMage('products', FALSE, TRUE);
			
			if($data['cover'])
			{
				try
				{
					//$product = $this->db->where('order' , $data['order'])->get('products')->row();
					/*
					if($product)
					{
						$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `products` LIMIT 1')->row()->maxorder;

						for($i = $maxorder; $i >= $product->order; $i--)
						{
							$this->db->where('order' , $i)->update('products', ['order' => $i+1]);
						}
					}
					*/
					$this->db->insert('products', $data);
					$product = $this->db->insert_id();

					if($product > 0)
					{
						unset($data);
						$data['product_id'] = $product;

						$data['category_id'] = $this->input->post('category');

						$this->db->insert('product_has_categories', $data);

						return toJson(['redirect' => base_url('painel/produtos')]);
					}
					else
					{
						return toJson(['message_add' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
					}
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
		$product = $this->db->where('id', $id)->get('products')->row();
		$product->cover = base_url('assets/img/products/'.$product->cover);
		$product->categories = $this->db->select('category_id')->where('product_id', $id)->get('product_has_categories')->result_array();

		return toJson(['edit' => $product]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'título', 'required');
		$this->form_validation->set_rules('description', 'descricao', 'required');
		//$this->form_validation->set_rules('order', 'ordem', 'required');
		$this->form_validation->set_rules('category', 'categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['description'] = $this->input->post('description');
			//$data['order'] = $this->input->post('order');

			$product = $this->db->where('id', $id)->get('products')->row();

			if(!empty($_FILES['userfile']['name']))
			{
				$data['cover'] = uploadIMage('products', FALSE, TRUE);
				
				if(!$data['cover'])
				{
					return toJson(['message_edit' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
				}
				else
				{
					@unlink(FCPATH.'assets/img/products/'.$product->cover);
					@unlink(FCPATH.'assets/img/products/thumb-'.$product->cover);
				}
			}

			try
			{
				//$order = $this->db->where('order' , $data['order'])->get('products')->row();
				/*
				if($order && ($order->order != $product->order))
				{
					$products = $this->db->where('order >', $product->order)->get('products')->result();

					$this->db->where('id', $product->id)->update('products', ['order' => NULL]);

					foreach ($products as $ban) 
					{
						$this->db->where('id', $ban->id)->update('products', ['order' => $ban->order-1]);
					}

					$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `products` LIMIT 1')->row()->maxorder;

					for($i = $maxorder; $i >= $order->order; $i--)
					{
						$this->db->where('order' , $i)->update('products', ['order' => $i+1]);
					}
					
				}
				*/
				$this->db->where('id', $id)->update('products', $data);
				$count = $this->db->affected_rows();

				$this->db->where('product_id', $id)->delete('product_has_categories');

				unset($data);
				$data['product_id'] = $id;

				$data['category_id'] = $this->input->post('category');

				$this->db->insert('product_has_categories', $data);
				$i = $this->db->insert_id();

				return toJson(['redirect' => base_url('painel/produtos')]);	
				
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
		}
	}

	public function destroy($id)
	{
		$product = $this->db->where('id', $id)->get('products')->row();
		
		try
		{			
			if($this->db->where('id', $id)->delete('products'))
			{
				//$maxorder = $this->db->query('SELECT MAX(`order`) AS `maxorder` FROM `products` LIMIT 1')->row()->maxorder;
				/*
				for($i = $product->order; $i < $maxorder; $i++)
				{
					$this->db->where('order' , $i+1)->update('products', ['order' => $i]);
				}
				*/
				$this->db->where('product_id', $id)->delete('product_has_categories');

				@unlink(FCPATH.'assets/img/products/'.$product->cover);
				@unlink(FCPATH.'assets/img/products/thumb-'.$product->cover);

				$images = $this->db->where('product_id', $id)->get('product_galleries')->result();
				
				foreach ($images as $image) 
				{
					$this->db->where('product_id', $image->id)->delete('product_galleries');
					
					@unlink(FCPATH.'assets/img/products/'.$image->image);
					@unlink(FCPATH.'assets/img/products/thumb-'.$image->image);
				}

				$count = $this->db->get('products')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/produtos')]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O produto '.$product->title.' foi removido com sucesso.')]);
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

/* End of file ProductController.php */
/* Location: ./application/controllers/admin/ProductController.php */