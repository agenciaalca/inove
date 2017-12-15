<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductGalleryController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index($id)
	{
		$products = $this->db->where('product_id', $id)->order_by('order', 'asc')->get('product_galleries')->result();

		$this->data['products'] = $products;
		$this->data['title'] = '<i class="fa fa-image"></i> Produto Imagens';

		return load_admin('products/images', $this->data);
	}

	public function store()
	{
		$id = $this->input->post('id');

		$data = [];
		$data['product_id'] = $id;

		$files = $_FILES;
		
		$count = count($_FILES['userfile']['name']);
		
		unset($_FILES);
		
		$product = "";

		for($i = 0; $i < $count; $i++)
		{           
			$_FILES['userfile']['name'] = $files['userfile']['name'][$i];
			$_FILES['userfile']['type'] = $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error'] = $files['userfile']['error'][$i];
			$_FILES['userfile']['size'] = $files['userfile']['size'][$i];

			$data['image'] = uploadIMage('products', TRUE);

			if($data['image'])
			{
				try
				{
					$this->db->insert('product_galleries', $data);
					$image_id = $this->db->insert_id();
				}
				catch(Exception $e)
				{
					return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
				}

				$image = $this->db->where('id', $image_id)->get('product_galleries')->row();

				$product .= "<div class='col-xs-2 col-md-2 draggable' id='image-".$image->id."'>";
				$product .= "<a href='#' data-href='". base_url('painel/produtos/imagens/destroy/'.$image->id) ."' data-toggle='modal' data-id='".$image->id."' data-target='#remove' class='remove' ><i class='fa fa-close'></i></a>";
				$product .= "<a href='".base_url('')."assets/img/products/".$image->image."' data-lightbox='".$image->id."' class='thumbnail'>";
				$product .= "<img src='".base_url('')."assets/img/products/thumb-".$image->image."' alt='Imagem'>";
				$product .= "</a>";
				$product .= "</div>";				
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
			}
		}
		return toJson(['product' => $product]);
	}

	public function update()
	{
		try
		{
			$i = 0;
			foreach ($_POST['image'] as $value) 
			{
				$this->db->where('id', $value)->update('product_galleries', ['order' => $i]);
				$i++;
			}
		}
		catch(Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}
	}

	public function destroy($id)
	{
		$image = $this->db->where('id', $id)->get('product_galleries')->row();
		
		try
		{			
			if($this->db->where('id', $id)->delete('product_galleries'))
			{
				@unlink(FCPATH.'assets/img/products/'.$image->image);
				@unlink(FCPATH.'assets/img/products/thumb-'.$image->image);

				$count = $this->db->get('product_galleries')->num_rows();

				if($count == 0)
					return toJson(['redirect' => base_url('painel/produtos/imagens/'.$image->product_id)]);
				else
					return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'A imagem foi removida com sucesso.')]);
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

/* End of file ProductGalleryController.php */
/* Location: ./application/controllers/admin/ProductGalleryController.php */