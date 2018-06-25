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
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="<?php bloginfo( 'template_url' ); ?>/assets/images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->
    <?php dynamic_sidebar( 'sidebar' ); ?>
</div>