<?php
	
add_filter( 'acf/the_field/allow_unsafe_html', function( $allowed, $selector ) {
    return true;
    return $allowed;
}, 10, 2);

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );	

/*
 * Yoast SEO
 */
if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) {
    
    /*
	 * Remove from HTML
	 */
	add_action('get_header',function() { ob_start(function ($o) {
	return preg_replace('/\n?<.*?Yoast SEO plugin.*?>/mi','',$o); }); });
	add_action('wp_head',function() { ob_end_flush(); }, 999);
	
	
    /*
	 * Disable notifications
	 */
	add_action('admin_init', 'yoast_disable_notifications');
	
	function yoast_disable_notifications() {
		
		$ync = Yoast_Notification_Center::get();
		
		remove_action( 'admin_notices', array( $ync, 'display_notifications') );
		
		remove_action( 'all_admin_notices', array( $ync, 'display_notifications' ) );
	
	}
	
    /*
	 * Move Yoast box
	 */
    add_filter( 'wpseo_metabox_prio', 'yoast_move_metabox' );
    
    function yoast_move_metabox() {
	    
    	return 'low';
    
    }
    
    /*
	 * Disable screen after update
	 */    
    add_filter( 'option_wpseo', 'yoast_disable_delete_message' );
    
    function yoast_disable_delete_message($option) {
		
		if ( is_array( $option ) ) { 
			
			$option['seen_about'] = true; 
			
		}
		
		return $option;
    }
   
	add_filter( 'wpseo_enable_notification_post_trash', '__return_false' );
	
	add_filter( 'wpseo_enable_notification_post_slug_change', '__return_false' );
	
	add_filter( 'wpseo_enable_notification_term_delete', '__return_false' );
	
	add_filter( 'wpseo_enable_notification_term_slug_change', '__return_false' );
    
}

    add_filter( 'acf/rest_api/field_settings/show_in_rest', '__return_true' );

?>