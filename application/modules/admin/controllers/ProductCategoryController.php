<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductCategoryController extends MY_Controller 
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
			
			$this->datatables->select('id, title, isparent');
			$this->datatables->add_column('action', '
				<div class="pull-right">
					<a href="#" data-href="'. base_url('painel/produtos/categorias/update') .'" data-toggle="modal" data-id="$1" data-target="#edit" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="#" data-href="'. base_url('painel/produtos/categorias/destroy/$1') .'" data-toggle="modal" data-id="$1" data-target="#remove" type="button" class="btn btn-laranja btn-xs"><i class="fa fa-trash"></i></a>
				</div>', 'id');
			$this->db->order_by('groupID, isparent desc, title');
			$this->datatables->edit_column('title', '$1', 'isChildren(title, isparent)');
			$this->datatables->from('(
				select c.*, coalesce(nullif(c.parent, 0), c.id) as groupID,
				case when c.parent = 0 then 1 else 0 end as isparent
				from product_categories c
				left join product_categories p on p.id = c.parent ) c');
			echo $this->datatables->generate();
		}
		elseif ($this->input->method(TRUE) == 'GET')
		{
			$this->data['product_categories'] = $this->db->get('product_categories')->num_rows();
			$this->data['parent_categories']  = $this->db->where('parent', 0)->get('product_categories')->result();
			$this->data['title'] = '<i class="fa fa-archive"></i> Produto Categorias';

			return load_admin('products/categories', $this->data);
		}
	}

	public function store()
	{
		$this->form_validation->set_rules('title', 'nome da categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_add' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['title'] = $this->input->post('title');
			$data['slug'] = toSlug($this->input->post('title'));
			$data['parent'] = $this->input->post('parent');

			try
			{
				if($this->db->insert('product_categories', $data))
					return toJson(['redirect' => base_url('painel/produtos/categorias')]);
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
		$product_category = $this->db->where('id', $id)->get('product_categories')->row();

		return toJson(['edit' => $product_category]);
	}

	public function update()
	{
		$this->form_validation->set_rules('title', 'nome da categoria', 'required');

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_edit' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$id = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['parent'] = $this->input->post('parent');
			$data['slug'] = toSlug($this->input->post('title'));
			
			try
			{
				$this->db->where('id', $id)->update('product_categories', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_edit' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
			if(!$count == 0)
				return toJson(['redirect' => base_url('painel/produtos/categorias')]);
			else
				return toJson(['message_edit' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

	public function destroy($id)
	{
		$product_category = $this->db->where('id', $id)->get('product_categories')->row();
		
		try
		{			
			$count = $this->db->where('category_id', $id)->get('product_has_categories')->num_rows();

			if($count == 0)
			{
				if($this->db->where('id', $id)->delete('product_categories'))
				{
					$count = $this->db->get('product_categories')->num_rows();

					if($count == 0)
						return toJson(['redirect' => base_url('painel/produtos/categorias')]);
					else
						return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'A categoria '.$product_category->title.' foi removida com sucesso.')]);
				}
				else
				{
					return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
				}
			}
			else
			{
				return toJson(['message' => loadMessage('warning', 'Alerta!', 'Existe um ou mais produto cadastrado na categoria , por favor, mova-os antes de remover a categoria '.$product_category->title.'.')]);
			}
		}
		catch(Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}
	}

}

/* End of file ProductCategoryController.php */
/* Location: ./application/controllers/admin/ProductCategoryController.php */