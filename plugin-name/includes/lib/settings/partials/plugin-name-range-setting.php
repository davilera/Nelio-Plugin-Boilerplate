<?php
/**
 * Displays a range setting.
 *
 * See the class `Plugin_Name_Range_Setting`.
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 */
?>

<input
	type="range"
	id="<?php echo $id; ?>"
	name="<?php echo $name; ?>"
	min="<?php echo $min; ?>"
	max="<?php echo $max; ?>"
	step="<?php echo $step; ?>"
	value="<?php echo $value; ?>"
	/>
<?php
if ( ! empty( $verbose_value ) ) { ?>
		<p id="label-<?php echo $id; ?>"><span class="plugin-name-desc description" style="display:none;"></span></p>
		<script type="text/javascript">
		(function() {
			var elem = jQuery( '#<?php echo $id; ?>' );
			function setLabel( value ) {
				var label = <?php echo json_encode( $verbose_value ); ?>;
				label = label.replace( '{value}', value );
				jQuery( '#label-<?php echo $id; ?> .description' ).html( label );
			}
			setLabel( elem.attr( 'value' ) );
			elem.on( 'input change', function() {
				setLabel( elem.attr( 'value' ) );
			});
		})();
		</script>
<?php
} ?>

<?php
if ( ! empty( $desc ) ) { ?>
	<div class="setting-help">
		<p><span class="plugin-name-desc description" style="display:none;"><?php
			echo $desc;
			if ( ! empty( $more ) ) { ?>
				<a href="<?php echo esc_attr( $more ); ?>"><?php _e( 'Read more...' ); ?></a>
			<?php
			} ?>
		</span></p>
	</div>
<?php
} ?>
