<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php

if ( function_exists( 'yoast_breadcrumb' ) ) {
	
	yoast_breadcrumb( '<div class="wrapper-breadcrumbs pb-xl-2 mb-2 mb-xl-0 text-sm">','</div>' );

}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="post-header">

		<h2 class="text-dark"><?php the_title(); ?>
		
	</header><!-- .entry-header -->

	<div class="post-content">

		<?php the_field('staff_bio'); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
