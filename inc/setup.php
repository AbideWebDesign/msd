<?php
/**
 * Theme basic setup
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

register_nav_menus( array (
    'primary-menu' 		=> 'Primary Menu',
    'secondary-menu'	=> 'Secondary Menu',
    'top-menu'			=> 'Top Menu',
    'school-menu'		=> 'School Menu',
    'footer-menu-1' 	=> 'Footer Menu 1',
    'footer-menu-2' 	=> 'Footer Menu 2',
    'footer-menu-3' 	=> 'Footer Menu 3',
    'footer-menu-4' 	=> 'Footer Menu 4',
) );

add_image_size( 'card', 1000, 600, true );
add_image_size( 'card-sm', 387, 232, true);
add_image_size( 'card-alt', 800, 600, true );
add_image_size( 'card-full', 660, false );
add_image_size( 'hero-banner', 1920, 1280, true );
add_image_size( 'page-header', 1920, false );
add_image_size( 'slide', 900, 675, true );
add_image_size( 'slide-sm', 900, 370, true );
add_image_size( 'slide-lg', 1318, 500, true );

if ( function_exists( 'acf_add_options_page' ) ) {
	
	acf_add_options_page();

	acf_add_options_sub_page( 'Assets' );
	acf_add_options_sub_page( 'Calendar' );
	acf_add_options_sub_page( 'Carousel Slides' );
	acf_add_options_sub_page( 'COVID-19' );
	acf_add_options_sub_page( 'District Info' );	
	acf_add_options_sub_page( 'ParentSquare' );	
	acf_add_options_sub_page( 'Quick Links' );
	acf_add_options_sub_page( 'Search' );
	acf_add_options_sub_page( 'Sidebar Navigation' );	

}

function modify_embed_defaults() {
	
	return array(
	    'width'  => 700, 
	    'height' => 395
	);

}

add_filter( 'wp_link_query_args', 'msd_wp_link_query_args' ); 
 
function msd_wp_link_query_args( $query ) {

	$query['post_status'] = array( 'publish','inherit' );
	
	$query['post_type'] = array( 'post', 'page', 'attachment' ); 
	
	return $query;

}

add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );
 
function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
	
	$cached_html = str_replace( '<iframe ', '<iframe class="embed-responsive-item" ', $cached_html );

	$cached_html = '<div class="embed-responsive embed-responsive-16by9">' . $cached_html . '</div>';

	return $cached_html;

}

add_action( 'after_setup_theme', 'msd_setup' );

if ( ! function_exists( 'msd_setup' ) ) {

	function msd_setup() {
	
	    remove_theme_support( 'post-thumbnails' );
	
	    add_theme_support( 'post-thumbnails', array( 'post' ) ); 

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		register_nav_menus( array (
			
			'primary' => __( 'Primary Menu', 'msd' ),
		
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'responsive-embeds' );
		
	}
}

/**
 * Removes the ... from the excerpt read more link
 */
add_filter( 'excerpt_more', 'msd_custom_excerpt_more' );

if ( ! function_exists( 'msd_custom_excerpt_more' ) ) {
	
	function msd_custom_excerpt_more( $more ) {
		
		if ( ! is_admin() ) {
			
			global $post;
			
			$more = '...';
		
		}
		
		return $more;
	
	}

}

/**
 * Change archive titles
 */
add_filter( 'get_the_archive_title', 'msd_archive_titles' );

function msd_archive_titles( $title ) {
	
	if ( is_category() ) {
	
		$title = single_cat_title( '', false );
	
	} elseif ( is_tag() ) {
	
		$title = single_tag_title( '', false );
	
	} elseif ( is_author() ) {
	
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	
	} elseif ( is_post_type_archive() ) {
	
		$title = post_type_archive_title( '', false );
	
	} elseif ( is_tax() ) {
		
		$title = single_term_title( '', false );
	
	}
	
	return $title;

}

/*
 * Admin bar customizations
 */
add_action( 'wp_before_admin_bar_render', 'admin_bar_render' );

function admin_bar_render() {
	
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('customize');
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_menu('comments');
    $wp_admin_bar->remove_menu('new-post');
    $wp_admin_bar->remove_menu('search');
    $wp_admin_bar->remove_menu('themes');
    $wp_admin_bar->remove_menu('widgets');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_menu('searchwp');
    $wp_admin_bar->remove_menu('delete-cache');
	$wp_admin_bar->remove_menu('litespeed-menu');
	
}

/*
 * Remove unused dashboard widgets
 */
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

