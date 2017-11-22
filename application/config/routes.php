<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'site/SiteController/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
|********************************************
|	ADMIN ROUTES
|********************************************
*/

/* Login */
$route['painel/entrar'] 			= "admin/LoginController/index";
$route['painel/logout'] 			= "admin/LoginController/logout";
$route['painel/request_login'] 		= "admin/LoginController/requestLogin";
$route['painel/recuperar_senha']	= "admin/LoginController/lostPassword";
$route['painel/request_password']	= "admin/LoginController/requestPassword";
$route['painel/nova_senha/(:any)']	= "admin/LoginController/newPassword/$1";
$route['painel/save_password']		= "admin/LoginController/savePassword";

/* Dashboard */
$route['painel'] 			= "admin/DashboardController/index";
$route['painel/dashboard']	= "admin/DashboardController/index";
$route['painel/update'] 	= "admin/DashboardController/update";

/* Profile */
$route['painel/perfil/edit/(:num)']	= "admin/ProfileController/edit/$1";
$route['painel/perfil/update'] 			= "admin/ProfileController/update";

/* Configs */
$route['painel/configuracoes'] 						= "admin/ConfigController/index";
$route['painel/configuracoes/novo'] 				= "admin/ConfigController/create";
$route['painel/configuracoes/store'] 				= "admin/ConfigController/store";
$route['painel/configuracoes/visualizar/(:num)'] 	= "admin/ConfigController/show/$1";
$route['painel/configuracoes/edit/(:num)'] 			= "admin/ConfigController/edit/$1";
$route['painel/configuracoes/update'] 				= "admin/ConfigController/update";
$route['painel/configuracoes/destroy/(:num)'] 		= "admin/ConfigController/destroy/$1";

/* Users */
$route['painel/usuarios'] 					= "admin/UserController/index";
$route['painel/usuarios/novo'] 				= "admin/UserController/create";
$route['painel/usuarios/store'] 			= "admin/UserController/store";
$route['painel/usuarios/visualizar/(:num)']	= "admin/UserController/show/$1";
$route['painel/usuarios/editar/(:num)'] 	= "admin/UserController/edit/$1";
$route['painel/usuarios/update'] 			= "admin/UserController/update";
$route['painel/usuarios/destroy/(:num)'] 	= "admin/UserController/destroy/$1";

/* User Modules */
$route['painel/usuarios/modulos'] 					= "admin/UserModuleController/index";
$route['painel/usuarios/modulos/novo'] 				= "admin/UserModuleController/create";
$route['painel/usuarios/modulos/store'] 			= "admin/UserModuleController/store";
$route['painel/usuarios/modulos/visualizar/(:num)']	= "admin/UserModuleController/show/$1";
$route['painel/usuarios/modulos/edit/(:num)'] 		= "admin/UserModuleController/edit/$1";
$route['painel/usuarios/modulos/update'] 			= "admin/UserModuleController/update";
$route['painel/usuarios/modulos/destroy/(:num)'] 	= "admin/UserModuleController/destroy/$1";

/* User Group */
$route['painel/usuarios/grupos'] 					= "admin/UserGroupController/index";
$route['painel/usuarios/grupos/novo'] 				= "admin/UserGroupController/create";
$route['painel/usuarios/grupos/store'] 				= "admin/UserGroupController/store";
$route['painel/usuarios/grupos/visualizar/(:num)']	= "admin/UserGroupController/show/$1";
$route['painel/usuarios/grupos/edit/(:num)'] 		= "admin/UserGroupController/edit/$1";
$route['painel/usuarios/grupos/update'] 			= "admin/UserGroupController/update";
$route['painel/usuarios/grupos/destroy/(:num)'] 	= "admin/UserGroupController/destroy/$1";

/* Groups */
$route['painel/grupos'] 					= "admin/GroupController/index";
$route['painel/grupos/novo'] 				= "admin/GroupController/create";
$route['painel/grupos/store'] 				= "admin/GroupController/store";
$route['painel/grupos/visualizar/(:num)']	= "admin/GroupController/show/$1";
$route['painel/grupos/editar/(:num)'] 		= "admin/GroupController/edit/$1";
$route['painel/grupos/update'] 				= "admin/GroupController/update";
$route['painel/grupos/destroy/(:num)'] 		= "admin/GroupController/destroy/$1";

/* Group Modules */
$route['painel/grupos/modulos/(:num)'] 				= "admin/GroupModuleController/index/$1";
$route['painel/grupos/modulos/novo'] 				= "admin/GroupModuleController/create";
$route['painel/grupos/modulos/store'] 				= "admin/GroupModuleController/store";
$route['painel/grupos/modulos/visualizar/(:num)']	= "admin/GroupModuleController/show/$1";
$route['painel/grupos/modulos/edit/(:num)'] 		= "admin/GroupModuleController/edit/$1";
$route['painel/grupos/modulos/update'] 				= "admin/GroupModuleController/update";
$route['painel/grupos/modulos/destroy/(:num)'] 		= "admin/GroupModuleController/destroy/$1";

/* Modules */
$route['painel/modulos'] 					= "admin/ModuleController/index";
$route['painel/modulos/novo'] 				= "admin/ModuleController/create";
$route['painel/modulos/store'] 				= "admin/ModuleController/store";
$route['painel/modulos/visualizar/(:num)']	= "admin/ModuleController/show/$1";
$route['painel/modulos/edit/(:num)'] 		= "admin/ModuleController/edit/$1";
$route['painel/modulos/update'] 			= "admin/ModuleController/update";
$route['painel/modulos/destroy/(:num)'] 	= "admin/ModuleController/destroy/$1";

