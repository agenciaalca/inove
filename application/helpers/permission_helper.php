<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|*************************************************
|   VERIFY THE USER PERMISSIONS 
|*************************************************
*/
if (! function_exists('getPermission')) 
{
    function getPermission()
    {
        // all permissions
        $CI =& get_instance();
        $user_modules = getModules($CI->session->userdata('user')->id);

        // public permissions must be add manually
        $user_modules['InstallController']['index'] = TRUE;
        $user_modules['InstallController']['store'] = TRUE;

        $user_modules['DashboardController']['index'] = TRUE;
        $user_modules['DashboardController']['update'] = TRUE;
        
        $user_modules['ProfileController']['edit'] = TRUE;
        $user_modules['ProfileController']['update'] = TRUE;
        
        return $user_modules;
    }
}
/*
|*************************************************
|   VERIFY CONTROLLERS/METHODS PERMISSIONS 
|*************************************************
*/
if (! function_exists('verifyPermission'))
{
    function verifyPermission($controller, $method)
    {
        $permission = FALSE;

        foreach (getPermission() as $key => $value) 
        {
            if($key == $controller)
            {
                foreach ($value as $key2 => $val) 
                {
                    if($key2 == $method)
                    {
                        $permission = TRUE;
                    }
                }
            }
        }
        if(!$permission)
        {
            return false;
        }
        return true;
    }
}
/*
|*************************************************
|   GET USER MODULES
|*************************************************
*/
if (! function_exists('getUserModules')) 
{
    function getModules($user_id)
    {
        $modules = [];
        
        $user_groups = getUserGroups($user_id);

        foreach($user_groups  as $group)
        {
            $group_modules = getGroupModules($group->id);

            foreach($group_modules as $prog)
            {
                if($prog)
                    $modules[$prog->class][$prog->method] = TRUE;
            }
        }
        foreach(getUserModules($user_id) as $prog)
        {
            $modules[$prog->class][$prog->method] = TRUE;
        }
        
        return $modules;
    }

}
/*
|*************************************************
|   GET USER GROUPS
|*************************************************
*/
if (! function_exists('getUserGroups')) 
{
    function getUserGroups($user_id)
    {
        $user_groups = [];
        
        $CI =& get_instance();
        $data = $CI->db->where('user_id', $user_id)->get('user_groups')->result();

        if ($data)
        {
            foreach ($data as $user_group)
            {
                $user_groups[] = $CI->db->where('id', $user_group->group_id)->get('groups')->row();
            }
        }
        return $user_groups;
    }
}
/*
|*************************************************
|   GET GROUP MODULES
|*************************************************
*/
if (! function_exists('getGroupModules')) 
{
    function getGroupModules($group_id)
    {
        $group_modules = [];
        
        $CI =& get_instance();
        $data = $CI->db->where('group_id', $group_id)->get('group_modules')->result();

        if ($data)
        {
            foreach ($data as $group_module)
            {
                $gm = 
                $CI->db->select('modules.*, module_categories.slug')
                ->join('module_categories', 'modules.category = module_categories.id')
                ->where('modules.id', $group_module->module_id)
                ->where('module_categories.status', TRUE)
                ->get('modules')
                ->row();
                $group_modules[] = $gm;
                
                /*$group_modules[] = \App\Module::find($group_module->module_id);*/
            }
        }
        return $group_modules;
    }
}
/*
|*************************************************
|   GET USER MODULES
|*************************************************
*/
if (! function_exists('getUserModules')) 
{
    function getUserModules($user_id)
    {
        $user_modules = [];
        
        $CI =& get_instance();
        $data = $CI->db->where('user_id', $user_id)->get('user_modules')->result();

        if ($data)
        {
            foreach ($data as $user_module)
            {
                $um = 
                $CI->db->select('modules.*')
                ->join('module_categories', 'modules.category = module_categories.id')
                ->where('modules.id', $user_module->module_id)
                ->where('module_categories.status', TRUE)
                ->get('modules')
                ->row();
                $user_modules[] = $um;
                
                /*$user_modules[] = \App\Module::find($user_module->module_id);*/
            }
        }
        return $user_modules;
    }
}
/*
|*************************************************
|   VERIFY THE STATUS OF MODULE CATEGORY BY SLUG
|*************************************************
*/
if (! function_exists('getModuleCategoryStatus')) 
{
    function getModuleCategoryStatus($slug)
    {
        $CI =& get_instance();

        if($slug == 'modules')
        {
            $groups = getUserGroups($CI->session->userdata('user')->id);
            
            $result = FALSE;
            
            foreach ($groups as $group) 
            {
                if($group->id == 1) $result = TRUE;
            }

            return $result;
        }
        else
        {
            if($slug == 'pages_edit') $slug = 'pages';
            
            $result = $CI->db->select('status')->where('slug', $slug)->get('module_categories')->row();
            return ($result) ? $result->status : FALSE;
        }
    }
}
/*
|*************************************************
|   VERIFY THE STATUS OF MODULE
|*************************************************
*/
if (! function_exists('getGroupStatus')) 
{
    function getModuleStatus($id)
    {
        $result = FALSE;

        $CI =& get_instance();
        $modules = getUserModules($CI->session->userdata('user')->id);

        foreach ($modules as $module) 
        {
            if($module == $id) $result = TRUE;
        }
        if(!$result) 
        {
            return FALSE;
        }

        return $result;
    }
}
/*
|*************************************************
|   VERIFY THE STATUS OF GROUP
|*************************************************
*/
if (! function_exists('getGroupStatus')) 
{
    function getGroupStatus($id)
    {
        $result = FALSE;
        
        $CI =& get_instance();
        
        if($id == 1)
        {
            $groups = getUserGroups($CI->session->userdata('user')->id);

            foreach ($groups as $group) 
            {
                if($group->id == $id) $result = TRUE;
            }
            if(!$result) 
            {
                return FALSE;
            }
        }

        return $result;
    }
}