function remove_dashboard_widgets() {
	
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	remove_meta_box('dashboard_site_health', 'dashboard', 'normal');

}

/*
 * Remove unused user roles
 */
remove_role( 'contributor' );
remove_role( 'author' );
remove_role( 'editor' );
remove_role( 'member' );
remove_role( 'wpseo_editor' );
remove_role( 'wpseo_manager' );

/*
 * Remove Welcome panel
 */
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*
 * Remove site health
 */
add_action( 'admin_menu', 'remove_site_health_menu' );

function remove_site_health_menu() {

	remove_submenu_page( 'tools.php', 'site-health.php' );

}

/*
 * Remove Tags
 */
add_action( 'init', 'remove_tags' );
 
function remove_tags() {

	unregister_taxonomy_for_object_type( 'post_tag', 'post' );

}

add_action( 'admin_init', function () {

    // Remove comments metabox from dashboard
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );

    // Disable support for comments and trackbacks in post types
    foreach ( get_post_types() as $post_type ) {
	    
        if ( post_type_supports( $post_type, 'comments' ) ) {
        
            remove_post_type_support( $post_type, 'comments' );
         
            remove_post_type_support( $post_type, 'trackbacks' );
        
        }
    
    }

} );

/*
 * Remove Comments
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

add_action( 'admin_menu', function () {
	
	remove_menu_page( 'edit-comments.php' );

} );

add_action( 'init', function () {
	
	if ( is_admin_bar_showing() ) {
		
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );

	}

} );

/*
 * Hide admin notifications for non-admins
 */
add_action( 'admin_head', 'hide_update_msg_non_admins');

function hide_update_msg_non_admins() {
	
	if ( ! current_user_can( 'manage_options' ) ) { // non-admin users
    	
    	echo '<style>#setting-error-tgmpa>.updated settings-error notice is-dismissible, .update-nag, .updated { display: none; }</style>';
        
	}
}

/*
 * Add custom favicon to admin pages
 */
add_action( 'login_head', 'add_login_favicon' );
add_action( 'admin_head', 'add_login_favicon' );
add_action( 'wp_head', 'add_login_favicon' );

function add_login_favicon() {
	
	$favicon_url = get_stylesheet_directory_uri() . '/favicon.png';

	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
	
}

/**
 * Change Login Logo URL
 */
add_filter( 'login_headerurl', 'login_logo_url' );

function login_logo_url() {
	
	return home_url();

}

/*
 * Add custom admin styles
 */
add_action('wp_head', 'admin_bar_style_override');
add_action('admin_head', 'admin_bar_style_override');

function admin_bar_style_override() {
	
	if ( is_user_logged_in() ) {
		
		?>
		
		<style>
		
			.acf-to-rest-api-donation-notice, #directory-categorydiv, .ac-message, #ac-pro-version, #direct-feedback, .installer-plugin-update-tr, .plugins .dashicons, .shortpixel-notice, #emr-news, .wrap.emr_upload_form .option-flex-wrapper, .emr_upload_form #message, .user-syntax-highlighting-wrap {
				display: none;
			}
			form#your-profile > h3, form#your-profile .user-profile-picture, form#your-profile .user-description-wrap, form#your-profile .user-display-name-wrap, form#your-profile .user-nickname-wrap, form#your-profile .show-admin-bar, .user-comment-shortcuts-wrap, form#your-profile .yoast-settings, form#your-profile .user-rich-editing-wrap, form#your-profile .user-admin-color-wrap, form#your-profile .user-url-wrap, form#your-profile .user-facebook-wrap, form#your-profile .user-instagram-wrap, form#your-profile .user-linkedin-wrap, form#your-profile .user-myspace-wrap, form#your-profile .user-pinterest-wrap, form#your-profile .user-soundcloud-wrap, form#your-profile .user-tumblr-wrap, form#your-profile .user-twitter-wrap, form#your-profile .user-youtube-wrap, form#your-profile .user-wikipedia-wrap  {
				display: none;
			}
			#your-profile h2 {
				display: none;
			}
	<?php
		
	}
	
	if ( current_user_can( 'subscriber' ) ) { ?>
		
		.toplevel_page_wpseo_workouts, #menu-tools { 
			display: none !important 
		}
		
	<?php }
	
	echo "</style>";
	
}

add_action('login_head', 'custom_login_css');

