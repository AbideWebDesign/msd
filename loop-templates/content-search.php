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

} elseif ( 'attachment' === get_post_type() ) {

	$char = array( '-', '_' );
	
	$title = get_the_title();
	
	$title = str_replace( $char, ' ', $title );

} elseif ( 'staff' === get_post_type() ) {
	
	$title = get_the_title();
	
	$building = get_the_terms( get_the_id(), 'building' );

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
		
		<?php if ( 'staff' === get_post_type() ): ?>
					
			<div class="text-sm mt-1"><?php echo ucwords( strtolower( $building[0]->name ) ); ?></div>
				
			<div class="text-sm"><?php if ( get_field('staff_email_address') ): ?><a href="mailto:<?php the_field('staff_email_address'); ?>"><?php the_field('staff_email_address'); ?></a><?php endif; ?></div>
			
			<div class="text-sm"><?php echo ucwords( strtolower ( get_field('staff_position_description') ) ); ?></div>
				
			<?php if ( get_field('staff_work_phone') ): ?>
			
				<div class="text-sm"><?php the_field('staff_work_phone'); ?></div>
			
			<?php endif; ?>
		
		<?php endif; ?>
		
	</header>
	
	<?php the_excerpt(); ?>

</div>