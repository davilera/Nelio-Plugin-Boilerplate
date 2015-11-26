<?php
/**
 * Displays an input setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

/**
 * List of vars used in this partial:
 *
 * @var string  $type        The concrete type of this input.
 * @var string  $id          The identifier of this field.
 * @var string  $name        The name of this field.
 * @var boolean $value       The concrete value of this field (or an empty string).
 * @var string  $placeholder Optional. A default placeholder.
 * @var string  $desc        Optional. The description of this field.
 * @var string  $more        Optional. A link with more information about this field.
 */

?>

<p><input
	type="<?php echo esc_attr( $type ); ?>"
	id="<?php echo esc_attr( $id ); ?>"
	placeholder="<?php esc_attr( $placeholder ); ?>"
	name="<?php echo esc_attr( $name ); ?>"
	<?php
	if ( 'password' === $type ) { ?>
		onchange="
			document.getElementById('<?php echo esc_attr( $id ); ?>-check').pattern = this.value;
			if ( this.value != '' ) {
				document.getElementById('<?php echo esc_attr( $id ); ?>-check').required = 'required';
			} else {
				document.getElementById('<?php echo esc_attr( $id ); ?>-check').required = undefined;
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
	type="<?php echo esc_attr( $type ); ?>"
	id="<?php echo esc_attr( $id ); ?>-check"
	placeholder="<?php esc_attr_e( __( 'Confirm Password...', 'plugin-name' ) ); ?>"
	name="<?php echo esc_attr( $name ); ?>" /></p>
<?php
}
if ( ! empty( $desc ) ) { ?>
	<div class="setting-help" style="display:none;">
		<p><span class="description"><?php
		// @codingStandardsIgnoreStart
		echo $desc;
		// @codingStandardsIgnoreEnd
		if ( ! empty( $more ) ) { ?>
			<a href="<?php echo esc_attr( $more ); ?>"><?php esc_html_e( 'Read more...' ); ?></a>
		<?php
		} ?>
		</span></p>
	</div>
<?php
} ?>
