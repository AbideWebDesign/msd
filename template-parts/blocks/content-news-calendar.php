<section id="news" class="wrapper-sm">
	
	<div class="container">

		<div class="row">
				
			<div class="col-md-12 col-lg-8 mb-3 mb-lg-0">
				
				<div class="d-flex justify-content-between pb-1 mb-1 border-bottom">
				
					<div class="align-self-center">
			
						<h2 class="text-primary mb-0"><?php _e('Latest News'); ?></h2>
						
					</div>
			
					<div class="mb-1 mb-md-0">
			
						<a class="btn btn-primary btn-sm" href="<?php echo home_url('/news'); ?>"><?php _e('More Updates'); ?></a>
			
					</div>
			
				</div>
				
				<ul class="list-group">
								
					<?php $args = array( 'post_type' => 'post', 'posts_per_page' => '3', 'category__not_in' => get_excluded_cats(), 'meta_query' => array ( array ( 'key' => 'hide_on_home', 'value' => '0', 'compare' => 'NOT' ) ) ); ?>
	
					<?php $loop = new WP_Query( $args ); ?>
	
	 				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
									
						<li class="list-group-item news-list-item">
						
							<div class="row">
								
								<div class="col-3 col-md-3 mb-0 align-self-center">
								
									<a href="<?php the_permalink(); ?>">
									
										<?php if ( has_post_thumbnail() ): ?>
										
											<?php echo get_the_post_thumbnail( get_the_id(), 'medium', array('alt'=> esc_html( get_the_title() ), 'class' => 'img-fluid w-100') ); ?>
										
										<?php else: ?>
										
											<img src="<?php the_field('news_placeholder', 'options'); ?>" class="img-fluid w-100" />
										
										<?php endif; ?>
																
									</a>
								
								</div>
								
								<div class="col-9 col-md-9 news-list-content">
								
									<a class="text-dark stretched-link text-lg font-weight-bold text-decoration-none mb-2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								
									<div class="text-sm mb-1"><?php the_excerpt(); ?></div>
									
									<div class="text-muted"><?php echo date( 'l, M d Y', strtotime( get_the_date() ) ); ?></div>
									
								</div>
						
							</div>
						
						</li> 
						
					<?php endwhile; ?>
		 			
					<?php wp_reset_query(); ?>
	 									
				</ul>
				
			</div>
			
			<div class="col-12 col-lg-4">
			
				<div class="calendar">
			
					<h2 class="text-primary border-bottom pb-1 mb-1"><?php _e('Calendar'); ?></h2>
							
					<?php render_list_view_district(); ?>
		
					<div class="">
			
						<a class="btn btn-primary btn-sm" href="<?php home_url(); ?>/calendar"><?php _e('More Events'); ?> <i class="fa fa-chevron-right text-xs ml-1"></i></a>
			
					</div>
					
				</div>
			
			</div>
				
		</div>
		
	</div>

</section>