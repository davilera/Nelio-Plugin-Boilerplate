<?php
/**
 * Prints the list of tabs and highlights the first one.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes/lib/settings/partials
 * @author     Your Name <your.name@example.com>
 * @since      0.0.0
 */

/**
 * List of required vars:
 *
 * @var array  $tabs       the list of tabs.
 * @var string $opened_tab the name of the currently-opened tab.
 */

?>

<h2 class="nav-tab-wrapper woo-nav-tab-wrapper"><?php
foreach ( $tabs as $tab ) {
	if ( $tab['name'] === $opened_tab ) {
		$active = ' nav-tab-active';
	} else {
		$active = '';
	}
	printf('<span id="%1$s" class="nav-tab%3$s" style="cursor:pointer;">%2$s</span>',
		esc_attr( $tab['name'] ), esc_html( $tab['label'] ), esc_attr( $active )
	);
}
?></h2>
