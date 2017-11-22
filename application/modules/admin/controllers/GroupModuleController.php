<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupModuleController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store()
	{
		$id = $this->input->post('id');

		$module_id = $this->input->post('module');

		$exists = $this->db->where('group_id', $id)->where('module_id', $module_id)->get('group_modules')->num_rows();

		if($exists == 0)
		{
			unset($data);
			
			$data['group_id'] = $id;
			$data['module_id'] = $module_id;

			try
			{
				if($this->db->insert('group_modules', $data))
				{
					$module = $this->db->where('id', $data['module_id'])->get('modules')->row();
					$view = $this->load->view('widgets/groups/groups_modules', ['module' => $module], TRUE);

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

		$group_id = $this->input->post('id');

		$module = $this->db->where('id', $id)->get('modules')->row();		

		$group_module = $this->db->where('group_id', $group_id)->where('module_id', $id)->get('group_modules')->row();

		try
		{
			if($this->db->where('id', $group_module->id)->delete('group_modules'))
			{
				return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O módulo '.$module->title.' foi removido com sucesso.')]);
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

/* End of file GroupModuleController.php */
/* Location: ./application/controllers/admin/GroupModuleController.php */