<?php
/**
 * Displays a range setting.
 *
 * See the class `Plugin_Name_Range_Setting`.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

?>

<input
	type="range"
	id="<?php echo esc_attr( $id ); ?>"
	name="<?php echo esc_attr( $name ); ?>"
	min="<?php echo esc_attr( $min ); ?>"
	max="<?php echo esc_attr( $max ); ?>"
	step="<?php echo esc_attr( $step ); ?>"
	value="<?php echo esc_attr( $value ); ?>"
	/>
<?php
if ( ! empty( $verbose_value ) ) { ?>
		<p id="label-<?php echo esc_attr( $id ); ?>"><span class="description"></span></p>
		<script type="text/javascript">
		(function() {
			var elem = jQuery( '#<?php echo esc_attr( $id ); ?>' );
			function setLabel( value ) {
				var label = <?php echo wp_json_encode( $verbose_value ); ?>;
				label = label.replace( '{value}', value );
				jQuery( '#label-<?php echo esc_attr( $id ); ?> .description' ).html( label );
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
