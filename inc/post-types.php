<?php 

function get_excluded_cats() {
	
	$excluded = array(); 
	
	$categories = get_categories();

	foreach( $categories as $category ) {

		if ( get_field('hide_on_home_page', $category) ) {
			
			$excluded[] = $category->term_id;
			
		}
		
	}
	
	return $excluded;
	
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