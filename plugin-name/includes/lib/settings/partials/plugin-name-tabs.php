<?php
/**
 * Prints the list of tabs and highlights the first one.
 *
 * @var     array    $tabs    the list of tabs
 *
 * @since      0.0.0
 * @author     Your Name <your.name@example.com>
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 */

?>

<h2 class="nav-tab-wrapper woo-nav-tab-wrapper"><?php
	$active = ' nav-tab-active';
	foreach ( $tabs as $tab ) {
		$pattern = '<a id="%1$s-tab" href="#" class="nav-tab%3$s">%2$s</a>';
		printf( $pattern, esc_attr( $tab['name'] ), esc_html( $tab['label'] ), $active );
		$active = '';
	}
?></h2>
