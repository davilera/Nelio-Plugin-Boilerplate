<?php
/**
 * Displays a radio setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

?>

<?php
foreach ( $options as $option ) { ?>
	<p><input type="radio"
		name="<?php echo esc_attr( $name ); ?>"
		value="<?php echo esc_attr( $option['value'] ); ?>"
		<?php checked( $option['value'] === $value ); ?> /><?php
		// @codingStandardsIgnoreStart
		echo $option['label'];
		// @codingStandardsIgnoreEnd
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

		<?php
		if ( count( $described_options ) > 0 ) { ?>
			<ul style="list-style-type:disc;margin-left:3em;">
				<?php
				foreach ( $described_options as $option ) { ?>
					<li><span class="description"><strong><?php
						// @codingStandardsIgnoreStart
						echo $option['label'];
						// @codingStandardsIgnoreEnd
						?>.</strong><?php
						// @codingStandardsIgnoreStart
						echo $option['desc'];
						// @codingStandardsIgnoreEnd
						?></span></li>
				<?php
				} ?>
			</ul>
		<?php
		} ?>

	</div>
<?php
} ?>
