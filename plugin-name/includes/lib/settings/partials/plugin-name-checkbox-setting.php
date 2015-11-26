<?php
/**
 * Displays a checkbox setting.
 *
 * See the class `Plugin_Name_Checkbox_Setting`.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

?>

<p><input
	type="checkbox"
	id="<?php echo esc_attr( $id ); ?>"
	name="<?php echo esc_attr( $name ); ?>"
	<?php checked( $checked ); ?> />
<?php
// @codingStandardsIgnoreStart
echo $desc;
// @codingStandardsIgnoreEnd
if ( ! empty( $more ) ) { ?>
	<span class="description"><a href="<?php echo esc_attr( $more ); ?>"><?php
		esc_html_e( 'Read more...' );
	?></a></span>
<?php
} ?></p>
