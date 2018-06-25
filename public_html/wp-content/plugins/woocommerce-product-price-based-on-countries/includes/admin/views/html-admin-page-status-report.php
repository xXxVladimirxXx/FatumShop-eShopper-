<?php
/**
 * Admin View: Page - Status Report.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wpdb;

?>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="PBC Settings"><h2>Price Based on Country <?php _e( 'General options', 'wc-price-based-country' ); ?></h2></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="Base location"><?php _e( 'Base location', 'woocommerce' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo get_option('woocommerce_default_country') ?></td>
		</tr>		
		<tr>
			<td data-export-label="Price Based On"><?php _e( 'Price Based On', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo get_option('wc_price_based_country_based_on', 'billing') ?></td>
		</tr>
		<tr>
			<td data-export-label="Shipping"><?php _e( 'Shipping', 'wc-price-based-country' ); ?>:</td>	
			<td class="help">&nbsp;</td>
			<td><?php echo 'yes' === get_option( 'wc_price_based_country_shipping_exchange_rate', 'no' ) ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<mark class="no">&ndash;</mark>'; ?></td>						
		</tr>
		<tr>
			<td data-export-label="Test mode"><?php _e( 'Test mode', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo 'yes' === get_option( 'wc_price_based_country_test_mode', 'no' ) ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<mark class="no">&ndash;</mark>'; ?></td>									
		</tr>
		<tr>
			<td data-export-label="Test country"><?php _e( 'Test country', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo ( 'yes' === get_option( 'wc_price_based_country_test_mode', 'no' ) ? get_option( 'wc_price_based_country_test_country', '<mark class="no">&ndash;</mark>' ) : '<mark class="no">&ndash;</mark>' ) ; ?></td>
		</tr>		
		<tr>
			<td data-export-label="Prices entered with tax"><?php _e( 'Prices entered with tax', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo 'yes' === get_option( 'woocommerce_prices_include_tax', 'no' ) ? '<mark class="yes"><span class="dashicons dashicons-yes"></span></mark>' : '<mark class="no">&ndash;</mark>'; ?></td>						
		</tr>	
		<tr>
			<td data-export-label="Calculate tax based on"><?php _e( 'Calculate tax based on', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo get_option('woocommerce_tax_based_on'); ?></td>
		</tr>			
		<?php if ( wcpbc_is_pro() ) : ?>
		<tr>
			<td data-export-label="Currency format"><?php _e( 'Currency Format', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo get_option( 'wc_price_based_currency_format' ) ; ?></td>
		</tr>		
		<?php endif; ?>

	</tbody>
</table>
<?php foreach ( WCPBC()->get_regions() as $slug => $data ) : ?>
<table class="wc_status_table widefat" cellspacing="0">
	<thead>
		<tr>
			<th colspan="3" data-export-label="Zone Pricing <?php echo $data['name'];?>"><h2><?php echo __( 'Zone Pricing', 'wc-price-based-country' ) . ': "' . $data['name'] . '"'; ?></h2></th>			
		</tr>
	</thead>
	<tbody>
		<tr>
			<td data-export-label="slug"><?php _e( 'slug', 'wc-price-based-country' ); ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo $slug; ?></td>									
		</tr>		
	<?php foreach ($data as $key => $value) : ?>
		<tr>
			<td data-export-label="<?php echo $key;?>"><?php echo $key; ?>:</td>			
			<td class="help">&nbsp;</td>
			<td><?php echo is_array($value) ? implode(' | ', $value) : $value; ?></td>									
		</tr>	
	<?php endforeach ; ?>
	</tbody>
</table>
<?php endforeach ; ?>