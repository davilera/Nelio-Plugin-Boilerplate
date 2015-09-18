<?php
/**
 * Displays a checkbox setting.
 *
 * See the class `Plugin_Name_Checkbox_Setting`.
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin/views/partials/settings
 */

?>

<input
	type="checkbox"
	id="<?php echo $id; ?>"
	name="<?php echo $name; ?>"
	<?php if ( $checked ) echo 'checked="checked"'; ?> />
<?php
echo $desc;
if ( ! empty( $more ) ) { ?>
	<span class="description"><a href="<?php echo esc_attr( $more ); ?>"><?php
		_e( 'Read more...' );
	?></a></span>
<?php
} ?>