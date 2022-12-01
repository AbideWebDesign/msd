<?php

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