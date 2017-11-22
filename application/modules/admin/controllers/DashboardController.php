<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{		
		$this->data['title'] = '<i class="fa fa-home"></i> Início';

		return load_admin('dashboard/index', $this->data);
	}
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/admin/DashboardController.php */