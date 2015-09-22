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
 * @subpackage Plugin_Name/includes/lib/settings/partials
 */

?>

<p><input
	type="checkbox"
	id="<?php echo $id; ?>"
	name="<?php echo $name; ?>"
	<?php if ( $checked ) echo 'checked="checked"'; ?> />
<?php
echo $desc;
if ( ! empty( $more ) ) { ?>
	<span class="plugin-name-desc description" style="display:none;"><a href="<?php echo esc_attr( $more ); ?>"><?php
		_e( 'Read more...' );
	?></a></span>
<?php
} ?></p>
