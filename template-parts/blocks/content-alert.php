<?php

$tz = new DateTimeZone( 'America/Los_Angeles' );

$date_now = new DateTime();

$date_now->setTimezone( $tz );

$args = array(
	'posts_per_page'	=> 1,
	'post_type'			=> 'alert',
	'meta_query' 		=> array(
		'relation' 			=> 'AND',
		array(
	        'key'			=> 'start_time',
	        'compare'		=> '<=',
	        'value'			=> $date_now->format( 'Y-m-d H:i:s' ),
	        'type'			=> 'DATETIME'
	    ),
	    array(
	        'key'			=> 'end_time',
	        'compare'		=> '>=',
	        'value'			=> $date_now->format( 'Y-m-d H:i:s' ),
	        'type'			=> 'DATETIME'
	    ),
	    array(
		'relation' => 'OR',
			array(
				'key'		=> 'schools',
				'value'		=> 'McMinnville School District',
				'compare'	=> 'LIKE',
			),
			array(
				'key'      => 'schools',
				'value'		=> 'All',
				'compare'	=> 'LIKE',
			)  
	    )
    ),
   	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'start_time',
	'meta_type'			=> 'DATE'
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
	
	while ( $query->have_posts() ) : $query->the_post(); ?>
	
		<div class="alert-emergency-body py-1" style="background-color: #<?php the_field('alert_color', get_the_ID()); ?>">
			
			<div class="container">
			
				<div class="row">
			
					<div class="col-12">
						
						<div class="text-lg text-white">
			
							<?php if ( get_field('link_to_post', get_the_id()) ): ?>
			
								<a class="stretched-link" href="<?php the_field('link', get_the_id()); ?>" target="<?php echo ( get_field('link_type', get_the_id()) == 'External' ? '_blank' : '_self' ); ?>">
			
							<?php endif; ?>
							
							<?php the_title(); ?>
							
							<?php if ( get_field('alert_sub_title', get_the_ID()) ): ?>
							
								<div class="text-uppercase text-white font-weight-bold mb-0 text-xs"><?php the_field('alert_sub_title', get_the_ID()); ?></div>	
								
							<?php endif; ?>
							
							<?php if ( get_field('link_to_post', get_the_id()) ): ?>
			
								</a>
			
							<?php endif; ?>
			
						</div>
			
					</div>
			
				</div>				
			
			</div>
		
		</div>

	<?php endwhile; ?>
	
<?php endif; ?>

<?php wp_reset_postdata(); ?>