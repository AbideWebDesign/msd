<?php
	
$cats = get_field( 'posts_categories' ); 

$args = array (
	'post_type'			=> 'post',
	'post_status'		=> 'publish',
	'posts_per_page' 	=> get_field('posts_count'),
	'orderby'       	=> 'date',
    'order'         	=> 'DESC',
	'cat'				=> $cats
);

$query = new WP_Query( $args ); 

?>

<?php if ( $query->have_posts() ): ?>

	<div class="wrapper-posts wrapper-text">
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-12">
				
					<h2 class="mb-2"><?php the_field('posts_title'); ?></h2>
					
					<?php if ( get_field('posts_text') ): ?>
					
						<div class="mb-2"><?php the_field('posts_text'); ?></div>
					
					<?php endif; ?>
					
				</div>
				
				<div class="col-12">
				
					<ul class="list-group">
						
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
										
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
				
			</div>
			
		</div>
		
	</div>

<?php endif; ?>