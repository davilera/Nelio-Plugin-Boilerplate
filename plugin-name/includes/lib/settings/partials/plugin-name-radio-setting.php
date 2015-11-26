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

/**
 * List of vars used in this partial:
 *
 * @var array   $options The list of options.
 *                       Each of them is an array with its label, description, and so on.
 * @var string  $name    The name of this field.
 * @var boolean $value   The concrete value of this field (or an empty string).
 * @var string  $desc    Optional. The description of this field.
 * @var string  $more    Optional. A link with more information about this field.
 */

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
						?>.</strong>
						<?php
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
