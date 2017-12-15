<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VerifyPermissionHook
{
    function verifyPermission()
    {
        $CI =& get_instance();
        $router =& load_class('Router', 'core');

        $controller = $router->fetch_class();
        $method = $router->fetch_method();

        if(!$controller == 'LoginController' && !$CI->session->userdata('user') || (!$CI->session->userdata('user') && $controller == 'DashboardController' )) return redirect('painel/entrar');
        
        if($router->fetch_directory() != NULL && $controller != 'SiteController' && $controller != 'LoginController')
        {
            $permission = FALSE;
            foreach (getPermission() as $key => $value) 
            {
                if($key && $key == $controller)
                {
                    foreach ($value as $key2 => $val) 
                    {
                        if($key2 && $key2 == $method ||  ($controller != 'UserGroupController' && $method == 'store' || $method == 'update' || $method == 'show'))
                        {
                            $permission = TRUE;
                        }
                    }
                }
            }

            if(!$permission)
            {
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    return toJson(['close' => TRUE, 'message' => loadMessage('warning', 'Alerta!', 'Você não tem permissão.')]);
                }
                else
                {
                    $CI->session->set_flashdata('message', loadMessage('warning', 'Alerta!', 'Você não tem permissão!'));
                }
                redirect('painel/dashboard');
            }
            return true;
        }
    }
}