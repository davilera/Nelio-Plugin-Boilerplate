<?php
/**
 * Displays the UI for configuring the plugin.
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/views
 */
?>

<div class="wrap">

	<h2><?php _e( 'Plugin Name - Settings', 'plugin-name' ); ?></h2>

	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php
			$settings = Plugin_Name_Settings::instance();
			settings_fields( $settings->get_option_group() );
			do_settings_sections( $settings->get_settings_page_name() );
			submit_button();
		?>
	</form>

	<script type="text/javascript">
	(function($) {
		$( 'img.plugin-name-help' ).parent().click( function( ev ) {
			ev.preventDefault();
			$(this).closest( 'tr' ).find( '.plugin-name-desc' ).toggle();
		});
	})(jQuery);
	</script>

</div><!-- .wrap -->

