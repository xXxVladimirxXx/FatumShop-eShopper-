<?php
/**
 * Displays the page section of the theme.
 *
 */

get_header(); ?><!--/header-->
<section id="advertisement">
    <div class="container">
        <?php $path = $_SERVER['REQUEST_URI'];
            if ($path == '/shop/') { ?>
            <img src="<?php bloginfo('template_url'); ?>/assets/images/shop/advertisement.jpg" alt="" />
        <?php } ?>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?php get_sidebar(); ?>
            </div>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
                    <?php woocommerce_content(); ?>
				</div>
				<div class="pagination-area">
					<ul class="pagination">
						<?php if(function_exists('wp_corenavi')) { wp_corenavi(); } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>