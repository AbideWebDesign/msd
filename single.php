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

<?php if ( get_field('include_hero') ): ?>

	<?php get_template_part( 'template-parts/blocks/content', 'hero-banner' ); ?>

<?php endif; ?>

<div class="wrapper-sm">

	<div class="container" tabindex="-1">

		<div class="row justify-content-between">
			
			<div class="col-lg-4 col-xl-3 order-2 order-xl-1">
				
				<?php get_template_part( 'loop-templates/content', 'single-sidebar'); ?>
				
			</div>
			
			<div class="col-lg-8 col-xl-9 order-1 order-xl-2">

				<?php while ( have_posts() ) : the_post(); ?>
	
					<?php get_template_part( 'loop-templates/content', 'single' ); ?>
	
				<?php endwhile; ?>
				
			</div>

		</div>

	</div>

</div>

<?php get_footer();