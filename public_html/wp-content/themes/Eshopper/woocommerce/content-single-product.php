<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Hook Woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

//Получаем артикул
global $product;
$sku = $product->get_sku();
?>

    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <?php the_post_thumbnail('img_product_single');?>
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <?php global $product;
                        $post_ids = $product->get_id();

                        $attachment_ids = $product->get_gallery_attachment_ids();

                        $count_gallery = '0';

                        echo '<div class="item active">';

                        foreach( $attachment_ids as $attachment_id ) {

                            $count_gallery ++;

                            echo wp_get_attachment_image( $attachment_id, array(85, 84) );

                            if ($count_gallery == '3') { ?>
                                </div>
                                <div class="item">
                            <?php
                            }
                        }
                    echo '</div>'; ?>
                </div>
                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <h2><?php the_title(); ?></h2>
                <p>Артикул: <?php echo $sku; ?></p>
                <?php if(function_exists('the_ratings')) { the_ratings(); } ?>

                <span>
                  <span>
                      <?php echo get_woocommerce_currency_symbol(); ?>
                      <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                  </span>
                    <?php do_action( 'woocommerce_single_product_summary' );?>
				</span>
                <p><b>Availability:</b> In Stock</p>
                <p><b>Condition:</b> New</p>
                <p><b>Brand:</b> E-SHOPPER</p>
                <a href=""><img src="<?php bloginfo('template_url'); ?>/assets/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div><!--/product-information-->
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Details</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                <li><a href="#tag" data-toggle="tab">Tag</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
            </ul>
        </div>
        <div class="tab-pane fade active in" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-clock-o"></i><?php the_time('G:i'); ?></a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i><?php the_date('j F Y'); ?></a></li>
                </ul>
                <p><?php the_content(); ?></p>
                <p>Оставьте свой отзыв</p>
                <span>
                    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
                </span>
            </div>
        </div>
    </div>
    <div class="response-area">
        <?php if (comments_open()) { //Производим проверку на «открытость» комментраиев
            if(get_comments_number() != 0){ //Если комментарии есть, делаем вывод

                comments_template('/comments.php');
                wp_list_comments(array('callback' => 'fatum_comment'));
            }
        } else { ?>
            <h2>Обсуждения закрыты для данной статьи</h2>
        <?php } ?>
    </div><!--/Response-area-->

    <div class="replay-box">
        <div class="row">
            <!-- Выводим форму добавления комментариев -->
            <?php
            $args = array(
                'fields' =>
                    $fields = array(
                        'author' => ' 
                            <div class="col-sm-4">
                            <div class="blank-arrow">
                                 <label for="author">' . __( 'Name' ) . ($req ? '*' : '') . '</label>
                            </div>
                            <input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '>',

                        'email' => '
                            <div class="blank-arrow">
                                <label for="email">' . __( 'Email') . ($req ? '*' : '') . '</label>
                            </div>
                            <input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="example@example.com" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '>',

                        'url' => '
                            <div class="blank-arrow">
                               <label for="url">' . __( 'Website' ) . ($req ? '*' : '') . '</label>
                            </div>
                            <input type="url" id="url" name="url" class="site" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="www.example.com" maxlength="30" tabindex="3" autocomplete="on">
                            </div>' ),
                'comment_notes_after' => '',
                'comment_field' => '
                            <div class="col-sm-8">
                                <div class="text-area">
                                    <textarea id="comment" name="comment" rows="11" aria-required="true" placeholder="Текст сообщения..."></textarea></p>
                                    <p class="form-submit">
                                        <input name="submit" type="submit" id="submit" class="btn btn-default" value="Отправить">
                                        <input type="hidden" name="comment_post_ID" value="537" id="comment_post_ID">
                                        <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                                    </p>
                                </div>
                            </div>',
                'label_submit' => 'Отправить',
                'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
                'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
            );
            if (get_comments_number() == 0) { ?>
                <h2>Комментариев пока нет, но вы можете стать первым</h2>
                <?php
                comment_form($args);
            } else {
                comment_form($args);
            } ?>
        </div>
    </div><!--/Repaly Box-->
    <div class="recommended_items"><!--recommended_items [recent_products] -->
        <h2 class="title text-center">Рекомендуемые товары</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="item active">
                    <?php echo do_shortcode('[featured_products per_page=3 order=ASC]'); ?>
                </div>
                <div class="item">
                    <?php echo do_shortcode('[featured_products per_page=3 order=DESC]'); ?>
                </div>

            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->


<?php
/**
do_action( 'woocommerce_single_product_summary' );

do_action( 'woocommerce_after_single_product_summary' );

do_action( 'woocommerce_after_single_product' );
 **/
?>