( function( $ ) {
	// Sets up the mobile menu to be collapsible
	function setup_collapsible_submenus() {
		$( '#mobile_menu' )
			.addClass( 'dcmm-collapsible' )
			.find( '.menu-item-has-children > a' )
				.append( '<span class="dcmm-menu-toggle"></span>' )
				.on( 'click', '.dcmm-menu-toggle', function( event ) {
					event.preventDefault();
					event.stopPropagation();

					$( this ).closest( '.menu-item' ).toggleClass( 'dcmm-visible' );
				} );
	}

	// Wait until after the Divi mobile menu has been initialized
	$( window ).on( 'load', function() {
		setTimeout( function() {
			setup_collapsible_submenus();
		}, 700 );
	} );
} )( jQuery );
