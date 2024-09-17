<?php
	
add_filter( 'acf/the_field/allow_unsafe_html', function( $allowed, $selector ) {
    return true;
    return $allowed;
}, 10, 2);