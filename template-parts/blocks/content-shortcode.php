<?php $shortcode = get_field('shortcode'); ?>

<?php if ( $shortcode ): ?>

	<div class="wrapper-text py-3">
		
		<div class="container">
	
			<div class="row">
				
				<div class="col-12">
					
					<?php if ( get_field('heading') ): ?>
					
						<h2 class="text-primary text-capitalize mb-2"><?php the_field('heading'); ?></h2>
					
					<?php endif; ?>
					
					<?php if ( get_field('text') ): ?>
					
						<div class="mb-2"><?php the_field('text'); ?></div>
					
					<?php endif; ?>
																	
					<?php echo do_shortcode( $shortcode ); ?>
										
				</div>
				
			</div>
	
		</div>
		
	</div>
	
<?php endif; ?>