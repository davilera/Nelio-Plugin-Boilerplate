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

<input
	type="<?php echo $type; ?>"
	id="<?php echo $id; ?>"
	<?php if ( ! empty( $placeholder ) ) echo 'placeholder="' . esc_attr( $placeholder ) . '"'; ?>
	name="<?php echo $name; ?>"
	value="<?php echo esc_attr( $value ); ?>" />
<?php
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
