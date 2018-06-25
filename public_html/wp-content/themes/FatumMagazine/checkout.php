<?php
/*
Template Name: checkout
Template Post Type: page
*/
get_header(); ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Главная</a></li>
                    <li class="active">Оформление заказа</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Доставка</p>
                            <div class="form-one">
                                <form>
                                    <input type="text" placeholder="Email">
                                    <input type="text" placeholder="Title">
                                    <input type="text" placeholder="Имя *">
                                    <input type="text" placeholder="Фамилия">
                                    <input type="text" placeholder="Address *">
                                    <input type="text" placeholder="Город *">
                                    <input type="text" placeholder="Телефон *">
                                </form>
                            </div>
                        </div>
                    </div>



                    <?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
                        <div class="woocommerce-account-fields">
                            <?php if ( ! $checkout->is_registration_required() ) : ?>

                                <p class="form-row form-row-wide create-account">
                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ) ?> type="checkbox" name="createaccount" value="1" /> <span><?php _e( 'Create an account?', 'woocommerce' ); ?></span>
                                    </label>
                                </p>

                            <?php endif; ?>

                            <?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

                            <?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

                                <div class="create-account">
                                    <?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
                                        <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
                                    <?php endforeach; ?>
                                    <div class="clear"></div>
                                </div>

                            <?php endif; ?>

                            <?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Пожелания</p>
                            <textarea name="message"  placeholder="Ваши пожелания к товару" rows="16"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Пересмотрите & Измените</h2>
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



                                <button style="float: right;" type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                                <?php do_action( 'woocommerce_cart_actions' ); ?>

                                <?php wp_nonce_field( 'woocommerce-cart' ); ?>


                            </td>
                        </tr>

                        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                        </tbody>
                    </table>

                    <div id="total-checkout">
                        <?php _e( 'Total', 'woocommerce' ); ?>
                        <?php wc_cart_totals_order_total_html(); ?>
                    </div>

                    <?php do_action( 'woocommerce_after_cart_table' ); ?>

                </form>

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


            </div>
    </section>

<?php get_footer(); ?>