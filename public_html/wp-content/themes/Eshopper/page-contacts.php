<?php
/*
Template Name: contacts
Template Post Type: page
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php bloginfo('name'); ?></title>
    <!--[if lt IE 9]
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]--><?php wp_head(); ?>
	<script src=https://maps.googleapis.com/maps/api/js?key=AIzaSyAVOZ2Pwk1wxXT_9SS-3ucDU4EPByYjOPU&sensor=false' type='text/javascript'></script>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/gmaps.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/gsite-map.js" type="text/javascript"></script>
    <style>
        #map {
        height: 400px;
        width: 100%;
        }
    </style>
</head><!--/head-->

<body>
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
	
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h3 class="text-center"><?php the_title(); ?></h3>	    				    				
					<div id="map" class="contact-map">
                        <?php $location = get_field('location'); ?>
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				</div>			 		
			</div>
    		<div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Напишите нам</h2>
                        <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
                <?php $contacts = new WP_Query( array( 'post_type' => 'contacts' ) ); ?>
                <?php if ( have_posts() ) : while ( $contacts->have_posts() ) : $contacts->the_post(); ?>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Контактная информация</h2>
	    				<address>
	    					<p>Fatum Inc.</p>
							<p><?php echo get_option('address'); ?></p>
							<p>Телефон: <?php echo get_option('phone'); ?></p>
							<p>Email: <?php echo get_option('email'); ?></p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Социальные сети</h2>
							<ul>
								<li>
									<a href="<?php echo get_option("Facebook"); ?>"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="<?php echo get_option("Instagram"); ?>"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="<?php echo get_option("Youtube"); ?>"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
                    <?php endwhile; endif; ?>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->

<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<a href="<?php bloginfo( 'url' ); ?>"><h2><span><?php bloginfo( 'name' ); ?></span></h2></a>
							<p><?php bloginfo( 'description' ); ?></p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/map.png" alt="" />
							<p>Наш магазин №<strong>1</strong> в СНГ</p>
						</div>
					</div>
				</div>
			</div>
		</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Навигация по сайту</h2>
							<?php  wp_nav_menu(array(
							'theme_location' => 'menu',
							'container'       => 'false',
							'items_wrap'      => '<ul class="nav nav-pills nav-stacked">%3$s</ul>',
							'container_id'       => 'mainmenu',
							'container_class'       => 'align-center',
							)); ?>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
                            <h2>Подписка на Fatum</h2>
                            <?php
                            $widgetNL = new WYSIJA_NL_Widget(true);
                            echo $widgetNL->widget(array('form' => 2, 'form_type' => 'php'));
                            ?>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2018 <?php bloginfo( 'name' ); ?> Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></span></p>
				</div>
			</div>
		</div>
		
        </footer><!--/Footer-->
    <script>
        function initMap() {
            var lat = <?php echo $location['lat']; ?>;
            var lng = <?php echo $location['lng']; ?>;
            var uluru = {lat: lat, lng: lng};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVOZ2Pwk1wxXT_9SS-3ucDU4EPByYjOPU&callback=initMap">
    </script>
	
	<?php wp_footer(); ?>
</body>
</html>
	