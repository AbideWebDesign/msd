<?php

add_action( 'acf/options_page/save', 'sync_calendar_field_from_options', 10, 2 );

function sync_calendar_field_from_options( $post_id, $menu_slug ) {

	 if ( 'acf-options-calendar' !== $menu_slug ) {
        
        return;     
    
    }
    
	$calendar_download_current = get_field( 'calendar_download_current', $post_id );
	
	$calendar_download_current_sp = get_field( 'calendar_download_current_sp', $post_id );
	
	$calendar_download_next = get_field( 'calendar_download_next', $post_id );
	
	$calendar_download_next_sp = get_field( 'calendar_download_next_sp', $post_id );
	
	$calendar_download_bell = get_field( 'calendar_download_bell_schedule', $post_id );

	$calendar_download_next_sp = get_field( 'calendar_download_next_sp', $post_id );
	
	$calendar_download_bell = get_field( 'calendar_download_bell_schedule', $post_id );
	
	$calendar_current_year_label = get_field( 'calendar_current_year_label', $post_id );
	
	$calendar_next_year_label = get_field( 'calendar_next_year_label', $post_id );
	
	$response = wp_remote_post( 'https://mhs.msd.k12.or.us/wp-json/custom/v1/update-calendar', array(
	    'body' => json_encode( array(
	        'calendar_download_current' => $calendar_download_current,
	        'calendar_download_current_sp' => $calendar_download_current_sp,
	        'calendar_download_next' => $calendar_download_next,
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_download_bell' => $calendar_download_bell,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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
	        'calendar_download_next_sp' => $calendar_download_next_sp,
	        'calendar_current_year_label' => $calendar_current_year_label,
	        'calendar_next_year_label' => $calendar_next_year_label,	        
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

    if ( $post->post_status !== 'publish' ) {

        return;

    }
    
    $categories = get_the_category( $post_id );
    
    $category_slugs = array();
    
    foreach ( $categories as $category ) {

        $category_slugs[] = $category->slug;

    }

    if ( ( count( $category_slugs ) === 1 ) && ( in_array( 'spanish', $category_slugs ) || in_array( 'district_news', $category_slugs ) ) ) {

        return;

    }
    
    $all_schools_category = in_array( 'all-schools', $category_slugs );

    $schools = array( 'mcminnville-high-school', 'duniway-middle-school', 'patton-middle-school', 'buel-elementary-school', 'grandhaven-elementary-school', 'memorial-elementary-school', 'newby-elementary-school', 'willamette-elementary-school' );
    
    $news = array();

    foreach ( $schools as $school ) {
        
        if ( $all_schools_category || in_array( $school, $category_slugs ) ) {
            
            $category_ids = array(
                get_cat_ID( 'all-schools' ), 
                get_cat_ID( $school )
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
                    'school' => $school,
                    'post_title' => $school_post->post_title,
                    'post_excerpt' => $school_post->post_excerpt,
                    'post_url' => get_permalink( $school_post->ID ),
                    'image_url' => $featured_image,
                    'date' => get_the_date( 'l, M d Y', $school_post->ID )
                );

            }
            
        }
        
    }
        
    // Send news data to respective endpoints
    foreach ( $schools as $school ) {
        
        $url = "https://{$school}.msd.k12.or.us/wp-json/custom/v1/update-news";
        
        $school_news = array_slice( $news, 0, 3 ); // Get the first 3 news items
        
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