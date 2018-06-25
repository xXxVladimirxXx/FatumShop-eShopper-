<?php /*
Template Name: cart
Template Post Type: page
*/
get_header(); ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="<?php bloginfo('url'); ?>">Главная</a></li>
                    <li class="active">Корзина</li>
                </ol>
            </div>

            <div class="table-responsive cart_info">
                <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Информация</td>
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
                                    <td class="cart_product">

                                        <?php
                                        /*
                                         * Выводим изображение
                                         */
                                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

                                        if ( ! $product_permalink ) {
                                            echo $thumbnail;
                                        } else {
                                            printf( '<a class="product-thumbnail" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                                        }
                                        ?>
                                    </td>

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
                                    <td class="cart_delete">
                                        <?php
                                        /*
                                         * Удаляем из корзины
                                         */

                                        // @codingStandardsIgnoreLine
                                        echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                            '<a href="%s" class="cart_quantity_delete" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
                                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                            __( 'Remove this item', 'woocommerce' ),
                                            esc_attr( $product_id ),
                                            esc_attr( $_product->get_sku() )
                                        ), $cart_item_key );
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                        <?php do_action( 'woocommerce_cart_contents' ); ?>

                        <tr>
                            <td colspan="6" class="actions">

                                <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?> " style="float: right;"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                                <?php do_action( 'woocommerce_cart_actions' ); ?>

                                <?php wp_nonce_field( 'woocommerce-cart' ); ?>
                            </td>
                        </tr>

                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                        </tbody>
                    </table>
                    <?php do_action( 'woocommerce_after_cart_table' ); ?>
                </form>

            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <div id="messedge-cart">
                    <?php if ( woocommerce_product_loop() ) :
                        do_action( 'woocommerce_before_shop_loop' );

                        do_action( 'woocommerce_after_shop_loop' );
                    endif; ?>
                </div>
                <h3>Оформить заказ</h3>
                <p>Если у вас есть скидочныйе талоны, укажите их здесь.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <div class="cart-collaterals">
                            <?php
                            /**
                             * Cart collaterals hook.
                             *
                             * @hooked woocommerce_cross_sell_display
                             * @hooked woocommerce_cart_totals - 10
                             */
                            do_action( 'woocommerce_cart_collaterals' );
                            ?>
                        </div>

                        <?php do_action( 'woocommerce_after_cart' ); ?>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Страна:</label>
                                <select>
                                    <option>Россия</option>
                                    <option>Болгария</option>
                                    <option>Украина</option>
                                    <option>Казахстан</option>
                                    <option>Азейбарджан</option>
                                </select>
                            </li>
                            <li class="single_field">
                                <label>Укажиет адрес: </label>
                                <input type="text">
                            </li>
                            <li class="single_field zip-field">
                                <form class="woocommerce-cart-form" action="http://l9971350.beget.tech/cart/" method="post">
                                    <?php if ( wc_coupons_enabled() ) { ?>
                                        <div class="coupon">
                                            <label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
                                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                        </div>
                                    <?php } ?>
                                </form>
                            </li>
                        </ul>

                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Ввод</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>
                                <?php _e( 'Subtotal', 'woocommerce' );
                                wc_cart_totals_subtotal_html(); ?>
                            </li>

                            <li>
                                <?php _e( 'Shipping', 'woocommerce' ); ?>
                                <label style="float: right;">₴50</label>
                            </li>

                            <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
                                $taxable_address = WC()->customer->get_taxable_address();
                                $estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
                                    ? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
                                    : '';

                                if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                                        <li>
                                            <?php echo esc_html( $tax->label ) . $estimated_text; ?>
                                            <?php echo wp_kses_post( $tax->formatted_amount ); ?>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <li>
                                        <?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?>
                                        <?php wc_cart_totals_taxes_total_html(); ?>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

                            <li>
                                <?php _e( 'Total', 'woocommerce' ); ?>
                                <?php wc_cart_totals_order_total_html(); ?>
                            </li>

                        </ul>
                        <a class="btn btn-default update" href="/cart/">Изменить</a>
                        <a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="btn btn-default checkout-button button alt wc-forward">
                            <?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

<?php get_footer(); ?>