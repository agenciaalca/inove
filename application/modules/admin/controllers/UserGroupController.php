<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserGroupController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function store()
	{
		$id 	   = $this->input->post('id');
		$group_id = $this->input->post('group');

		$count = $this->db->where('user_id', $id)->where('group_id', $group_id)->get('user_groups')->num_rows();

		if($count == 0)
		{
			$data['user_id'] = $this->input->post('id');
			$data['group_id'] = $group_id;

			try
			{
				if($this->db->insert('user_groups', $data))
				{
					$group = $this->db->where('id', $data['group_id'])->get('groups')->row();
					$view = $this->load->view('widgets/users/users_groups', ['group' => $group], TRUE);

					return toJson(['group'  => $view]);
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
			return toJson(['message' => loadMessage('warning', 'Alerta!', 'O grupo já está associado a este usuário.')]);
		}
	}

	public function destroy($id)
	{
		$user_id = $this->input->post('id');

		$group = $this->db->where('id', $id)->get('groups')->row();

		$user_group = $this->db->where('user_id', $user_id)->where('group_id', $id)->get('user_groups')->row();

		try
		{

			if($this->db->where('id', $user_group->id)->delete('user_groups'))
			{
				return toJson(['status' => TRUE, 'message' => loadMessage('success', 'Sucesso!', 'O grupo '.$group->title.' foi removido com sucesso.')]);
			}
			else
			{
				return toJson(['message' => loadMessage('error', 'Erro!', 'Não foi possível remover o grupo '.$group->title.', por favor, tente novamente.')]);
			}
		}
		catch(\Exception $e)
		{
			return toJson(['message' => loadMessage('error', 'Erro!', 'Ocorreu um erro, por favor, tente novamente.')]);
		}
	}

}

/* End of file UserGroupController.php */
/* Location: ./application/controllers/admin/UserGroupController.php */