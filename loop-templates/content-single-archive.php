<div class="bg-white p-2 mb-2">
	
	<div id="post-<?php the_ID(); ?>" class="row">
		
		<div class="col-4 col-lg-3">
			
			<a href="<?php the_permalink(); ?>">
				
			<?php if ( has_post_thumbnail() ): ?>
			
				<?php echo get_the_post_thumbnail( get_the_id(), 'medium', array('alt'=> esc_html( get_the_title() ), 'class' => 'img-fluid w-100') ); ?>
			
			<?php else: ?>
			
				<img src="<?php the_field('news_placeholder', 'options'); ?>" class="img-fluid w-100" />
			
			<?php endif; ?>
				
			</a>
		
		</div>
		
		<div class="col-8 col-lg-9 align-self-center align-self-md-start">
		
			<a class="stretched-link text-dark text-xl font-weight-bold text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			
			<div class="text-sm my-1"><strong><?php echo ( get_field('legacy_post_date') ? get_field('legacy_post_date') :  'Posted on ' . get_the_date() ); ?></strong></div>

			<div class="post-content d-none d-md-block mt-1">
		
				<?php the_excerpt(); ?>
		
			</div><!-- .entry-content -->
			
		</div>
		
	</div>
				
</div>