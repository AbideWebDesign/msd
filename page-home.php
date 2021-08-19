<?php
/**
 * Template Name: Home Page
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div id="page-wrapper">
	
	<?php get_template_part('template-parts/blocks/content', 'hero-banner'); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php the_content(); ?>
	
	<?php endwhile; ?>
	
</div>

<?php get_footer();