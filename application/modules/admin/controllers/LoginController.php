<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{		
		if($this->session->userdata('user')) redirect(base_url('painel'));
		
		$data['title'] = 'Entrar';
		
		return load_login('login', $data);
	}

	public function requestLogin()
	{
		$email = $this->input->post('email');

		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'senha', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			return toJson(['message' => loadMessage('error', 'Falha ao acessar!', validation_errors())]);
		} 
		else 
		{
			$count = $this->db->where('email', $email)->get('users')->num_rows();

			if(!$count == 0)
			{
				$password = $this->input->post('password');
				$account = $this->db->where('email', $email)->where('password', hash('sha512', $password))->get('users')->row();

				if(!count($account) == 0)
				{
					unset($account->password);				
					$this->session->set_userdata( ['user' => $account] );

					return toJson(['redirect' => base_url('painel/dashboard')]);
				}
				else
				{
					return toJson(['message' => loadMessage('error', 'Falha ao acessar!', 'Senha incorreta.')]);
				}
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Falha ao acessar!', 'E-mail não encontrado no sistema.')]);
			}
		}

	}

	public function lostPassword()
	{
		$data['title'] = 'Recuperação de Senha';
		return load_login('lost_password', $data);
	}

	public function requestPassword()
	{
		$email = $this->input->post('email');

		$this->form_validation->set_rules('email', 'email', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			
			$account = $this->db->where('email', $email)->get('users')->row();

			if(!$account == 0)
			{
				$token = tokenGenerate(18);
				
				try
				{
					$this->db->where('id', $account->id)->update('users', ['token' => $token]);
					$count = $this->db->affected_rows();
				}
				catch(Exception $e)
				{
					return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
				}

				if(!$count == 0)
				{
					$data['name'] = $account->name;
					$data['email'] = $account->email;
					$data['token'] = $token;

					$message = $this->load->view('email/lost_password', $data, TRUE);

					$company = $this->db->get('configs')->row();

					$sendMail = sendEmail($company->email, $company->title, $account->email, 'Recuperação de Senha', $message);

					if($sendMail == TRUE)
					{
						return toJson(['message' => loadMessage('success', 'Sucesso!', 'Um email de recuperação foi enviado para '.$account->email.'.')]);
					}
					else
					{
						return toJson(['message' => loadMessage('error', 'Erro!', 'Não foi possível enviar um email de recuperação, por favor, tente novamente mais tarde.')]);
					}
				}
				else
				{
					return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente mais tarde.')]);
				}
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Erro!', 'Este email não existe.')]);
			}
			
		}
	}

	public function newPassword($token)
	{
		$data['title'] = 'Nova Senha';
		return load_login('new_password', $data);
	}

	public function savePassword()
	{
		$token = $this->input->post('token');

		$this->form_validation->set_rules('token', 'token', 'trim|required');
		$this->form_validation->set_rules('password', 'senha', 'trim|required');
		$this->form_validation->set_rules('re_password', 'confirmar senha', 'trim|required|matches[password]');		

		if ($this->form_validation->run() == FALSE)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', validation_errors())]);
		} 
		else 
		{
			
			$account = $this->db->where('token', $token)->get('users')->row();

			if(!$account == 0)
			{
				try
				{
					$password = $this->input->post('password');
					
					$this->db->where('token', $account->token)->update('users', ['password' => hash('sha512', $password)]);
					$count = $this->db->affected_rows();
				}
				catch(Exception $e)
				{
					return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
				}
				if(!$count == 0)
				{
					return toJson(['message' => loadMessage('success', 'Sucesso!', 'Sua senha foi alterada, agora você pode fazer login.')]);
				}
			}
			
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->sess_destroy();
		redirect(base_url('painel/entrar'));
	}

}

/* End of file LoginController.php */
/* Location: ./application/controllers/admin/LoginController.php */