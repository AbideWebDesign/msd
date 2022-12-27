<div class="<?php echo ( have_rows('call_outs') ? 'wrapper' : 'wrapper-sm' ); ?>">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-12 text-center">
				
				<div class="text-xl text-blue-dark<?php echo ( have_rows('call_outs') ? ' mb-4' : '' ); ?>"><?php the_field('call_out_title'); ?></div>
				
			</div>
			
		</div>
		
		<?php if ( have_rows('call_outs') ): ?>
		
			<div class="row justify-content-between">
				
				<?php while ( have_rows('call_outs') ): the_row(); ?>
				
					<div class="col-md-4 col-lg-3 mb-2 mb-md-0 text-center">
						
						<h1 class="large text-primary mb-1"><?php the_sub_field('large_text'); ?></h1>
						
						<div class="text-lg text-blue-dark"><?php the_sub_field('small_text'); ?></div>
						
					</div>
				
				<?php endwhile; ?>
				
			</div>
			
		<?php endif; ?>
		
	</div>
	
</div>