<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|*****************************************
|	VERIFY IF IS JSON
|*****************************************
*/
if (! function_exists('isJson')) 
{
	function isJson($string) {
		return json_decode($string, true);
	}
}
/*
|*****************************************
|	CONVERT ARRAY TO JSON MESSAGE
|*****************************************
*/
if (! function_exists('toJson')) 
{
	function toJson($data)
	{
		$CI =& get_instance();
		return $CI->output->set_content_type("application/json")->set_output( json_encode($data ) );
	}
}

/*
|*****************************************
|	LOAD MODAL
|*****************************************
*/
if (! function_exists('loadModal')) 
{
	function loadModal($modal, $data = NULL)
	{
		$CI =& get_instance();
		return $CI->load->view('widgets/'.$modal, $data, TRUE);
	}
}
/*
|*************************************************
|   LOAD A MESSAGE
|*************************************************
*/
if (! function_exists('loadMessage')) 
{
	function loadMessage($type, $title, $message, $close = true)
	{
		switch ($type) 
		{
			case 'error':
			$type = 'danger';
			$icon = 'exclamation-circle';
			break;
			case 'success':
			$type = 'success';
			$icon = 'check';
			break;
			case 'warning':
			$type = 'warning';
			$icon = 'exclamation-triangle';
			break;
			case 'info':
			default:
			$type = 'info';
			$icon = 'info-circle';
			break;
		}
		
		$alert  = '<div class="alert alert-'.$type.' alert-dismissable centro">';
		$alert .= ($close) ? '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' : '';
		$alert .= '<i class="fa fa-'.$icon.'" aria-hidden="true"></i> <b>'.$title.'</b> <br>'.$message.'</div>';

		return $alert;
	}
}
/*
|*****************************************
|	PRINT_R WITH PRE TAG
|*****************************************
*/
if (! function_exists('print_pre')) 
{
	function printPre($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

/*
|*****************************************
|	VAR_DUMP WITH PRE TAG
|*****************************************
*/
if (! function_exists('var_pre')) 
{
	function varPre($data)
	{
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
}

/*
|*****************************************
|	GENERATE A RANDOM TOKEN
|*****************************************
*/
if (!function_exists('tokenGenerate')) 
{

	function tokenGenerate($size = 8, $uppercase = true, $numbers = true, $symbols = false) 
	{
		$lower          = 'abcdefghijklmnopqrstuvwxyz';
		$upper          = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$num            = '1234567890';
		$simb           = '!@#$%&*';
		$return         = '';
		$characters     = '';

		$characters .= $lower;
		if ($uppercase) $characters .= $upper;
		if ($numbers)   $characters .= $num;
		if ($symbols)   $characters .= $simb;

		$len            = strlen($characters);
		for ($i = 1; $i <= $size; $i++) 
		{
			$rand       = mt_rand(1, $len);
			$return    .= $characters[$rand - 1];
		}
		return ($return) ? $return : false;
	}
}

/*
|*************************************************
|   REMOVE ALL CHARACTERES
|*************************************************
*/
if (! function_exists('toSlug')) 
{
	function toSlug($string) 
	{
		$characters = array(
			"À" => "A", "Á" => "A", "Ã" => "A", "Â" => "A", 
			"à" => "a", "á" => "a", "ã" => "a", "â" => "a", 
			"É" => "E", "Ê" => "E",
			"é" => "e", "ê" => "e",
			"Í" => "I",
			"í" => "i",
			"Ó" => "O", "Ô" => "O", "Õ" => "O",
			"ó" => "o", "ô" => "o", "õ" => "o",
			"Ú" => "U",
			"ú" => "u",
			);
		$string = strtr($string, $characters);
		return strtolower( preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $string) ) ) );
	}
}

/*
|*************************************************
|   FORMAT TO DEFAULT BRAZIL TIMEZONE
|*************************************************
*/
if(! function_exists('formatTimezone'))
{

	function formatTimezone()
	{
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
	}

}

/*
|*************************************************
|   CONVERT USD TO BRL
|*************************************************
*/
if (! function_exists('usdToBrl')) 
{
	function usdToBrl($number)
	{
		$number = str_replace('.', ',', $number);
		return preg_replace("/[^\d+\,?\d*]/", "", $number);
	}
}

