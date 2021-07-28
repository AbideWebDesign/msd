<?php
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
    
}

/*
 * The Events Calendar
 */
if ( is_plugin_active( 'the-events-calendar/the-events/calendar.php' ) ) {
	
	// Relocate ical and gcal links below meta
	add_action( 'tribe_events_single_event_after_the_meta', array( tribe( 'tec.iCal' ), 'single_event_links' ), 5 );
	remove_action( 'tribe_events_single_event_after_the_content', array( tribe( 'tec.iCal' ), 'single_event_links' ) );
	
	add_filter( 'tribe_get_event_website_link_label', 'tribe_get_event_website_link_label_default' );
	
	function tribe_get_event_website_link_label_default ($label) {
		if( $label == tribe_get_event_website_url() ) {
			$label = "Register &raquo;";
		}
	
		return $label;
	}
	
	// Remove Tribe Dashboard Widget
	add_action('wp_dashboard_setup', 'tribe_remove_dashboard_widgets' );

	function tribe_remove_dashboard_widgets() {
		
		global $wp_meta_boxes;
	
		remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
	}
	
	// Remove unused Tribe menus
	add_action('admin_menu', 'tribe_hide_the_events_calendar_menus', 101);
	
	function tribe_hide_the_events_calendar_menus() {
		//Hide "Events → Tags".
		remove_submenu_page('edit.php?post_type=tribe_events', 'edit-tags.php?taxonomy=post_tag&amp;post_type=tribe_events');
		//Hide "Events → Event Categories".
		remove_submenu_page('edit.php?post_type=tribe_events', 'edit-tags.php?taxonomy=tribe_events_cat&amp;post_type=tribe_events');
		//Hide "Events → Organizers".
		remove_submenu_page('edit.php?post_type=tribe_events', 'edit.php?post_type=tribe_organizer');
		//Hide "Events → Import".
		remove_submenu_page('edit.php?post_type=tribe_events', 'aggregator');
		//Hide "Events → Help".
		remove_submenu_page('edit.php?post_type=tribe_events', 'tribe-help');
		//Hide "Events → Event Add-Ons".
		remove_submenu_page('edit.php?post_type=tribe_events', 'tribe-app-shop');
	}
	
	function tribe_hide_the_events_calendar_metaboxes() {
		$screen = get_current_screen();
		if ( !$screen ) {
			return;
		}
		remove_meta_box('tagsdiv-post_tag', $screen->id, 'side');
		//Hide the "The Events Calendar" meta box.
		remove_meta_box('tribe_events_catdiv', $screen->id, 'side');
		//Hide the "Event Options" meta box.
		remove_meta_box('tribe_events_event_options', $screen->id, 'side');
		//Hide the "Venue Information" meta box.
		remove_meta_box('tribe_events_venue_details', $screen->id, 'normal');
		//Hide the "Organizer Information" meta box.
		remove_meta_box('tribe_events_organizer_details', $screen->id, 'normal');
	}
	
	add_action('add_meta_boxes', 'tribe_hide_the_events_calendar_metaboxes', 20);
	
	// Remove unused blocks
	add_filter( 'tribe_events_editor_default_template', function( $template ) {
	  $template = [
	    [ 'tribe/event-datetime' ],
		];
		return $template;
	}, 11, 1 );

}

?>