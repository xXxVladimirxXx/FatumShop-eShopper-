<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo( 'name' ); ?></title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<?php wp_head(); ?>
</head><!--/head-->

	<div class="container text-center">
		<div class="logo-404">
			<a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/logo.png" alt="" /></a>
		</div>
		<div class="content-404">
			<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/404/404.png" class="img-responsive" alt="" />
			<h1><b>OPPS!</b> Такой страницы нет!</h1>
			<p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
			<h2><a href="<?php bloginfo( 'url' ); ?>">Вернуться на главную</a></h2>
		</div>
	</div>
  
	<?php wp_footer(); ?>
</body>
</html>
