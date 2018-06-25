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
	
	<?php wp_footer(); ?>
</body>
</html>