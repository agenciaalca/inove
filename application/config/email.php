<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] 	= 	'smtp';
$config['smtp_host'] 	= 	'smtp.sendgrid.net';
$config['smtp_port'] 	= 	587;
$config['smtp_user'] 	= 	'kodev.smtp';
$config['smtp_pass'] 	= 	'kodev@587';
$config['charset']  	=	'utf-8';
$config['mailtype'] 	=	'html';
$config['wordwrap'] 	=	TRUE;
$config['newline'] 		=	"\r\n";
$config['smtp_timeout'] = 	'4';