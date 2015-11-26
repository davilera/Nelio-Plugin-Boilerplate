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

/**
 * List of vars used in this partial:
 *
 * @var string  $id      The identifier of this field.
 * @var string  $name    The name of this field.
 * @var boolean $checked Whether this checkbox is selected or not.
 * @var string  $desc    Optional. The description of this field.
 * @var string  $more    Optional. A link with more information about this field.
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
