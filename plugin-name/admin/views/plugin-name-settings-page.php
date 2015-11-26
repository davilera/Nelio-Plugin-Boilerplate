<?php
/**
 * Displays the UI for configuring the plugin.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/views
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

/**
 * List of vars used in this partial:
 *
 * None.
 */

?>

<div class="wrap">

	<h2><?php esc_html_e( 'Plugin Name - Settings', 'plugin-name' ); ?></h2>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
			$settings = Plugin_Name_Settings::instance();
			settings_fields( $settings->get_option_group() );
			do_settings_sections( $settings->get_settings_page_name() );
			submit_button();
		?>
	</form>

</div><!-- .wrap -->

