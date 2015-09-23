<?php
/**
 * Displays an input setting.
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 */

?>

<p><input
	type="<?php echo $type; ?>"
	id="<?php echo $id; ?>"
	<?php if ( ! empty( $placeholder ) ) echo 'placeholder="' . esc_attr( $placeholder ) . '"'; ?>
	name="<?php echo $name; ?>"
	<?php
	if ( 'password' === $type ) { ?>
		onchange="
			document.getElementById('<?php echo $id; ?>-check').pattern = this.value;
			if ( this.value != '' ) {
				document.getElementById('<?php echo $id; ?>-check').required = 'required';
			} else {
				document.getElementById('<?php echo $id; ?>-check').required = undefined;
			}
		"
	<?php
	} else { ?>
		value="<?php echo esc_attr( $value ); ?>"
	<?php
	} ?> /></p>
<?php
if ( 'password' === $type ) { ?>
<p><input
	type="<?php echo $type; ?>"
	id="<?php echo $id; ?>-check"
	placeholder="<?php esc_attr_e( __( 'Confirm Password...', 'plugin-name' ) ); ?>"
	name="<?php echo $name; ?>" /></p>
<?php
}
if ( ! empty( $desc ) ) { ?>
	<div class="setting-help" style="display:none;">
		<p><span class="description"><?php echo $desc; ?><?php
			if ( ! empty( $more ) ) { ?>
				<a href="<?php echo esc_attr( $more ); ?>"><?php _e( 'Read more...' ); ?></a>
			<?php
			} ?>
		</span></p>
	</div>
<?php
} ?>
