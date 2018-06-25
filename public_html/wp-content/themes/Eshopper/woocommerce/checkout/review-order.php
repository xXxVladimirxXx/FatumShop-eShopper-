<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
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
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<td colspan="2">
    <table id="table-checkout" class="table table-condensed total-result">
        <tr class="cart-subtotal">
            <th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
            <td><?php wc_cart_totals_subtotal_html(); ?></td>
        </tr>


        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <?php wc_cart_totals_shipping_html(); ?>

            <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

        <?php endif; ?>
        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

        <tr class="order-total">
            <span class="woocommerce-Price-amount amount">
                <th><?php _e( 'Total', 'woocommerce' ); ?></th>
                <td><?php wc_cart_totals_order_total_html(); ?></td>
            </span>
        </tr>

        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
    </table>
</td>
