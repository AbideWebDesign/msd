<?php
	
add_filter( 'acf/the_field/allow_unsafe_html', function( $allowed, $selector ) {
    return true;
    return $allowed;
}, 10, 2);

add_filter( 'searchwp\query\mods', function( $mods ) {
	global $wpdb;

	$weight_adjust = 1;

	$mod = new \SearchWP\Mod();
	$mod->set_local_table( $wpdb->posts );
	$mod->on( 'ID', [ 'column' => 'id' ] );
	$mod->relevance( function( $runtime_mod ) use ( $weight_adjust ) {
		$alias = $runtime_mod->get_local_table_alias();
		return "
		( 100 * EXP(
			( 1 - ABS( (
				UNIX_TIMESTAMP( {$alias}.post_date )
				- UNIX_TIMESTAMP( NOW() )
			) / 86400 ) ) / 100 )
		* {$weight_adjust} )";
	} );
	$mods[] = $mod;

	return $mods;
} );