<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|*****************************************
|	LOAD ADMIN PAGES
|*****************************************
*/
if (! function_exists('load_admin')) 
{
	function load_admin($page, $data = NULL)
	{
		$CI = &get_instance();
		return $CI->load->view('layouts/main', ['content' => $CI->load->view('pages/'.$page, $data, TRUE)]);
	}
}

/*
|*****************************************
|	LOAD LOGIN, LOST PASSWORD, ETC. PAGES
|*****************************************
*/
if (! function_exists('load_login')) 
{
	function load_login($page, $data = NULL)
	{
		$CI = &get_instance();
		return $CI->load->view('layouts/login', ['content' => $CI->load->view('login/'.$page, $data, TRUE)]);
	}
}
/*
|*****************************************
|	LOAD SITE PAGES
|*****************************************
*/
if (! function_exists('load_site')) 
{
	function load_site($page, $data = NULL)
	{
		$CI = &get_instance();
		return $CI->load->view('layouts/main', ['content' => $CI->load->view('pages/'.$page, $data, TRUE)]);
	}
}
