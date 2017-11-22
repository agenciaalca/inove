<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends MX_Controller 
{
	private $data;

	public function __construct()
	{
		parent::__construct();
		
		$this->data['customers']		  =	$this->db->order_by('order', 'asc')->get('customers')->result();
		$this->data['parent_categories']  = $this->db->where('parent', 0)->get('product_categories')->result();
		
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function home()
	{		
		$this->data['title'] 	= 'Início';

		$this->data['banners']	=	$this->db->order_by('order', 'asc')->get('banners')->result();
		
		$this->data['about'] 	= $this->db->get('about')->row()->content;

		return load_site('home', $this->data);
	}

	public function about()
	{
		$this->data['title'] = 'Sobre nós';

		$this->data['about'] = $this->db->get('about')->row()->content;

		return load_site('about', $this->data);
	}

	public function products($category = NULL, $subcategory = NULL)
	{
		$limit 	= 12;
		$offset	= ($this->input->post('offset')) ? $this->input->post('offset') * $limit : 0;

		if(!$category && !$this->input->post('offset'))
			redirect($this->agent->referrer(),'refresh');

		$this->db->select('p2.*, p1.slug as slug_category, p1.title as category');
		$this->db->join('product_categories as p2', 'p2.parent = p1.id');
		$this->db->where('p1.slug', $category);
		$categories = $this->db->get('product_categories as p1')->result();

		$this->data['children_categories'] = $categories;

		$this->db->select('products.*');
		$this->db->join('product_has_categories', 'product_has_categories.product_id = products.id', 'inner');	
		$this->db->join('product_categories as p1', 'p1.id = product_has_categories.category_id', 'inner');
		$this->db->join('product_categories as p2', 'p2.id = p1.parent', 'inner');
		if ($subcategory) 
			$this->db->where('p1.slug', $subcategory);
		else
			$this->db->where('p2.slug', $category);
		$products['products'] 	= $this->db->get('products', $limit, $offset)->result();

		$this->db->select('products.*');
		$this->db->join('product_has_categories', 'product_has_categories.product_id = products.id', 'inner');	
		$this->db->join('product_categories as p1', 'p1.id = product_has_categories.category_id', 'inner');
		$this->db->join('product_categories as p2', 'p2.id = p1.parent', 'inner');
		if ($subcategory) 
			$this->db->where('p1.slug', $subcategory);
		else
			$this->db->where('p2.slug', $category);
		$this->data['total'] 	= $this->db->get('products')->num_rows();
		$this->data['products'] = $this->load->view('widgets/product', $products, TRUE);
		$this->data['title'] 	= isset($categories[0]->category) ? $categories[0]->category : NULL;

		if($this->input->post())
		{
			return toJson($this->data['products']);
		}

		return load_site('products', $this->data);
	}

	public function product($slug = NULL)
	{
		if(!$slug)
			redirect($this->agent->referrer(),'refresh');

		$product = $this->db->where('slug', $slug)->get('products')->row();

		$this->data['title']  	= $product->title;

		$this->data['product']	= $product;
		$this->data['images'] 	= $this->db->where('product_id', $product->id)->get('product_galleries')->result();

		return load_site('product', $this->data);
	}

	public function customer()
	{
		$this->data['title'] = 'Clientes';
		
		return load_site('customer', $this->data);
	}

	public function tips()
	{
		$this->data['title'] 	= 'Dicas';

		$this->data['tips'] 	= $this->db->get('tips')->result();

		return load_site('tips', $this->data);
	}

	public function tip($slug = NULL)
	{
		if(!$slug)
			redirect($this->agent->referrer(),'refresh');

		$tip = $this->db->where('slug', $slug)->get('tips')->row();		

		$this->data['title']	= $tip->title;

		$this->data['tip'] 		= $tip;

		return load_site('tip', $this->data);
	}

	public function contact()
	{
		$this->data['title'] = 'Contato';

		return load_site('contact', $this->data);
	}

	public function page($slug)
	{
		$result = false;
		
		$page = $this->db->where('slug', $slug)->get('pages')->row();

		if($page->slug == $slug)
		{
			$this->data['title'] = $page->title;
			$this->data['menu']  = $page->slug;

			return load_site('page',$this->data);
		}

		return $slug;
	}

	public function send_mail()
	{
		$config = $this->db->get('configs')->row();
		$post   = $this->input->post();

		$subject  = 'Contato via website';
		$message  = '<strong>Nome:</strong> ' . 	$post['name'] . '<br/>';
		$message .= '<strong>Email:</strong> ' . 	$post['email'] . '<br/>';
		$message .= '<strong>Assunto:</strong> ' . 	$post['subject'] . '<br/>';
		$message .= '<strong>Mensagem:</strong> ' . nl2br($post['message']) . '<br/>';

		if(sendEmail($post['email'], 'Jean Marie', $config->email, $subject, $message))
			$this->session->set_flashdata('message', loadMessage('success', 'Sucesso!', 'Mensagem encaminhada com sucesso!'));
		else
			$this->session->set_flashdata('message', loadMessage('error', 'Erro!', 'Falha ao enviar mensagem!'));

		redirect(base_url('fale-conosco'));
	}
}

/* End of file SiteController.php */
/* Location: ./application/controllers/SiteController.php */