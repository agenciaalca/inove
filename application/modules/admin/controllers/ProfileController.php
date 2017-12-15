<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function update()
	{
		$id = $this->session->userdata('user')->id;

		$this->form_validation->set_rules('name', 'nome', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		if($this->input->post('password') != NULL)
		{
			$this->form_validation->set_rules('password', 'senha', 'required');
			$this->form_validation->set_rules('passconf', 'confirmar senha', 'required|matches[password]');
		}

		if ($this->form_validation->run() == FALSE) 
		{
			return toJson(['message_profile' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			
			if($this->input->post('password') != NULL)
				$data['password'] = hash('sha512', $this->input->post('password'));
			
			try
			{
				$this->db->where('id', $id)->update('users', $data);
				$count = $this->db->affected_rows();
			}
			catch(Exception $e)
			{
				return toJson(['message_profile' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}
			
			if(!$count == 0)
			{
				$account = $this->db->where('id', $id)->get('users')->row();
				unset($account->password);				
				
				$this->session->set_userdata( ['user' => $account] );

				return toJson(['close'=>TRUE]);
			}
			else
				return toJson(['message_profile' => loadMessage('warning', 'Alerta!', 'Não houve alteração.')]);
		}
	}

}

/* End of file ProfileController.php */
/* Location: ./application/controllers/admin/ProfileController.php */