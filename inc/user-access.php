<?php
/*
 * Remove unused user roles
 */
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'member' );
remove_role( 'wpseo_editor' );
remove_role( 'wpseo_manager' );

add_action( 'wp_before_admin_bar_render', 'msd_admin_bar_exclude_edit' );

function msd_admin_bar_exclude_edit() {
	
	global $wp_admin_bar, $post;
	
	$user = wp_get_current_user();
		
	if ( isset( $post ) && get_field('allowed_pages', $user) ) {
				
		$user_can_edit = false;
							
		$pages_user_can_edit = get_field('allowed_pages', $user);
		
		if ( in_array( $post->ID, $pages_user_can_edit ) || array_intersect( $pages_user_can_edit, get_post_ancestors( $post->ID ) ) ) {
		
			$user_can_edit = true;
			
		} 
														
		if ( ! $user_can_edit ) {
			
			$wp_admin_bar->remove_menu('edit');
			
		}	
		
	}
	
}

add_filter( 'acf/load_value/key=field_64dfca31a6812', 'msd_update_user_access_value', 10, 3 );

function msd_update_user_access_value( $value, $post_id, $field ) {

    global $pagenow;
    
    if ( $value && $pagenow == 'admin.php' ) {

		$all_wp_pages = get_posts( [ 'post_type' => 'page', 'posts_per_page' => -1 ] );

		$children = array();
		
		$children_pages = array();
		
		foreach ( $value as $page_id ) {
		
			$children[] = get_page_children( $page_id, $all_wp_pages );
		
		}
		
		foreach ( $children as $child ) {
			
			foreach ( $child as $c ) {
				
				$children_pages[] = strval( $c->ID );
				
			}
		
		}

		$value = array_merge( $value, $children_pages );

    }
	    	
	return $value;

}

/*
 * Control User Access
 */
add_filter( 'parse_query', 'msd_user_access' );

function msd_user_access( $query ) {

	if ( ! is_admin() ) return;
	
	
	if ( is_array( $query->query_vars['post_type'] ) && in_array( 'np-redirect', $query->query_vars['post_type'] ) ) {
	
		global $pagenow;
			
		if ( is_admin() && $pagenow == 'admin.php' ) {
			
			$current_page = $_GET['page'];
	
			if ( $current_page == 'nestedpages'  ) {
		
				$user = wp_get_current_user();
				
				$allowed_pages = get_field('allowed_pages', $user);
	
				if ( $allowed_pages ) {
	
					$query->set('post__in', $allowed_pages );
					
				}
				
			}
							
		} 
		
	}
		
	return $query;	

}
/*
 * Admin menu customizations
 */
add_action( 'admin_menu', 'msd_menu_render', 99999 );

function msd_menu_render() {
	
	$user = wp_get_current_user();
	
	$roles = ( array ) $user->roles;
	
	if ( $user->user_login != 'abide_admin' ) {
		
		remove_menu_page( 'appearance' );
		
		remove_menu_page( 'tools.php' );
		
		remove_menu_page( 'plugins.php' );

		remove_menu_page( 'options-general.php' );
		
		remove_menu_page( 'user-access' );
		
		remove_submenu_page( 'themes.php', 'themes.php' );
		
		remove_submenu_page( 'themes.php', 'theme-editor.php' );
		
		remove_submenu_page( 'themes.php', 'shiftnav-settings' );
		
		remove_submenu_page( 'themes.php', 'ubermenu-settings' );
		
		remove_submenu_page( 'users.php', 'users-user-role-editor.php' );
		
		remove_submenu_page( 'nestedpages', 'edit.php?post_type=page' );
				
		remove_menu_page( 'staff' );
		
		remove_menu_page( 'sb-instagram-feed' );
		
		remove_menu_page( 'gswpts-dashboard' );
		
		remove_menu_page( 'aiwp_settings' );
		
		remove_menu_page( 'wpseo_dashboard' );
		
		remove_menu_page( 'itsec-dashboard' );
		
 		remove_menu_page( 'postman' );
		
		remove_menu_page( 'edit.php?post_type=acf-field-group' );
		
		remove_menu_page( 'litespeed' );
		
		remove_submenu_page( 'options-general.php', 'codepress-admin-columns' );
		
		remove_menu_page( 'wpseo_workouts' );
				
		remove_submenu_page( 'gf_edit_forms', 'gf_export' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_help' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_settings' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_addons' );
		
		remove_submenu_page( 'gf_edit_forms', 'gf_system_status' );
		
	}
	
	if ( $roles[0] != 'administrator' ) {
		
		remove_menu_page( 'user-access' );
		
		remove_menu_page( 'users.php' );
		
		remove_menu_page( 'settings');
		
	}

}

