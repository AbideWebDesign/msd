<?php
/**
 * The template for displaying all single posts
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php get_template_part( 'template-parts/blocks/content', 'hero-banner' ); ?>

<?php if ( get_field('staff_bio') ): ?>
	
	<div class="wrapper-sm">
	
		<div class="container" tabindex="-1">
	
			<div class="row justify-content-between">
				
				<div class="col-lg-12">
	
					<?php while ( have_posts() ) : the_post(); ?>
		
						<?php get_template_part( 'loop-templates/content', 'staff' ); ?>
		
					<?php endwhile; ?>
					
				</div>
	
			</div>
	
		</div>
	
	</div>
	
<?php endif; ?>

<div class="bg-light py-2">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-auto"><a href="<?php echo home_url('/staff'); ?>"><i class="fa fa-chevron-left"></i> <?php _e('View All Staff'); ?></a></div>
			
		</div>
		
	</div>
	
</div>

<?php get_footer();