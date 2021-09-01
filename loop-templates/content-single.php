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

	<header class="post-header">

		<h1 class="text-dark smaller"><?php the_title(); ?></h1>
		
	</header><!-- .entry-header -->

	<div class="wrapper-content post-content">

		<?php the_content(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
