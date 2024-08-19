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