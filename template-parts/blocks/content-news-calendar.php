<section id="news" class="wrapper-sm">
	
	<div class="container">

		<div class="row">
				
			<div class="col-md-12 col-lg-8 mb-3 mb-lg-0">
				
				<div class="d-flex justify-content-between pb-1 mb-1 border-bottom">
				
					<div class="align-self-center">
			
						<h2 class="text-primary mb-0"><?php _e('Latest News'); ?></h2>
						
					</div>
			
					<div class="mb-1 mb-md-0">
			
						<a class="btn btn-primary btn-sm" href="https://www.parentsquare.com/schools/<?php the_field('parentsquare_id', 'options'); ?>/feeds"><?php _e('More Updates'); ?></a>
			
					</div>
			
				</div>
				
				<iframe src="https://www.parentsquare.com/schools/<?php the_field('parentsquare_id', 'options'); ?>/rss_widget" title="New School Posts From ParentSquare" height="441px" scrolling="no" frameborder="0" width="100%" style="border:none;overflow:hidden;"></iframe>			
			
			</div>
			
			<div class="col-12 col-lg-4">
			
				<div class="calendar">
			
					<h2 class="text-primary border-bottom pb-1 mb-1"><?php _e('Calendar'); ?></h2>
							
					<?php render_list_view_district(); ?>
		
					<div class="mt-1">
			
						<a class="text-sm" href="<?php home_url(); ?>/calendar"><?php _e('More Events'); ?></a>
			
					</div>
					
				</div>
			
			</div>
				
		</div>
		
	</div>

</section>