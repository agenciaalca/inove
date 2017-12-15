<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfigController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['title'] = '<i class="fa fa-cogs"></i> Configurações';

		$this->data['configs'] = $this->db->get('configs')->row();
		$this->data['socials'] = $this->db->get('socials')->row();

		return load_admin('configs/index', $this->data);
	}

	public function update()
	{
		$conf['title'] 		= $this->input->post('title');
		$conf['subtitle'] 	= $this->input->post('subtitle');
		$conf['email'] 		= $this->input->post('email');
		$conf['phone'] 		= $this->input->post('phone');
		$conf['cell'] 		= $this->input->post('cell');
		$conf['address'] 	= $this->input->post('address');
		$conf['city'] 		= $this->input->post('city');
		$conf['zipcode'] 	= $this->input->post('zipcode');

		try
		{
			$this->db->where('id', 1)->update('configs', $conf);
			$count1 = $this->db->affected_rows();
		}
		catch(Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}

		$social['description'] = $this->input->post('description');
		$social['keywords'] = $this->input->post('keywords');

		try
		{
			$this->db->where('id', 1)->update('socials', $social);
			$count2 = $this->db->affected_rows();
		}
		catch(Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
		}

		if(!$count1 == 0 || !$count2 == 0)
			return toJson( ['message' => loadMessage('success', 'Sucesso!', 'Informações salvas com sucesso!')] );
		else
			return toJson( ['message' => loadMessage('warning', 'Alerta!', 'Não houve alteração!')] );
		
	}
}

/* End of file ConfigController.php */
/* Location: ./application/controllers/admin/ConfigController.php */