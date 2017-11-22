<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModuleController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store()
	{
		$id 	   = $this->input->post('id');
		$module_id = $this->input->post('module');

		$count = $this->db->where('user_id', $id)->where('module_id', $module_id)->get('user_modules')->num_rows();

		if($count == 0)
		{
			$data['user_id'] = $this->input->post('id');
			$data['module_id'] = $module_id;

			try
			{
				if($this->db->insert('user_modules', $data))
				{
					$module = $this->db->where('id', $data['module_id'])->get('modules')->row();
					$view = $this->load->view('widgets/users/users_modules', ['module' => $module], TRUE);

					return toJson(['module'  => $view]);
				} 
				else
				{
					return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente')]);
				}  
			}
			catch(Exception $e)
			{
				return toJson(['message' => loadMessage('error', 'Erro!', $e->getMessage())]);
			}             
		}
		else
		{
			return toJson(['message' => loadMessage('warning', 'Alerta!', 'O módulo já está associado a este usuário.')]);
		}
	}

	public function destroy($id)
	{
		$user_id = $this->input->post('id');

		$module = $this->db->where('id', $id)->get('modules')->row();

		$user_module = $this->db->where('user_id', $user_id)->where('module_id', $id)->get('user_modules')->row();
		
		try
		{

			if($this->db->where('id', $user_module->id)->delete('user_modules'))
			{
				return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O módulo '.$module->title.' foi removido com sucesso.')]);
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Erro!', 'Não foi possível remover o módulo '.$module->title.', por favor, tente novamente.')]);
			}
		}
		catch(\Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
		}
	}

}

/* End of file UserModuleController.php */
/* Location: ./application/controllers/admin/UserModuleController.php */