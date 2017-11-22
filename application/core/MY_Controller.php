<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller 
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();

		$this->data['pages'] = $this->db->get('pages')->result();
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */