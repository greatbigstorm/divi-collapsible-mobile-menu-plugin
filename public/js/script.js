( function( $ ) {
	var CLASS_TOGGLE_ITEM    = 'dcmm-menu-toggle',
		CLASS_MENU_ENABLED   = 'dcmm-collapsible',
		CLASS_SUBMENU_OPENED = 'dcmm-visible';


	// Sets up the mobile menu to be collapsible
	function setup_collapsible_submenus() {
		$( '#mobile_menu' )
			.addClass( CLASS_MENU_ENABLED )
			.find( '.menu-item-has-children > a' )
				// For parent items with no link, make the entire link a toggle click target
				// NOTE:  Do this first so `off()` does not remove the toggle handler below
				.filter( '[href="#"]' )
					.off( 'click' )  // removing Divi's handler that closes the menu
					.on ( 'click', function( event ) {
						event.preventDefault();
						event.stopPropagation();

						$( this ).children( '.' + CLASS_TOGGLE_ITEM ).trigger( 'click' );
					} )
					.end()
				// ...now add the toggle element and handler
				.append( '<span class="' + CLASS_TOGGLE_ITEM + '"></span>' )
				.on( 'click', '.' + CLASS_TOGGLE_ITEM, function( event ) {
					event.preventDefault();
					event.stopPropagation();

					$( this ).closest( '.menu-item' ).toggleClass( CLASS_SUBMENU_OPENED );
				} );
	}

	// Wait until after the Divi mobile menu has been initialized
	$( window ).on( 'load', function() {
		setTimeout( function() {
			setup_collapsible_submenus();
		}, 700 );
	} );
} )( jQuery );
