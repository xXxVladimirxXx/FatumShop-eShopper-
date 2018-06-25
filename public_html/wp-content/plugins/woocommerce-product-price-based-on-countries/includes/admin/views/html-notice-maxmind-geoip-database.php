<?php
/**
 * Admin View: Notice - MaxMind GeoIP database
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="notice notice-info notice-pbc pbc-is-dismissible">	
	<a class="notice-dismiss pbc-hide-notice" data-nonce="<?php echo wp_create_nonce( 'pbc-hide-notice' )?>" data-notice="maxmind_geoip_database" href="#"><span class="screen-reader-text"><?php _e( 'Dismiss this notice.' ); ?></span></a>	
	<p><strong>WooCommerce Price Based on Country:</strong> <?php printf( __( 'The MaxMind GeoIP Database does not exist, geolocation will not function. %sClick here to install the MaxMind GeoIP Database now%s.', 'wc-price-based-country' ), '<a href="' . esc_url( add_query_arg( 'update_geoip_database', wp_create_nonce( 'wc_price_based_country_update_geoip_database' ) ) ) . '">', '</a>' ); ?></p>		
</div>