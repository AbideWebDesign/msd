<?php 

	$id = get_the_ID();

	if ( has_category( 'meeting-minutes-agenda' ) ) {

		$args = array( 'post_type' => 'post', 'posts_per_page' => '15', 'post__not_in' => array( $id ), 'category_name' => 'meeting-minutes-agenda' );

	} else {

		$args = array( 'post_type' => 'post', 'posts_per_page' => '5', 'post__not_in' => array( $id ), 'cat' => array( 1 ) );

	}

	$loop = new WP_Query( $args );

?>

<div class="wrapper-sidebar-links border rounded mb-3">
		
	<div class="bg-blue-dark text-white p-2">
		
		<?php if ( has_category( 'meeting-minutes-agenda' ) ): ?>
		
			<div class="font-weight-bold text-lg"><?php _e('Past Meetings'); ?></div>
			
		<?php else: ?>

			<div class="font-weight-bold text-lg"><?php _e('Recent News'); ?></div>
		
		<?php endif; ?>

	</div>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
		<div class="sidebar-post-link">
			
			<div class="row no-gutters">
					
				<div class="col-12 py-1">
		
					<a class="streteched-link text-lg-sm text-center text-md-left" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					
					<div class="text-xs text-muted"><?php echo get_the_date(); ?></div>
					
					<div class="d-sm-block d-md-none text-sm mt-1 p-m-0">
						
						<?php the_excerpt(); ?>
						
					</div>
				
				</div>
				
			</div>
			
		</div>

	<?php endwhile; ?>

	<?php wp_reset_query(); ?>		

</div>