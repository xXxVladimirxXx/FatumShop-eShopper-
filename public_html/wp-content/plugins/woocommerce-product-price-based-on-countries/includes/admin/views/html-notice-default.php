<?php
/**
 * Admin View: Default Notice
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="notice notice-<?php echo $type; ?> is-dismissible">
	<p><?php echo $message; ?></p>
</div>