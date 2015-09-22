(function($) {
	'use strict';


	$ = jQuery;

	$( 'img.plugin-name-help' ).parent().click( function( ev ) {
		ev.preventDefault();
		$(this).closest( 'tr' ).find( '.setting-help' ).toggle();
	});

	var $tabs = $( '.nav-tab' );
	var $tabContents = $( '.tab-content' );

	$tabs.click( function( ev ) {
		ev.preventDefault();
		var id = $( this ).attr( 'id' );
		console.log(id);

		$tabs.removeClass( 'nav-tab-active' );
		$tabContents.hide();

		$( this ).addClass( 'nav-tab-active' );
		$( '#' + id + '-tab-content' ).show();
	});

})(jQuery);
