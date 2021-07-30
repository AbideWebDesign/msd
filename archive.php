<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="bg-orange py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<?php
				the_archive_title( '<h1 class="text-lg mb-0">', '</h1>' );
				the_archive_description( '<h1 class="text-lg mb-0">', '</h1>' );
				?>

			</div>

		</div>

	</div>

</div>

<div id="archive-wrapper" class="wrapper-sm">

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
