<?php
/**
 * The template for displaying search results pages
 *
 * @package msd
 */

get_header(); 

$link = get_field('search_sidebar_button', 'options');

?>

<div id="primary" class="content-area py-2">

	<div class="container">

		<div class="row justify-content-center mb-2">

			<div class="col-12">

				<h2 class="mb-1"><?php _e('Search','msd'); ?></h2>

				<div class="bg-light p-2">

					<div id="search-form">

						<form role="search" class="row" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

							<div class="col-md-9 col-lg-10 mb-1 mb-md-0">

								<label class="sr-only" for="search-text"><?php _e('Search','msd'); ?></label>

								<input type="text" class="form-control form-control-lg bg-light w-100" placeholder="<?php _e('Search','msd'); ?>..." value="<?php echo get_search_query(); ?>" name="s">

							</div>

							<div class="col-md-3 col-lg-2 d-flex align-items-stretch">

								<button type="submit" class="btn btn-primary btn-block"><?php _e('Search','msd'); ?></button>

							</div>

						</form>

					</div>	

				</div>

			</div>

		</div>

		<div class="row justify-content-center">

			<div class="col-md-9">

				<?php 

				if ( have_posts() ) {
			
					while ( have_posts() ) { 
						
						the_post();
		
						get_template_part( 'loop-templates/content', 'search' );
		
					}
		
					msd_pagination();
	
				} else {
					
					_e('No results returned.','msd'); 
		
				}
			
			?>
			
			</div>
			
			<div class="col-md-3">
			
				<div class="bg-primary p-2 mt-2 mt-md-0 text-center text-white">
			
					<h3><?php the_field('search_sidebar_title', 'options'); ?></h3>
			
					<div class="text-sm mb-2"><?php the_field('search_sidebar_text', 'options'); ?></div>
			
					<a class="btn btn-secondary btn-sm btn-block text-primary" title="Click to view <?php echo $link['title']; ?>" href="<?php echo $link['url']; ?>" target="<?php $link['target']; ?>"><?php echo $link['title']; ?></a>
			
				</div>
			
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>