function custom_login_css() {
    echo '<style type="text/css"> 
    	body {
	    	background-color: white;
	    	
	    }
	    .login h1 a {
		    background-image: url(/wp-content/uploads/2021/07/McMinnville-School-District-Branding-03.svg);
		    height: 70px;
		    width: 230px;
		    background-size: 230px;
		}   
	    .login .message {
		    margin-top: 1em;
		    background-color: #EFEFEF;
		    border-left-color: #004a7c;
		}
		.login form {
			border-color: #dee2e6;
			background-color: #EFEFEF;	
		}
		#user_login, #user_login:focus {
			border-color: #004a7c;	
			box-shadow: none;
		}	
		#login #backtoblog {
			display: none;
		}
		.login label {
			color: #212529;
			font-weight: 700;
			font-size: .875rem;
			margin-bottom: .5em;	
		}
		.wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large {
			background-color: #004a7c;
			width: 100%;
			border-color: #004a7c;
			font-size: 1.25rem;
			line-height: 1.5;
			border-radius: .3rem;
			padding: .475rem 1.2rem;
		}
		.login #nav {
			text-align: center;
		}
		.login #nav a {
			font-size: 16px;
			color: #0C2B23;
			
		}
		.login #login_error {
			border-top: 1px solid #004a7c;
			border-right: 1px solid #004a7c;
			border-bottom: 1px solid #004a7c;
		}
		</style>';
}

add_filter( 'retrieve_password_message', 'retrieve_password_message', 10, 4 );

function retrieve_password_message( $message, $key, $user_login, $user_data ) {

	// Start with the default content.

	$site_name = wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES );

	$message = __( 'Someone has requested a password reset for the following account:' ) . "\r\n\r\n";

	/* translators: %s: site name */

	$message .= sprintf( __( 'Site Name: %s' ), $site_name ) . "\r\n\r\n";

	/* translators: %s: user login */

	$message .= sprintf( __( 'Username: %s' ), $user_login ) . "\r\n\r\n";

	$message .= __( 'If this was a mistake, just ignore this email and nothing will happen.' ) . "\r\n\r\n";

	$message .= __( 'To reset your password, visit the following address:' ) . "\r\n\r\n";

	$message .= '<' . network_site_url( "wp-login.php?action=rp&key=$key&login=" . rawurlencode( $user_login ), 'login' ) . ">\r\n";

	return $message;

}

function humanTiming ( $time ) {
  
	$time = time() - $time; // to get the time since that moment
	
	$tokens = array (
	  31536000 => 'year',
	  2592000 => 'month',
	  604800 => 'week',
	  86400 => 'day',
	  3600 => 'hour',
	  60 => 'minute',
	  1 => 'second'
	);
  
	foreach ( $tokens as $unit => $text ) {
  
	  	if ( $time < $unit ) continue;
	  
		$numberOfUnits = floor( $time / $unit );
		
		return $numberOfUnits . ' ' . $text . ( ( $numberOfUnits > 1 ) ? 's' : '' );
  
	}

}

/* Language Dropdown */
function get_google_languages() {

	$google_languages = array(
		'googtrans(en|es)' => 'Spanish',
		'googtrans(en|ar)' => 'ترجمه',
		'googtrans(en|zh-CN)' => 'Chinese',
		'googtrans(en|fr)' => 'French',
		'googtrans(en|de)' => 'German',
		'googtrans(en|ko)' => 'Korean',
		'googtrans(en|vi)' => 'Vietnamese'
	);
	
	return $google_languages;
  	
}

add_action( 'wp_logout', 'redirect_after_logout' );

function redirect_after_logout() {
    
    wp_redirect( home_url() );
	
	exit();
	
}

/*
 * Wordpress Customizations
 */

function msd_new_user_notifications( $user_id, $notify = 'user' ) {
	
	if ( empty( $notify ) || $notify == 'admin' ) {
	
	  return;
	
	} elseif ( $notify == 'both' ) { //Only send the new user their email, not the admin

		$notify = 'user';
	
	}
	
	wp_send_new_user_notifications( $user_id, $notify );

}

/*
 * Disable Update Emails
 */
add_filter( 'auto_core_update_send_email', 'disable_auto_update_emails', 10, 4 );
  
function disable_auto_update_emails( $send, $type, $core_update, $result ) {

	if ( ! empty( $type ) && $type == 'success' ) {

		return false;

	}

	return true;

}
 
remove_action( 'register_new_user', 'wp_send_new_user_notifications' );

remove_action( 'edit_user_created_user', 'wp_send_new_user_notifications', 10, 2 );

add_action( 'register_new_user', 'msd_new_user_notifications' );

add_action( 'edit_user_created_user', 'msd_new_user_notifications', 10, 2 );

add_filter( 'big_image_size_threshold', '__return_false' );

