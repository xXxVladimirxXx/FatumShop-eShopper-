<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="<?php the_post_thumbnail_url('woocommerce_thumbnail');?>" alt="" />
                <h4>₴<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></h4>
                <p><?php echo  get_the_title(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Посмотреть товар</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h4 style="color:white;">₴<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></h4>
                    <p><?php echo  get_the_title(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Посмотреть товар</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
            </ul>
        </div>
    </div>
</div>
	
<?php
	/**
	do_action( 'woocommerce_before_shop_loop_item' );

	do_action( 'woocommerce_before_shop_loop_item_title' );

	do_action( 'woocommerce_after_shop_loop_item_title' );

	do_action( 'woocommerce_shop_loop_item_title' );
     **/
?>