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
	
	$user = wp_get_current_user();
	
	$roles = ( array ) $user->roles;
	
	if ( isset( $post ) && $roles[0] != 'administrator' ) {
		
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
add_action( 'admin_menu', 'msd_menu_render', 99999 );

function msd_menu_render() {
	
	$user = wp_get_current_user();
	
	$roles = ( array ) $user->roles;
	
	if ( $roles[0] == 'editor' || $roles[0] == 'administrator' && $user->user_login != 'abide_admin' ) {
		
		remove_menu_page( 'appearance' );
		
		remove_menu_page( 'tools.php' );
		
		remove_menu_page( 'plugins.php' );

		remove_menu_page( 'options-general.php' );
		
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
	
	if ( $roles[0] == 'editor' ) {
		
		remove_menu_page( 'user-access' );
		
		remove_menu_page( 'users.php' );
		
	}

}

/*
 * Control User Access
 */
add_filter( 'parse_query', 'exclude_pages_from_admin' );

function exclude_pages_from_admin( $query ) {
	
	global $pagenow, $post_type;

	$user = wp_get_current_user();
	
	$roles = ( array ) $user->roles;

	if ( is_admin() && $roles[0] != 'administrator' ) {
	
		if ( $pagenow == 'admin.php' ) {
			
			$current_page = $_GET['page'];

			$found = false;
			
			if ( $current_page == 'nestedpages'  ) {
		
				$user_id = get_current_user_id();
		
				while ( have_rows('users_access', 'options') ) {
					
					the_row();
					
					if ( get_sub_field('user') == $user_id ) {
		
						$found = true;
						
						$author_pages = array();
						
						$_author_pages = get_pages( [ 'authors' => $user_id ] );
						
						foreach ( $_author_pages as $page ) {
							
							$author_pages[] = $page->ID; 
							
						}
						
						$pages = array_merge( $author_pages, get_sub_field('pages') );
						
						$query->query_vars['post__in'] = $pages;
												
					}
				
				}
				
				if ( ! $found ) {
					
					$query->query_vars['post__in'] = [ 0 ]; // Clear array to return no values
					
				}
			
			}
		
		}
		
	}
		
}