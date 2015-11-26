<?php
/**
 * Displays an text area setting.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

/**
 * List of vars used in this partial:
 *
 * @var string  $id          The identifier of this field.
 * @var string  $name        The name of this field.
 * @var string  $value       The concrete value of this field (or an empty string).
 * @var string  $placeholder Optional. A default placeholder.
 * @var string  $desc        Optional. The description of this field.
 * @var string  $more        Optional. A link with more information about this field.
 */

?>

<textarea
	id="<?php echo esc_attr( $id ); ?>" cols="40" rows="4"
	placeholder="<?php echo esc_attr( $placeholder ) ?>"
	name="<?php echo esc_attr( $name ); ?>" /><?php
		// @codingStandardsIgnoreStart
		echo $value;
		// @codingStandardsIgnoreEnd
?></textarea>
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
