<?php get_header(); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Категории</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <?php
                            $args = array(
                                'taxonomy' => 'product_cat',
                                'orderby'    => 'count',
                                'order'      => 'DESC',
                                'hide_empty' => false
                            );

                            $product_categories = get_terms( $args );

                            $count = count($product_categories);
                            if ( $count > 0 ){
                                foreach ( $product_categories as $product_category ) {
                                    echo '
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                     <h4  class="panel-title"><a class="catalogue-menu-link" href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>
                                </div>
                            </div>';
                                }
                            }
                            ?>
                        </div><!--/category-productsr-->

                        <div class="price-range"><!--price-range-->
                            <h2>Price Range</h2>
                            <div class="well">
                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                <b>$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/shipping.jpg" alt="" />
                        </div><!--/shipping-->

                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="blog-post-area">
                        <h2>Поиск по: "<?php echo get_search_query(); ?>"</h2><br>
                        <?php  if(have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="single-blog-post">
                                <h3><?php the_title(); ?></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li><i class="fa fa-user"></i> Mac Doe</li>
                                        <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                        <li><i class="fa fa-calendar"></i> <?php the_date('j F Y'); ?></li>
                                    </ul>
                                    <span>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
									</span>
                                </div>
                                <a href="">
                                    <?php the_post_thumbnail('archive_tumbnail');?>
                                </a>
                                <p><?php the_content(); ?></p>
                                <a  class="btn btn-primary" href="<?php the_permalink(); ?>">Посмотреть запись</a>
                            </div>
                        <?php endwhile; else: ?>
                            <p><?php _e('Ошибка: Поиск ничего не дал.'); ?></p>
                        <?php endif; ?>

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