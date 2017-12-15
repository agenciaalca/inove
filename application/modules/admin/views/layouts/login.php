<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon_1.ico">
	<title>Painel de Controle</title>

	<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/morris/morris.css">
	<link rel="shortcut icon" type="image/png" href="<?= base_url() ?>assets/admin/img/favicon.png">
	<link href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/alt.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="<?= base_url() ?>assets/admin/css/core.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/components.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url() ?>assets/admin/plugins/ladda-buttons/css/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<script src="<?= base_url() ?>assets/admin/js/modernizr.min.js"></script>
</head>
<body>
	<div class="wrapper-page">
		<?= $content ?>
		<div class="row">
			<div class="col-sm-12 text-center">
				<p>&copy; <?php echo date('Y') ?> <a href="http://kodev.com.br" target="_blank">Kodev</a> - Todos os direitos reservados.</p>				
			</div>
		</div>
	</div>
	<script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/ladda-buttons/js/spin.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/ladda-buttons/js/ladda.min.js"></script>
	<script src="<?= base_url() ?>assets/admin/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("body").on("submit", "form", function(event){
				event.preventDefault();

				if($(".ladda-button").length > 0)
				{
					var l = Ladda.create( document.querySelector( '.ladda-button' ) );
					l.start();
				}
				

				var url = $(this).attr('action');
				var data = new FormData($(this)[0]);

				$.ajax(
				{
					type: "POST",
					url: url,
					data: data,
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success: function(data)
					{
						if(data.message)
							$("#message").append(data.message).hide().fadeIn('slow');
						if(data.redirect)
							window.location.href = data.redirect;
						if(l.length >0)
							l.stop();
					}
				});
			});
		});
	</script>
</body>
</html>