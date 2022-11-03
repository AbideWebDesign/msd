<?php

/**
 * Creates 301 redirects by custom field
 */
add_action( 'template_redirect', 'redirect_by_custom_field' );

function redirect_by_custom_field() {
 
	if ( is_page() ) {
   	
		global $post;
      
		if ( $redirect = get_field('redirect_url') ) {
			
			wp_redirect( $redirect, 301 );
		
			exit;
	
		}
	
	}
		
}