<?php 
/**
 * Template Name: Calendar
 *
 * @package msd
 */
 get_header();
?>

<div class="bg-blue-light py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<h1 class="mb-0 text-lg text-white"><?php the_field('calendar_title', 'options'); ?></h1>

			</div>

		</div>

	</div>

</div>

<div class="py-3 bg-light border-bottom">

	<div class="container">

		<div class="row">
			
			<?php if ( have_rows('calendar_dates', 'options') ): ?>
			
				<div class="col-lg-7 col-xl-8">

					<h2 class="text-dark"><?php _e('Important Dates'); ?></h2>
				
					<ul class="fa-ul mb-0 text-lg">
						
						<?php while ( have_rows('calendar_dates', 'options') ): the_row(); ?>
						
							<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span> <span class="font-weight-bold text-primary"><?php the_sub_field('entry_title'); ?></span> - <?php the_sub_field('entry_date'); ?></li>

						<?php endwhile; ?>
							
					</ul>
				
				</div>
				
			<?php endif; ?>
				
			<div class="col-lg-5 col-xl-4 mt-2 mt-lg-0">
				
				<h2 class="text-dark"><?php _e('Calendar Downloads'); ?></h2>
				
				<ul class="fa-ul mb-0 text-lg">
					
					<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span><a title="Download calendar" href="<?php the_field('calendar_download_current', 'options'); ?>" target="_blank"><?php the_field('calendar_current_year_label', 'options'); ?> <?php _e('Calendar English'); ?></a> <a href="<?php the_field('calendar_download_current_sp', 'options'); ?>" target="_blank"><?php _e('(View Spanish)'); ?></a></li>
										
					<?php if ( get_field('calendar_download_next', 'options') ): ?>
					
						<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span><a title="Download calendar" href="<?php the_field('calendar_download_next', 'options'); ?>" target="_blank"><?php the_field('calendar_next_year_label', 'options'); ?> <?php _e('Calendar English'); ?></a> <a href="<?php the_field('calendar_download_next_sp', 'options'); ?>" target="_blank"><?php _e('(View Spanish)'); ?></a></li>
					
					<?php endif; ?>

					<?php if ( get_field('calendar_download_pre_k', 'options') ): ?>

						<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span><a title="Download calendar" href="<?php the_field('calendar_download_pre_k', 'options'); ?>" target="_blank"><?php the_field('calendar_current_year_label', 'options'); ?> <?php _e('Pre-K Calendar English'); ?></a> <a href="<?php the_field('calendar_download_pre_k_sp', 'options'); ?>" target="_blank"><?php _e('(View Spanish)'); ?></a></li>

					<?php endif; ?>
					
					<?php if ( get_field('calendar_download_next_2', 'options') ): ?>
					
						<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span><a title="Download calendar" href="<?php the_field('calendar_download_next_2', 'options'); ?>" target="_blank"><?php the_field('calendar_next_year_2_label', 'options'); ?> <?php _e('Calendar English'); ?></a> <a href="<?php the_field('calendar_download_next_2_sp', 'options'); ?>" target="_blank"><?php _e('(View Spanish)'); ?></a></li>
					
					<?php endif; ?>

					<?php if ( get_field('calendar_download_next_3', 'options') ): ?>
					
						<li class="mb-1"><span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span><a title="Download calendar" href="<?php the_field('calendar_download_next_3', 'options'); ?>" target="_blank"><?php the_field('calendar_next_year_3_label', 'options'); ?> <?php _e('Calendar English'); ?></a> <a href="<?php the_field('calendar_download_next_3_sp', 'options'); ?>" target="_blank"><?php _e('(View Spanish)'); ?></a></li>
					
					<?php endif; ?>
														
				</ul>
									
			</div>

		</div>
		
	</div>
	
</div>

<div class="py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<?php render_calendar(); ?>

			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>