jQuery( function ( $ ) {
	
	var $searchlink = $( '#search-toggle i' );
	
	var $searchbar  = $( '#search-bar' );
	
	var $searchfield = $( '#search-text' );
	
	$( '#nav-top-links a' ).on('click', function( e ) {
	
		if ( $( this ).attr( 'id' ) == 'search-toggle' ) {
			
			if( ! $searchbar.is( ":visible" ) ) { 
				
				$searchlink.removeClass( 'fa-search' ).addClass( 'fa-search-minus' );
			
			} else {
			
				$searchlink.removeClass( 'fa-search-minus' ).addClass( 'fa-search' );
			
			}
			
			$searchbar.slideToggle( 250, function() {
				
				$searchfield.focus(); // callback after search bar animation
			
			} );
		
		}
		
	} );
	
	$( '#searchform' ).submit( function( e ) {
		
		e.preventDefault(); // stop form submission
	
	} );
	
	$( '#building-select' ).change( function () {
        
        location.href = $( this ).val();
        
    } );
	
} );