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
	
	yoast_breadcrumb( '<div class="wrapper-breadcrumbs pb-xl-2 mb-2 mb-xl-0">','</div>' );

}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="post-header mb-3 border-bottom">

		<h1 class="text-dark smaller mb-1"><?php the_title(); ?></h1>
		
		<div class="text-muted pb-1"><?php _e('Posted: '); ?> <?php the_date(); ?></div>
		
	</header><!-- .entry-header -->

	<div class="wrapper-content post-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
