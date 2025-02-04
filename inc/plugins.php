<?php
	
add_filter( 'acf/the_field/allow_unsafe_html', function( $allowed, $selector ) {
    return true;
    return $allowed;
}, 10, 2);

// Add search weight to more recently published entries in SearchWP.
// @link https://searchwp.com/documentation/knowledge-base/add-relevance-weight-date/
add_filter( 'searchwp\query\mods', function( $mods ) {
	global $wpdb;

	$mod = new \SearchWP\Mod();
	$mod->set_local_table( $wpdb->posts );
	$mod->on( 'ID', [ 'column' => 'id' ] );
	$mod->relevance( function( $runtime ) use ( $wpdb ) {
		return "
			COALESCE( ROUND( ( (
				UNIX_TIMESTAMP( {$runtime->get_local_table_alias()}.post_date )
				- (
					SELECT UNIX_TIMESTAMP( {$wpdb->posts}.post_date )
					FROM {$wpdb->posts}
					WHERE {$wpdb->posts}.post_status = 'publish'
					ORDER BY {$wpdb->posts}.post_date ASC
					LIMIT 1
				)
			) / 86400 ), 0 ), 0 )";
	} );

	$mods[] = $mod;

	return $mods;
} );