add_filter( 'auto_plugin_update_send_email', '__return_false' );

add_filter( 'auto_theme_update_send_email', '__return_false' );

add_filter( 'jpeg_quality', function( $arg ){ return 100; } );

add_filter( 'wp_editor_set_quality', function( $arg ){ return 100; } );

add_filter( 'wp_is_application_passwords_available', '__return_false' );

/*
 * Staff Sorting
 */

add_filter( 'query_vars', 'msd_staff_query_vars' );

function msd_staff_query_vars( $vars ) {
	
	$vars[] = 'staff_last_name';
	
	$vars[] = 'staff_position';
    
    return $vars;

}

add_action('pre_get_posts', 'msd_staff_sorting');

function msd_staff_sorting( $wp_query ) {
	
	if ( ! is_admin() && is_main_query() ) {
		
		if( isset( $wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] == 'staff' ) {
								
			if ( $var = get_query_var( 'staff_last_name' ) ) {

				if ( 'asc' === $var ) {

					$wp_query->set( 'orderby', 'meta_value' );
					
					$wp_query->set( 'meta_key', 'staff_last_name' );
        
					$wp_query->set( 'order', 'ASC' );
					
				} elseif ( 'desc' == $var ) {

					$wp_query->set( 'orderby', 'meta_value' );
					
					$wp_query->set( 'meta_key', 'staff_last_name' );
        
					$wp_query->set( 'order', 'DESC' );
					
				}
			
			} elseif ( $var = get_query_var( 'staff_position' ) ) {
				
				if ( 'asc' === $var ) {

					$wp_query->set( 'orderby', 'meta_value' );
					
					$wp_query->set( 'meta_key', 'staff_position_description' );
        
					$wp_query->set( 'order', 'ASC' );
					
				} elseif ( 'desc' == $var ) {

					$wp_query->set( 'orderby', 'meta_value' );
					
					$wp_query->set( 'meta_key', 'staff_position_description' );
        
					$wp_query->set( 'order', 'DESC' );
					
				}
				
				
			}
					
		}
		
	}
	
	return $wp_query;

}

/**
 * Create HTML list of pages.
 *
 * @package Razorback
 * @subpackage Walker
 * @author Michael Fields <michael@mfields.org>
 * @copyright Copyright (c) 2010, Michael Fields
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 * @uses Walker_Page
 *
 * @since 2010-05-28
 * @alter 2010-10-09
 * @alter 2019-12-05 (Wordpress 5.3 change)
 */

function get_topmost_parent($post_id){
	
  $parent_id = get_post($post_id)->post_parent;
  
  if($parent_id == 0){
    
    return $post_id;
  
  } else{
    
    return get_topmost_parent($parent_id);
  
  }
}

class Razorback_Walker_Page_Selective_Children extends Walker_Page {
    /**
     * Walk the Page Tree.
     *
     * @global stdClass WordPress post object.
     * @uses Walker_Page::$db_fields
     * @uses Walker_Page::display_element()
     *
     * @since 2010-05-28
     * @alter 2010-10-09
     * @alter 2019-12-05
     */
    function walk( $elements, $max_depth, ...$args ) {
        global $post;
        $args = array_slice( func_get_args(), 2 );
        $output = '';
		$max_depth = 3;
        /* invalid parameter */
        if ( $max_depth < -1 ) {
        
            return $output;
            
        }

        /* Nothing to walk */
        if ( empty( $elements ) ) {
        
            return $output;
            
        }

        /* Set up variables. */
        $top_level_elements = array();
        $children_elements  = array();
        $parent_field = $this->db_fields['parent'];
        $child_of = ( isset( $args[0]['child_of'] ) ) ? (int) $args[0]['child_of'] : 0;

        /* Loop elements */
        foreach ( (array) $elements as $e ) {
        
            $parent_id = $e->$parent_field;
            
            if ( isset( $parent_id ) ) {
            
                /* Top level pages. */
                if( $child_of === $parent_id ) {
                
                    $top_level_elements[] = $e;
                    
                }
                /* Only display children of the current hierarchy. */
                else if (
                    ( isset( $post->ID ) && $parent_id == $post->ID ) ||
                    ( isset( $post->post_parent ) && $parent_id == $post->post_parent ) ||
                    ( isset( $post->ancestors ) && in_array( $parent_id, (array) $post->ancestors ) )
                ) {
                
                    $children_elements[ $e->$parent_field ][] = $e;
                    
                }
            }
        }

        /* Define output. */
        foreach ( $top_level_elements as $e ) {
        
            $this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
            
        }
        
        return $output;
    }
}