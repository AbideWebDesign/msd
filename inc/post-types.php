<?php 

add_filter( 'rest_staff_collection_params', function( $params ) {
    
    $params['per_page']['maximum'] = 200;
    
    return $params;

} );

add_action( 'pre_get_posts', 'staff_sort_order', 1 );

function staff_sort_order( $query ) {

	if ( is_admin() || ! $query->is_main_query() )
	
		return;

	if ( ( isset( $query->query_vars['post_type'] ) && $query->query_vars['post_type'] == 'staff' ) || is_tax( 'building' ) ) {
	
		$query->set( 'orderby', 'meta_value' );	
		$query->set( 'meta_key', 'staff_last_name' );	 
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', 100 );
	
	}
		
	return $query;

}

function msd_register_my_cpts() {

	/**
	 * Post Type: Alerts.
	 */

	$labels = [
		"name" => __( "Alerts", "msd" ),
		"singular_name" => __( "Alert", "msd" ),
	];

	$args = [
		"label" => __( "Alerts", "msd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "alert", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-shield",
		"supports" => [ "title" ],
		"show_in_graphql" => false,
	];

	register_post_type( "alert", $args );

	/**
	 * Post Type: Staff.
	 */

	$labels = [
		"name" => __( "Staff", "msd" ),
		"singular_name" => __( "Staff", "msd" ),
	];

	$args = [
		"label" => __( "Staff", "msd" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "staff", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-businesswoman",
		"supports" => [ "title", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "staff", $args );
}

add_action( 'init', 'msd_register_my_cpts' );

function msd_register_my_taxes() {

	/**
	 * Taxonomy: Buildings.
	 */

	$labels = [
		"name" => __( "Buildings", "msd" ),
		"singular_name" => __( "Building", "msd" ),
	];

	
	$args = [
		"label" => __( "Buildings", "msd" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'building', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "building",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "building", [ "staff" ], $args );
}
add_action( 'init', 'msd_register_my_taxes' );