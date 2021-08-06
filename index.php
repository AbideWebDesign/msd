<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<?php if ( ! is_paged() ): ?>

	<?php get_template_part( 'template-parts/blocks/content', 'hero-banner' ); ?>
	
	<?php get_template_part( 'template-parts/blocks/content', 'quick-links'); ?>
	
<?php else: ?>

	<div class="bg-light wrapper-sm">
		
		<div class="container">
			
			<div class="row">
				
				<div class="col">
					
					<h1 class="text-dark mb-0"><?php _e('District News'); ?></h1>
					
				</div>
				
			</div>
			
		</div>
	
	</div>
	
<?php endif; ?>

<div class="wrapper-sm bg-light">

	<div class="container" tabindex="-1">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single-archive' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<!-- The pagination component -->
		<?php msd_pagination(); ?>

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();
