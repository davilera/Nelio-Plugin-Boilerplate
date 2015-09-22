<?php
/**
 * Displays a radio setting.
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 */

?>

<?php
foreach ( $options as $option ) { ?>
	<p><input type="radio"
		name="<?php echo $name; ?>"
		value="<?php echo $option['value']; ?>"<?php
		if ( $option['value'] == $value ) {
			echo ' checked="checked"';
		}
		?> /><?php
		echo $option['label'];
	?></p>
<?php
} ?>

<?php
$described_options = array();
foreach ( $options as $option ) {
	if ( isset( $option['desc'] ) ) {
		array_push( $described_options, $option );
	}
}

if ( ! empty( $desc ) ) { ?>
	<div class="setting-help">
		<p><span class="description"><?php echo $desc; ?><?php
			if ( ! empty( $more ) ) { ?>
				<a href="<?php echo esc_attr( $more ); ?>"><?php _e( 'Read more...' ); ?></a>
			<?php
			} ?>
		</span></p>

		<?php
		if ( count( $described_options ) > 0 ) { ?>
			<ul style="list-style-type:disc;margin-left:3em;">
				<?php
				foreach ( $described_options as $option ) { ?>
					<li><span class="description"><strong><?php echo $option['label']; ?>.</strong>
						<?php echo $option['desc']; ?></span></li>
				<?php
				} ?>
			</ul>
		<?php
		} ?>

	</div>
<?php
} ?>