/* Module Categories */
$route['painel/modulos/categorias'] 					= "admin/ModuleCategoryController/index";
$route['painel/modulos/categorias/novo'] 				= "admin/ModuleCategoryController/create";
$route['painel/modulos/categorias/store'] 				= "admin/ModuleCategoryController/store";
$route['painel/modulos/categorias/visualizar/(:num)']	= "admin/ModuleCategoryController/show/$1";
$route['painel/modulos/categorias/edit/(:num)'] 		= "admin/ModuleCategoryController/edit/$1";
$route['painel/modulos/categorias/update'] 				= "admin/ModuleCategoryController/update";
$route['painel/modulos/categorias/destroy/(:num)'] 		= "admin/ModuleCategoryController/destroy/$1";

/* Pages */
$route['painel/paginas'] 					= "admin/PageController/index";
$route['painel/paginas/novo'] 				= "admin/PageController/create";
$route['painel/paginas/store'] 				= "admin/PageController/store";
$route['painel/paginas/visualizar/(:any)']	= "admin/PageController/show/$1";
$route['painel/paginas/editar/(:any)'] 		= "admin/PageController/edit/$1";
$route['painel/paginas/update'] 			= "admin/PageController/update";
$route['painel/paginas/destroy/(:any)'] 	= "admin/PageController/destroy/$1";


/*
|********************************************
|	MODULES ROUTES
|********************************************
*/

/* Banners */
$route['painel/slides'] 					= "admin/BannerController/index";
$route['painel/slides/novo'] 				= "admin/BannerController/create";
$route['painel/slides/store'] 				= "admin/BannerController/store";
$route['painel/slides/visualizar/(:num)'] 	= "admin/BannerController/show/$1";
$route['painel/slides/edit/(:num)'] 		= "admin/BannerController/edit/$1";
$route['painel/slides/update'] 				= "admin/BannerController/update";
$route['painel/slides/destroy/(:num)'] 		= "admin/BannerController/destroy/$1";

/* Customers */
$route['painel/clientes'] 					= "admin/CustomerController/index";
$route['painel/clientes/novo'] 				= "admin/CustomerController/create";
$route['painel/clientes/store'] 			= "admin/CustomerController/store";
$route['painel/clientes/visualizar/(:num)']	= "admin/CustomerController/show/$1";
$route['painel/clientes/edit/(:num)'] 		= "admin/CustomerController/edit/$1";
$route['painel/clientes/update'] 			= "admin/CustomerController/update";
$route['painel/clientes/destroy/(:num)'] 	= "admin/CustomerController/destroy/$1";

/* Products */
$route['painel/produtos']                      = "admin/ProductController/index";
$route['painel/produtos/novo']                 = "admin/ProductController/create";
$route['painel/produtos/store']                = "admin/ProductController/store";
$route['painel/produtos/visualizar/(:num)']    = "admin/ProductController/show/$1";
$route['painel/produtos/edit/(:num)']          = "admin/ProductController/edit/$1";
$route['painel/produtos/update']               = "admin/ProductController/update";
$route['painel/produtos/destroy/(:num)']       = "admin/ProductController/destroy/$1";

/* Product Categories */
$route['painel/produtos/categorias']                       = "admin/ProductCategoryController/index";
$route['painel/produtos/categorias/novo']                  = "admin/ProductCategoryController/create";
$route['painel/produtos/categorias/store']                 = "admin/ProductCategoryController/store";
$route['painel/produtos/categorias/visualizar/(:num)']     = "admin/ProductCategoryController/show/$1";
$route['painel/produtos/categorias/edit/(:num)']           = "admin/ProductCategoryController/edit/$1";
$route['painel/produtos/categorias/update']                = "admin/ProductCategoryController/update";
$route['painel/produtos/categorias/destroy/(:num)']        = "admin/ProductCategoryController/destroy/$1";

/* Product Images */
$route['painel/produtos/imagens/(:num)']           = "admin/ProductGalleryController/index/$1";
$route['painel/produtos/imagens/store']            = "admin/ProductGalleryController/store";
$route['painel/produtos/imagens/update']           = "admin/ProductGalleryController/update";
$route['painel/produtos/imagens/destroy/(:num)']   = "admin/ProductGalleryController/destroy/$1";
    
/* Tips */
$route['painel/dicas'] 						= "admin/TipController/index";
$route['painel/dicas/novo'] 				= "admin/TipController/create";
$route['painel/dicas/store'] 				= "admin/TipController/store";
$route['painel/dicas/visualizar/(:num)']	= "admin/TipController/show/$1";
$route['painel/dicas/edit/(:num)'] 			= "admin/TipController/edit/$1";
$route['painel/dicas/update'] 				= "admin/TipController/update";
$route['painel/dicas/destroy/(:num)'] 		= "admin/TipController/destroy/$1";

/* About */
$route['painel/institucional'] 			= "admin/AboutController/edit/1";
$route['painel/institucional/update']	= "admin/AboutController/update";
	
/*
|********************************************
|	SITE DEFAULT ROUTES
|********************************************
*/

$route['inicio'] =	'site/SiteController/home';

$route['fale-conosco']			=	'site/SiteController/contact';
$route['fale-conosco/send_mail']=	'site/SiteController/send_mail';

$route['sobre-nos']                 =   'site/SiteController/about';
$route['produtos/(:any)']           =   'site/SiteController/products/$1';
$route['produtos/(:any)/(:any)']    =   'site/SiteController/products/$1/$2';
$route['produto/(:any)']            =  'site/SiteController/product/$1';
$route['clientes']                  =   'site/SiteController/customer';
$route['dicas']                     =   'site/SiteController/tips';
$route['dica/(:any)']               =   'site/SiteController/tip/$1';

/*
|********************************************
|	SITE CUSTOM ROUTES
|********************************************
*/

$route['(:any)'] = 'site/SiteController/page/$1';