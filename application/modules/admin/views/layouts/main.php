<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/admin/img/favicon.png">

	<title>Painel de controle</title>
	<!-- DataTables -->
	<link href="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?= base_url() ?>assets/admin/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/alt.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?= base_url() ?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/admin/plugins/summernote/summernote.css" rel="stylesheet" />
	<link href="<?= base_url() ?>assets/admin/plugins/lightbox/lightbox.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/custom.min.css">

	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<script src="<?= base_url() ?>assets/admin/js/modernizr.min.js"></script>
</head>
<body>
	<!-- Navigation Bar-->
	<header id="topnav">
		<div class="topbar-main">
			<div class="container">

				<div class="logo bot10">
					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/admin/img/logo.png" class="img-responsive hidden-xs" alt=""></a>
					<a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/admin/img/logoMobile.png" class="img-responsive visible-xs logoMobile" alt=""></a>
				</div>


				<div class="menu-extras">
					<ul class="nav navbar-nav navbar-right pull-right">
						<li class="dropdown navbar-c-items">
							<div class="btn-group" style="margin-top: 15px;">
								<button type="button" class="btn btn-laranja dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i> <span class="hidden-xs">Olá <?php $name = explode(' ', $this->session->userdata('user')->name); echo $name[0]; ?></span> <span class="caret"></span></button>
								<ul class="dropdown-menu" role="menu">
									<li><a href="" data-toggle="modal" data-target="#alterar-senha"><i class="fa fa-angle-right text-custom m-r-10"></i> Meus dados</a></li>
									<li><a href="<?= base_url('painel/logout') ?>"><i class="fa fa-angle-right text-custom m-r-10"></i> Sair</a></li>
								</ul>
							</div>
						</li>
					</ul>
					<div class="menu-item">
						<!-- Mobile menu toggle-->
						<a class="navbar-toggle">
							<div class="lines">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
						<!-- End mobile menu toggle-->
					</div>
				</div>
			</div>
		</div>

		<div class="navbar-custom">
			<div class="container">
				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu">
						<li class="has-submenu"><a href="<?= base_url('painel/dashboard') ?>"><i class="fa fa-home"></i>Início</a></li>
						<?php if(getModuleCategoryStatus('about')): ?>
							<?php if(getModuleCategoryStatus('about') && getModuleCategoryStatus('about_sliders')): ?>
								<li class="has-submenu">
									<a><i class="fa fa-building"></i> Institucional</a>
									<ul class="submenu">
										<li><a href="<?= base_url('painel/institucional') ?>">Institucional Texto</a></li>
										<li><a href="<?= base_url('painel/institucional-sliders') ?>">Institucional Sliders</a></li>
									</ul>
								</li>
							<?php elseif(getModuleCategoryStatus('about')): ?>
								<li><a href="<?= base_url('painel/institucional') ?>"><i class="fa fa-building"></i> Institucional</a></li>
							<?php elseif(getModuleCategoryStatus('about_sliders')): ?>
								<li><a href="<?= base_url('painel/institucional-sliders') ?>"><i class="fa fa-image"></i> Institucional Slider</a></li>
							<?php endif ?>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('blog')): ?>
							<li class="has-submenu">
								<a><i class="fa fa-book"></i> Blog</a>
								<ul class="submenu">
									<li><a  href="<?= base_url('painel/blog') ?>" title="">Postagens</a></li>
									<li><a  href="<?= base_url('painel/blog/categorias') ?>" title="">Categorias</a></li>
								</ul>
							</li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('services')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/servicos') ?>"><i class="fa fa-suitcase"></i> Serviços</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('galleries')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/galerias') ?>"><i class="fa fa-image"></i> Galeria de Fotos</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('partners')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/parceiros') ?>"><i class="fa fa-group"></i> Parceiros</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('videos')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/videos') ?>"><i class="fa fa-video-camera"></i> Vídeos</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('tips')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/dicas') ?>"><i class="fa fa-edit"></i> Dicas</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('portfolios')): ?>
							<li class="has-submenu">
								<a><i class="fa fa-archive"></i> Portifólio</a>
								<ul class="submenu">
									<li><a href="<?= base_url('painel/portfolio') ?>">Ver Todos</a></li>
									<li><a href="<?= base_url('painel/portfolio/categorias') ?>">Categorias</a></li>
								</ul>
							</li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('products')): ?>
							<li class="has-submenu">
								<a><i class="fa fa-archive"></i> Produtos</a>
								<ul class="submenu">
									<li><a href="<?= base_url('painel/produtos') ?>">Ver Todos</a></li>
									<li><a href="<?= base_url('painel/produtos/categorias') ?>">Categorias</a></li>
								</ul>
							</li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('customers')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/clientes') ?>"><i class="fa fa-group"></i> Clientes</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('banners')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/slides') ?>"><i class="fa fa-image"></i> Slides</a></li>
						<?php endif ?>
						<?php if(getModuleCategoryStatus('pages_edit')):
						foreach ($pages as $page): ?>
						<li class="has-submenu"><a href="<?= base_url('painel/paginas/editar/'.$page->slug) ?>"><i class="fa fa-<?= $page->icon ?>"></i> <?= $page->title ?></a></li>
						<?php
						endforeach; 
						endif; ?>
						<?php if(getModuleCategoryStatus('depoiments')): ?>
							<li class="has-submenu"><a href="<?= base_url('painel/depoimentos') ?>"><i class="fa fa-comments"></i> Depoimentos</a></li>
						<?php endif ?>
						
						<?php if (getModuleCategoryStatus('modules') || getModuleCategoryStatus('users')): ?>

							<li class="has-submenu">
								<a><i class="fa fa-cogs"></i>Administração</a>
								<ul class="submenu">
									<?php if(getModuleCategoryStatus('configs')): ?>
										<li><a href="<?= base_url('painel/configuracoes') ?>">Configurações</a></li>
									<?php endif ?>
									<?php if(getModuleCategoryStatus('pages')): ?>
										<li><a href="<?= base_url('painel/paginas') ?>">Páginas</a></li>
									<?php endif ?>
									<?php if(getModuleCategoryStatus('groups')): ?>
										<li><a href="<?= base_url('painel/grupos') ?>">Grupos</a></li>
									<?php endif ?>
									<?php if(getModuleCategoryStatus('modules')): ?>
										<li class="has-submenu">
											<a>Permissãos</a>
											<ul class="submenu" style="left: 100%;">
												<li><a href="<?= base_url('painel/modulos') ?>">Permissões</a></li>
												<li><a href="<?= base_url('painel/modulos/categorias') ?>">Módulos</a></li>
											</ul>
										</li>
									<?php endif ?>
									<?php if(getModuleCategoryStatus('users')): ?>
										<li><a href="<?= base_url('painel/usuarios') ?>">Usuários</a></li>
									<?php endif ?>
								</ul>
							</li>

						<?php else: ?>

							<?php if(getModuleCategoryStatus('configs')): ?>
								<li class="has-submenu"><a href="<?= base_url('painel/configuracoes') ?>"><i class="fa fa-cogs"></i> Configurações</a></li>
							<?php endif ?>

						<?php endif ?>
					</ul>
					<!-- End navigation menu-->
				</div>
			</div> 
		</div> 
	</header>
	
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="portlet">
						<div class="portlet-heading bg-inverse">
							<h3 class="portlet-title"> <?= $title  ?></h3>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="card-box">
						<?= $this->session->userdata('message') ?>
						<div id="message"></div>
						<?= $content ?>
						<?= loadModal('users/change_password') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/detect.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/fastclick.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/jquery.slimscroll.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/jquery.blockUI.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/waves.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/wow.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/jquery.scrollTo.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>	
	<script src="<?= base_url() ?>assets/admin/plugins/switchery/js/switchery.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/summernote/summernote.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/notifyjs/js/notify.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/notifications/notify-metro.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/select2/js/select2.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/lightbox/lightbox.min.js" type="text/javascript"></script>
	<!-- dataTables -->
	<script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.js"></script>

	<script src="<?= base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/jquery-form/jquery.form.js"></script>

	<script src="<?= base_url() ?>assets/admin/js/jquery.core.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/jquery.app.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/custom.min.js"></script>
</body>
</html>