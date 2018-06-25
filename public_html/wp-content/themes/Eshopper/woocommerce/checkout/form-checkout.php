<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="<?php bloginfo('url'); ?>">Главная</a></li>
                <li class="active">Оформление заказа</li>
            </ol>
        </div><!--/breadcrums-->

        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <?php if ( $checkout->get_checkout_fields() ) : ?>

                <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

                <div class="col2-set" id="customer_details">
                    <div class="col-1">
                        <?php do_action( 'woocommerce_checkout_billing' ); ?>
                    </div>

                    <div class="col-2">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                    </div>
                </div>

                <?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

            <?php endif; ?>

            <h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

            <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

            <div id="order_review" class="woocommerce-checkout-review-order">
                <section id="cart_items">
                    <div class="container">
                        <div class="table-responsive cart_info">
                            <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                                <table class="table table-condensed woocommerce-cart-form__contents" cellspacing="0">
                                    <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Товар</td>
                                        <td class="description"></td>
                                        <td class="price">Цена</td>
                                        <td class="quantity">Количество</td>
                                        <td class="total">Сумма</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                                    <?php
                                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                            ?>
                                            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                                <td class="cart_product"><?php
                                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                                    if ( ! $product_permalink ) {
                                                        echo $thumbnail;
                                                    } else {
                                                        printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                                    }
                                                    ?></td>

                                                <td class="cart_description">
                                                    <h4>
                                                        <?php
                                                        /*
                                                         * Выводим название товара и его артикул
                                                         */
                                                        if ( ! $product_permalink ) {
                                                            echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;</h4>';
                                                            echo apply_filters( 'woocommerce_cart_item_name', $_product->get_sku(), $cart_item, $cart_item_key ) . '&nbsp;';
                                                        } else {
                                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a></h4>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
                                                            echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<p> Артикул: <a href="%s">%s</a> </p>', esc_url( $product_permalink ), $_product->get_sku() ), $cart_item, $cart_item_key );
                                                        }

                                                        // Meta data.
                                                        echo wc_get_formatted_cart_item_data( $cart_item );

                                                        // Backorder notification.
                                                        if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                                                            echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
                                                        }
                                                        ?>
                                                </td>

                                                <td class="cart_price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                                    <p> <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?> </p>
                                                </td>

                                                <td class="product-quantity" style="margin: 15px -70px 10px 25px !important;" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                                    <?php
                                                    if ( $_product->is_sold_individually() ) {
                                                        $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                                    } else {
                                                        $product_quantity = woocommerce_quantity_input( array(
                                                            'input_name'    => "cart[{$cart_item_key}][qty]",
                                                            'input_value'   => $cart_item['quantity'],
                                                            'max_value'     => $_product->get_max_purchase_quantity(),
                                                            'min_value'     => '0',
                                                            'product_name'  => $_product->get_name(),
                                                        ), $_product, false );
                                                    }

                                                    echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
                                                    ?></td>

                                                <td class="cart_total" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                                    <p style="color: #FE980F; font-size: 24px;" >
                                                        <?php
                                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                                        ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php do_action( 'woocommerce_cart_contents' ); ?>

                                    <tr>
                                        <td colspan="6" class="actions">
                                            <a id="rewrite_cart" href="/cart">Вернуться к корзине</a>
                                        </td>
                                    </tr>



                                    <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                                    </tbody>
                                </table>
                            </form>

                        </div><?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>
                </section> <!--/#cart_items-->

            </div>

            <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

        </form>
        <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
    </div>
</section>
