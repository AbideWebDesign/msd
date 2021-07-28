<?php
/**
 * msd enqueue scripts
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'msd_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function msd_scripts() {
		
		// Get the theme data.
		
		$the_theme     = wp_get_theme();
		
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		
		wp_enqueue_style( 'msd-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		
		wp_enqueue_style( 'msd-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), $css_version );
		
		wp_deregister_script( 'jquery' );
		
		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, null );
		
		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		
		wp_enqueue_script( 'msd-theme-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true ); 
		
		wp_enqueue_script( 'msd-scripts', get_template_directory_uri() . '/js/msd-scripts-min.js', array(), $js_version, true );
		
		if ( is_page( 'home' ) ) {
			
			wp_enqueue_style( 'fullcalendar.min.css', 'https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' ); 
						
			wp_enqueue_script( 'full-calendar.min.js', 'https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js', 'jquery', '', true );
					
		}
		
		if ( is_page( 'calendar' ) ) {
			
			wp_enqueue_style( 'fullcalendar.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' ); 
			
 			wp_enqueue_script( 'moment.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js', 'jquery', '', true );
			
			wp_enqueue_script( 'full-calendar.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js', 'jquery', '', true );
			
 			wp_enqueue_script( 'gcal.min.js', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.min.js', 'jquery', '', true );
			
			
		}
	
	}
	
} // endif function_exists( 'msd_scripts' ).

add_action( 'wp_enqueue_scripts', 'msd_scripts' );
