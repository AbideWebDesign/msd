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