<?php 

$tz = new DateTimeZone( 'America/Los_Angeles' );

$date_now = new DateTime();

$date_now->setTimezone( $tz );
	
$args = array ( 
	'post_type' => 'post', 
	'posts_per_page' => '3', 
	'category__in' => '1', 
	'meta_query' => array (
		'relation' => 'AND',
		array ( 
			'key' => 'hide_on_home', 
			'value' => '0', 
			'compare' => 'NOT' 
		)
	) 
); 
	
?>

<section id="news" class="py-3">
	
	<div class="container">

		<div class="row">
				
			<div class="col-md-12 col-lg-8 mb-3 mb-lg-0">
				
				<div class="d-flex justify-content-between pb-1 mb-1 border-bottom">
				
					<div class="align-self-center">
			
						<h2 class="text-primary mb-0"><?php _e('Latest News'); ?></h2>
						
					</div>
			
					<div class="align-self-center">
					
						<div class="d-flex">
							
							<div class="mr-1">
								
								<a class="btn btn-primary btn-sm" href="https://www.msd.k12.or.us/news/" target="_blank"><?php _e('More News'); ?> <i class="fa fa-chevron-right text-xs ml-1"></i></a>
			
							</div>
							
							<div>
								
								<a class="btn btn-secondary btn-sm" href="<?php echo home_url('/district-updates'); ?>"><?php _e('Parent Square Updates'); ?> <i class="fa fa-chevron-right text-xs ml-1"></i></a>

							</div>
							
						</div>
							
					</div>
										
				</div>
				
				<ul class="list-group">
								
					<?php $loop = new WP_Query( $args ); ?>
	
	 				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
									
						<li class="list-group-item news-list-item">
						
							<div class="row">
								
								<div class="col-12 col-md-3 mb-1 mb-md-0 align-self-center">
								
									<a href="<?php the_permalink(); ?>">
									
										<?php if ( has_post_thumbnail() ): ?>
										
											<?php echo get_the_post_thumbnail( get_the_id(), 'medium', array('alt'=> esc_html( get_the_title() ), 'class' => 'img-fluid w-100') ); ?>
										
										<?php else: ?>
										
											<img src="<?php the_field('news_placeholder', 'options'); ?>" class="img-fluid w-100" />
										
										<?php endif; ?>
																
									</a>
								
								</div>
								
								<div class="col-12 col-md-9 news-list-content align-self-center">
								
									<a class="text-dark stretched-link text-lg font-weight-bold text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								
									<div class="text-sm my-1"><?php the_excerpt(); ?></div>
									
									<div class="text-sm text-muted"><?php echo date( 'l, M d Y', strtotime( get_the_date() ) ); ?></div>
									
								</div>
						
							</div>
						
						</li> 
					
					<?php endwhile; ?>
		 			
					<?php wp_reset_query(); ?>
	 									
				</ul>
				
			</div>
			
			<div class="col-12 col-lg-4">
			
				<div class="calendar">
					
					<div class="d-flex justify-content-between border-bottom pb-1 mb-1">
						
						<div class="align-self-center">
							
							<h2 class="text-primary mb-0"><?php _e('Calendar'); ?></h2>
							
						</div>
						
						<div class="align-self-center">
							
							<a class="btn btn-primary btn-sm" href="<?php home_url(); ?>/calendar"><?php _e('More Events'); ?> <i class="fa fa-chevron-right text-xs ml-1"></i></a>
							
						</div>
						
					</div>
							
					<?php render_list_view_district(); ?>
					
				</div>
				
				<div class="row justify-content-center mt-2">
					
					<div class="col-8 col-md-4 mb-1 mb-md-0">
						
						<a href="https://www.safeoregon.com/" target="_blank"><img src="https://www.msd.k12.or.us/wp-content/uploads/2023/07/Safe_Oregon_Vertical-1-e1649882378961-mcminnville-school-district.jpg" class="img-fluid" /></a>
											
					</div>
										
					<div class="col-8 col-md-4 col-lg-6 align-self-xl-center">
						
						<a href="https://app.peachjar.com/flyers/all/districts/33778/" target="_blank"><img style="width:175px;" src="https://www.msd.k12.or.us/wp-content/uploads/2023/07/button-blue-peachjar-copy-1-1-mcminnville-school-district.jpg" alt="School Flyers Powered by Peachjar" title="School Flyers Powered by Peachjar"></a>
						
					</div>
																
				</div>
			
			</div>
				
		</div>
		
	</div>

</section>