/*
|*************************************************
|   CONVERT BRL TO USD
|*************************************************
*/
if (! function_exists('brlToUsd')) 
{
	function brlToUsd($number)
	{
		$number = str_replace(',', '.', $number);
		return preg_replace("/[^\d+\.?\d*]/", "", $number);
	}
}

/*
|*************************************************
|   FORMAT A DATETIME TO INSERT IN DB
|*************************************************
*/
if (! function_exists('dateToUs')) 
{
	function dateToUs($date)
	{
		return preg_replace('#(\d{2})/(\d{2})/(\d{4})\s?(.*)#', '$3-$2-$1 $4', $date);
	}
}

/*
|*************************************************
|   SEND EMAIL
|*************************************************
*/
if (! function_exists('sendEmail')) 
{
	function sendEmail($from, $fromName = NULL, $to, $subject, $message)
	{
		$CI =& get_instance();

		$CI->load->library('email');

		$CI->email->from($from, $fromName);
		$CI->email->to($to);

		$CI->email->subject($subject);
		$CI->email->message($message);

		return ( $CI->email->send() ) ? true : false;
	}
}
/*
|*************************************************
|   DO UPLOAD OF FILE
|*************************************************
*/
if (! function_exists('uploadIMage')) 
{
	function uploadIMage($path, $thumb = TRUE, $resolution = FALSE, $width = 800, $size = 1024*10)
	{

		$image 	= new upload($_FILES['userfile']);
		$path   	= 'assets/img/'.$path.'/';
		$filename 	= md5(time());

		if($image->uploaded && $image->file_is_image)
		{
			$image->file_new_name_body	= $filename;
			// $image->image_resize      	= true;
			// $image->image_convert     	= 'jpg';
			// $image->image_x     		= $width;
			// $image->image_ratio_y     	= true;
			$image->process($path);

			if($image->processed)
			{
				if($thumb)
				{
					if($image->uploaded && $image->file_is_image)
					{
						$image->file_new_name_body   = $filename;
						$image->image_convert        = 'jpg';
						$image->file_name_body_pre 	 = 'thumb-';
						$image->image_resize         = true;
						$image->image_ratio_crop     = true;
						$image->image_y              = 200;
						$image->image_x              = 200;
						$image->process($path);
					}
				}
				$image->clean();

				return $filename.'.jpg';
			}
			return FALSE;
		}
		
		$data['title'] 		= 'Erro!';
		$data['message'] 	= 'Ocorreu um erro, por favor, tente novamente.';
		$data['type'] 		= 'error';
		$data['status']  	= FALSE;

		return toJson($data);
	}
}
/*
|*************************************************
|   LOAD CONFIG
|*************************************************
*/
if (! function_exists('loadConfig')) 
{
	function loadConfig($config)
	{
		$CI =& get_instance();

		if($config == 'address')
		{
			$config = $CI->db->get('configs')->row();
			return $config->address . ($config->city && !empty($config->city) ? ', '.$config->city . ($config->zipcode && !empty($config->zipcode) ? ' - '.$config->zipcode : '') : '');
		}

		return $CI->db->get('configs')->row()->$config;
	}
}
/*
|*************************************************
|   LOAD SOCIAL
|*************************************************
*/
if (! function_exists('loadSocial')) 
{
	function loadSocial($config)
	{
		$CI =& get_instance();
		return $CI->db->get('socials')->row()->$config;
	}
}
/*
|*************************************************
|   LOAD PAGES
|*************************************************
*/
if (! function_exists('loadPages')) 
{
	function loadPages()
	{
		$CI =& get_instance();
		return $CI->db->get('pages')->result();
	}
}
/*
|*************************************************
|   LOAD GALLERY
|*************************************************
*/
if (! function_exists('loadGalleries')) 
{
	function loadGalleries()
	{
		$CI =& get_instance();
		return $CI->db->order_by('id', 'desc')->get('galleries')->result();
	}
}

function isChildren($title, $isparent)
{
	return (!$isparent) ? '└ ' . $title : $title;
}