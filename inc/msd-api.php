<?php

add_action( 'acf/options_page/save', 'sync_calendar_field_from_options', 10, 2 );

function sync_calendar_field_from_options( $post_id, $menu_slug ) {

	 if ( 'acf-options-calendar' !== $menu_slug ) {
        
        return;     
    
    }
    
	$calendar_download_current = get_field( 'calendar_download_current', $post_id );
	
	$calendar_download_current_sp = get_field( 'calendar_download_current_sp', $post_id );
	
	$calendar_download_next = get_field( 'calendar_download_next', $post_id );
	
	$calendar_download_next_2 = get_field( 'calendar_download_next_2', $post_id );
	
	$calendar_download_next_3 = get_field( 'calendar_download_next_3', $post_id );
	
	$calendar_download_next_sp = get_field( 'calendar_download_next_sp', $post_id );
	
	$calendar_download_next_2_sp = get_field( 'calendar_download_next_2_sp', $post_id );
	
	$calendar_download_next_3_sp = get_field( 'calendar_download_next_3_sp', $post_id );
	
	$calendar_download_bell = get_field( 'calendar_download_bell_schedule', $post_id );
		
	$calendar_current_year_label = get_field( 'calendar_current_year_label', $post_id );
	
	$calendar_next_year_label = get_field( 'calendar_next_year_label', $post_id );
	
	$calendar_next_year_2_label = get_field( 'calendar_next_year_2_label', $post_id );
	
	$calendar_next_year_3_label = get_field( 'calendar_next_year_3_label', $post_id );
	
	$response = wp_remote_post( 'https://mhs.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );
	
	$response = wp_remote_post( 'https://duniway.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://patton.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://buel.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://grandhaven.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://memorial.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );
	
	$response = wp_remote_post( 'https://newby.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://wascher.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );

	$response = wp_remote_post( 'https://willamette.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_2' => $calendar_download_next_2,
	        'calendar_download_next_3' => $calendar_download_next_3,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_next_2_sp' => $calendar_download_next_2_sp,
	        'calendar_download_next_3_sp' => $calendar_download_next_3_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,
	        'calendar_next_year_2_label' => $calendar_next_year_2_label,
	        'calendar_next_year_3_label' => $calendar_next_year_3_label,	        
	    ) ),
	    'headers' => array(
	        'Content-Type' => 'application/json',
	    ),
	) );
	
}

add_action( 'acf/options_page/save', 'sync_slides_field_from_options', 10, 2 );

