<?php 

	$id = get_the_ID();

	$args = array( 'post_type' => 'post', 'posts_per_page' => '5', 'post__not_in' => array( $id ) );

	$loop = new WP_Query( $args );

?>
<div class="wrapper-sidebar-links border rounded mb-3">
		
	<div class="bg-blue-dark text-white p-2">
		
		<div class="font-weight-bold text-lg"><?php _e('Recent News'); ?></div>

	</div>
	
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		
		<div class="sidebar-post-link">
			
			<div class="row no-gutters">
				
				<div class="col-md-4 col-lg-3 col-xl-5 mb-1 mb-lg-0 align-self-center">
					
					<a class="streteched-link" href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail', array('alt' => esc_html ( get_the_title() ), 'class' => 'img-fluid w-100') ); ?></a>
					
				</div>
				
				<div class="col-md-8 col-lg-9 col-xl-7 align-self-center pl-md-2 pt-1 pb-1 pr-md-1 pb-md-1 pb-lg-0 pt-lg-0">
		
					<a class="streteched-link text-lg-sm text-center text-md-left" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					
					<div class="d-sm-block d-md-none text-sm mt-1 p-m-0">
						
						<?php the_excerpt(); ?>
						
					</div>
				
				</div>
				
			</div>
			
		</div>

	<?php endwhile; ?>

	<?php wp_reset_query(); ?>		

</div>