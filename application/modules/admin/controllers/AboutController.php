<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function edit($id)
	{
		$about = $this->db->where('id', 1)->get('about')->row();

		$this->data['title'] = '<i class="fa fa-edit"></i> Texto Institucional';

		$this->data['content'] = $about->content;

		return load_admin('about/index', $this->data);
	}

	public function update()
	{
		$data['content'] = $this->input->post('content');
		
		try
		{
			$this->db->where('id', 1)->update('about', $data);
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

}

/* End of file AboutController.php */
/* Location: ./application/controllers/admin/AboutController.php */