function sync_slides_field_from_options( $post_id, $menu_slug ) {
	
	 if ( 'acf-options-carousel-slides' !== $menu_slug ) {
        
        return;     
    
    }

    $slides = get_field( 'slides', 'option' );

    if ( ! empty( $slides ) ) {

        $response = wp_remote_post( 'https://mhs.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://duniway.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://patton.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://buel.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://grandhaven.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://memorial.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://newby.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://wascher.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        $response = wp_remote_post( 'https://willamette.msd.k12.or.us/wp-json/custom/v1/update-slides', array(
            'body' => json_encode( array(
                'slides' => $slides,
            ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );
      
        error_log( 'Sync response: ' . print_r( $response, true ) );

    }

}
if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}
// Add action hook for ACF saving
add_action( 'acf/save_post', 'sync_news_on_acf_save', 20 );

add_action( 'before_delete_post', 'sync_news_on_acf_save' );

function sync_news_on_acf_save( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        
        return;
    
    }

    if ( wp_is_post_revision( $post_id ) || $post_id === 'options' ) {

        return;

    }

    $post = get_post( $post_id );
    
    $categories = get_the_category( $post_id );

    $category_slugs = array();
    
    foreach ( $categories as $category ) {

        $category_slugs[] = $category->slug;

    }

    if ( !in_array( 'mcminnville-high-school', $category_slugs ) && !in_array( 'duniway-middle-school', $category_slugs ) && !in_array( 'patton-middle-school', $category_slugs ) && !in_array( 'buel-elementary-school', $category_slugs ) && !in_array( 'grandhaven-elementary-school', $category_slugs ) && !in_array( 'memorial-elementary-school', $category_slugs ) && !in_array( 'newby-elementary-school', $category_slugs ) && !in_array( 'wascher-elementary-school', $category_slugs ) && !in_array( 'willamette-elementary-school', $category_slugs ) && !in_array( 'all-schools', $category_slugs ) ) {

    	return;

	}
    
    $all_schools_category = in_array( 'all-schools', $category_slugs );

    $schools = array( 'mcminnville-high-school', 'duniway-middle-school', 'patton-middle-school', 'buel-elementary-school', 'grandhaven-elementary-school', 'memorial-elementary-school', 'newby-elementary-school', 'wascher-elementary-school', 'willamette-elementary-school' );

	$school_names = array( 'McMinnville High School', 'Duniway Middle School', 'Patton Middle School', 'Buel Elementary School', 'Grandhaven Elementary School', 'Memorial Elementary School', 'Newby Elementary School', 'Wascher Elementary School', 'Willamette Elementary School' );
	
    $school_slugs = array( 'mhs', 'duniway', 'patton', 'buel', 'grandhaven', 'memorial', 'newby', 'wascher', 'willamette' );

    $news = array();
	
	$index = 0;
	
    foreach ( $schools as $school ) {
            
        $category_ids = array(
            get_cat_ID( 'All Schools' ), 
            get_cat_ID( $school_names[$index] )
        );

        $args = array(
            'posts_per_page' => 3,
            'cat' => $category_ids,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        );

        $school_posts = get_posts( $args );
        
        foreach ( $school_posts as $school_post ) {
			
			$featured_image = get_the_post_thumbnail_url( $school_post->ID, 'medium' );

            $news[] = array(
                'school' => $school_names[$index],
                'post_title' => $school_post->post_title,
                'post_excerpt' => $school_post->post_excerpt,
                'post_url' => get_permalink( $school_post->ID ),
                'image_url' => $featured_image,
                'date' => get_the_date( 'l, M d Y', $school_post->ID )
            );

        }
        
        $index ++;
        
    }
	
	$count_offset = 0;
	
	$count_length = 3;
	
    // Send news data to respective endpoints
    foreach ( $school_slugs as $school ) {

        $url = "https://{$school}.msd.k12.or.us/wp-json/custom/v1/update-news";
        
        $school_news = array_slice( $news, $count_offset, $count_length );
        
        $response = wp_remote_post( $url, array(
            'body' => json_encode( array( 'news' => $school_news ) ),
            'headers' => array(
                'Content-Type' => 'application/json',
            ),
        ) );

        if ( is_wp_error( $response ) ) {
            
            error_log( 'Error syncing news for ' . $school . ': ' . $response->get_error_message() );
        
        } else {
            
            error_log( 'Synced news for ' . $school . ': ' . print_r( $response, true ) );
        
        }
        
        $count_offset = $count_offset + 3;
                
    }
    
}

add_filter( 'rest_alert_query', function( $query_args, $request ){

	$tz = new DateTimeZone( 'America/Los_Angeles' );
	
	$date_now = new DateTime();
	
	$date_now->setTimezone( $tz );
	
	$query_args['posts_per_page'] = 1;
	
	$query_args['meta_query'][] = array(
		'key'      => 'start_time',
		'value'    => $date_now->format( 'Y-m-d H:i:s' ),
		'compare'  => '<=',
		'type'     => 'DATETIME',
	);
	
	$query_args['meta_query'][] = array(
		'key'      => 'end_time',
		'value'    => $date_now->format( 'Y-m-d H:i:s' ),
		'compare'  => '>=',
		'type'     => 'DATETIME',
	);

	$query_args['meta_query'][] = array(
		'relation' => 'OR',
		array(
			'key'		=> 'schools',
			'value'		=> $request['school'],
			'compare'	=> 'LIKE',
		),
		array(
			'key'      	=> 'schools',
			'value'    	=> 'All',
			'compare'	=> 'LIKE',			
		)
	);

    return $query_args;
    
}, 10, 2 );

add_filter( 'rest_post_query', function( $query_args, $request ){

	$tz = new DateTimeZone( 'America/Los_Angeles' );
	
	$date_now = new DateTime();
	
	$date_now->setTimezone( $tz );
		
	$query_args['meta_query'][] = array(
		'relation' => 'OR',
		array(
			'relation' => 'AND',
			array(
				'key'	=> 'remove_from_home',
				'compare'	=> 'EXISTS',
			),
			array(
				'key'		=> 'remove_from_home',
		        'compare'	=> '>=',
		        'value'		=> $date_now->format( 'Y-m-d H:i:s' ),
		        'type'		=> 'DATETIME'	
			)
		),
		array(
			'key'		=> 'remove_from_home',
	        'compare'	=> 'NOT EXISTS',
		), 
		array(
			'key'		=> 'remove_from_home', // For dates set and then removed
			'compare'	=> '=',
			'value'		=> '',
		)
	);

    return $query_args;
    
}, 10, 2 );