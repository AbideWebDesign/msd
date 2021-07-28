<?php
/**
 * Search results partial template
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( 'page' === get_post_type() || 'post' === get_post_type() ) {

	$title = get_the_title();

} else if ( 'attachment' === get_post_type() ) {

	$char = array( '-', '_' );
	
	$title = get_the_title();
	
	$title = str_replace( $char, ' ', $title );

} 

?>

<div class="search-results">

	<header class="entry-header">

		<h4 class="mb-0">

			<a href="<?php the_permalink(); ?>" <?php echo ( 'attachment' === get_post_type( $post ) ? 'target="_blank"' : '' ); ?> rel="bookmark"><?php echo $title; ?></a>

		</h4>

		<p class="search-link"><?php the_permalink(); ?></p>
		
		<?php if ( 'attachment' === get_post_type() ): ?>
		
			<p class="search-meta"><a href="<?php the_permalink(); ?>" target="_blank"><i class="fa fa-download"></i> <?php _e('Media File','msd'); ?></a></p>
		
		<?php endif; ?>
		
	</header>
	
	<?php the_excerpt(); ?>

</div>