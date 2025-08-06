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
		
		if ( is_page( 'home' ) || is_page( 'calendar' ) ) {
		
			wp_enqueue_script( 'msd-calendar', 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.18/index.global.min.js', false, null );
			
			wp_enqueue_script( 'msd-calendar-google', 'https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.18/index.global.min.js', false, null );
			
			wp_enqueue_script( 'msd-moment', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js', false, null );
	
			wp_enqueue_script( 'msd-calendar-moment', 'https://cdn.jsdelivr.net/npm/@fullcalendar/moment@6.1.18/index.global.min.js', false, null );
			
		}
		
		if ( is_single() && 'post' == get_post_type() ) {

			wp_enqueue_script( 'gcal.min.js', 'https://platform-api.sharethis.com/js/sharethis.js#property=617d9def22fcc40019171d40&product=sop', '', '', true );
			
		}
	
	}
	
} // endif function_exists( 'msd_scripts' ).

add_action( 'wp_enqueue_scripts', 'msd_scripts' );
