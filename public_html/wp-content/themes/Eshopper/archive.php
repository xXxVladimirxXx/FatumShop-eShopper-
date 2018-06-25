<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                   <?php get_sidebar(); ?>
                </div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Блог</h2>
                        <?php
                        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $params = array(
                        'posts_per_page' => 3, // количество постов на странице
                        'paged'           => $current_page // текущая страница
                        );
                        query_posts($params);

                        $wp_query->is_archive = true;
                        $wp_query->is_home = false;

                        while(have_posts()): the_post(); ?>
                        <div class="single-blog-post">
								<h3><?php the_title(); ?></h3>
								<div class="post-meta">
									<ul>
										<li><i class="fa fa-user"></i> <?php the_author(); ?></li>
										<li><i class="fa fa-clock-o"></i> <?php the_time('G:i'); ?></li>
										<li><i class="fa fa-calendar"></i> <?php the_date('j F Y'); ?></li>
									</ul>
									<span>
                                        <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
									</span>
								</div>
								<a href="">
									<?php the_post_thumbnail('archive_tumbnail');?>
								</a>
								<p><?php the_content(); ?></p>
								<a  class="btn btn-primary" href="<?php the_permalink(); ?>">Посмотреть запись</a>
							</div>
                        <?php endwhile; ?>

						<div class="pagination-area">
							<ul class="pagination">
								<?php if(function_exists('wp_corenavi')) { wp_corenavi(); } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>