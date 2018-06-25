<!DOCTYPE html>
<html lang="<?php echo language_attributes();?>">
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo('name'); ?></title>
    <!--[if lt IE 9]
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]--><?php wp_head(); ?>
</head><!--/head-->

<body <?php body_class(); ?> >
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> <?php echo get_option('phone'); ?></a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> <?php echo get_option('email'); ?></a></li>
                            </ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="<?php echo get_option("Facebook"); ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php echo get_option("Instagram"); ?>"><i class="fa fa-instagram"></i></a></li>
								<li><a href="<?php echo get_option("Youtube"); ?>"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php bloginfo( 'url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <?php  wp_nav_menu(array(
                                    'theme_location' => 'authentication',
                                    'container'       => 'false',
                                    'items_wrap'      => '<ul class="nav navbar-nav collapse navbar-collapse">%3$s</ul>',
                                    'container_id'       => 'mainmenu',
                                    'container_class'       => 'align-center',
                                ));
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="mainmenu pull-left">
							<?php  wp_nav_menu(array(
							'theme_location' => 'menu',
							'container'       => 'false',
							'items_wrap'      => '<ul class="nav navbar-nav collapse navbar-collapse">%3$s</ul>',
							'container_id'       => 'mainmenu',
							'container_class'       => 'align-center',
							)); ?>
						</div>
					</div>
					<div class="col-sm-3">
                            <?php get_search_form( true ); ?>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header>