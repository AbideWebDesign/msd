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

<div class="bg-red py-3">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col">
				
				<h1 class="text-lg text-white mb-0"><?php _e('District News'); ?></h1>
				
			</div>
			
		</div>
		
	</div>

</div>

<div class="wrapper-sm bg-light">

	<div class="container" tabindex="-1">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-templates/content', 'single-archive' ); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<?php msd_pagination(); ?>

	</div>

</div>

<?php get_footer();
