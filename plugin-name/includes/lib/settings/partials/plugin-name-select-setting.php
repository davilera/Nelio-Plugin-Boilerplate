<?php
/**
 * Displays a select setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

?>

<select
	id="<?php echo esc_attr( $id ); ?>"
	name="<?php echo esc_attr( $name ); ?>">

	<?php
	foreach ( $options as $option ) { ?>
		<option value="<?php echo esc_attr( $option['value'] ); ?>"<?php
		if ( $option['value'] === $value ) {
			echo ' selected="selected"';
		}
		?>><?php
		// @codingStandardsIgnoreStart
		echo $option['label'];
		// @codingStandardsIgnoreEnd
		?></option>
	<?php
	} ?>

</select>

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
