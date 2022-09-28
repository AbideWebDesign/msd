<?php
/*
 * Remove unused user roles
 */
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'member' );
remove_role( 'wpseo_editor' );
remove_role( 'wpseo_manager' );

/*
 * Admin bar customizations
 */
add_action( 'wp_before_admin_bar_render', 'msd_admin_bar_render' );

function msd_admin_bar_render() {
	
	global $wp_admin_bar, $post;
	
	if ( isset( $post ) && ! current_user_can( 'administrator') ) {
		
		$user_id = get_current_user_id();
		
		$user_can_edit = false;
		
		while ( have_rows('users_access', 'options') ) {
				
			the_row();
			
			if ( get_sub_field('user') == $user_id ) {
				
				$pages_user_can_edit = get_sub_field('pages');

				foreach ( $pages_user_can_edit as $page ) {
					
					if ( $post->ID == $page ) {
						
						$user_can_edit = true;
						
						break;
						
					}
					
				}
				
				break;
				
			}
				
		}
		
		if ( ! $user_can_edit ) {
			
			$wp_admin_bar->remove_menu('edit');
			
		}	
		
	}
	
}

/*
 * Admin menu customizations
 */
add_action( 'admin_menu', 'msd_menu_render', 99 );

function msd_menu_render() {

	if ( current_user_can( 'editor' ) ) {
		
		remove_menu_page( 'appearance' );
		
		remove_menu_page( 'tools.php' );
		
		remove_menu_page( 'user-access' );  
		
		remove_menu_page( 'posts-staff' );
		
		remove_menu_page( 'postman' );
		
		remove_menu_page( 'wpseo_workouts' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_export' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_help' );
		
	}	

}

/*
 * Control User Access
 */
add_filter( 'parse_query', 'exclude_pages_from_admin' );

function exclude_pages_from_admin( $query ) {
	
	global $pagenow, $post_type;
	
	$found = false;
	
	if ( is_admin() && $pagenow == 'edit.php' && $post_type == 'page' ) {
		
		$user_id = get_current_user_id();

		while ( have_rows('users_access', 'options') ) {
			
			the_row();
			
			if ( get_sub_field('user') == $user_id ) {

				$found = true;
				
				$query->query_vars['post__in'] = get_sub_field('pages');
				
			}
		
		}
		
		if ( ! $found ) {
			
			$query->query_vars['post__in'] = [ 0 ]; // Clear array to return no values
			
		}
	
	}
	
}