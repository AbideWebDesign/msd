<div class="wrapper">
	
	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-12 text-center">
				
				<div class="text-xl mb-4 text-blue-dark"><?php the_field('call_out_title'); ?></div>
				
			</div>
			
		</div>
		
		<div class="row justify-content-between">
			
			<?php while ( have_rows('call_outs') ): the_row(); ?>
			
				<div class="col-md-4 col-lg-3 mb-2 mb-md-0 text-center">
					
					<h1 class="large text-primary mb-1"><?php the_sub_field('large_text'); ?></h1>
					
					<div class="text-lg text-blue-dark"><?php the_sub_field('small_text'); ?></div>
					
				</div>
			
			<?php endwhile; ?>
			
		</div>
		
	</div>
	
</div>