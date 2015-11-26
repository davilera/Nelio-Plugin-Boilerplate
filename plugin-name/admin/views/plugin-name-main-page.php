<?php
/**
 * Displays the UI for the Main Page.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/views
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

/**
 * These are the variables that must be provided by the calling PHP file:
 *
 * @var string $example Required. Some random string for testing purposes.
 */

?>

<div id="my-account-display" class="wrap">

	<h2><?php esc_html_e( 'Plugin Name', 'plugin-name' ); ?></h2>

	<!-- Add page contents here. For instance: -->

	<p><?php echo esc_html( $example ); ?></p>

</div><!-- .wrap -->
