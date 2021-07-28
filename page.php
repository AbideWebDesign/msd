<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

global $post;

?>

<div id="page-wrapper">
	
	<?php if ( get_field('include_sidebar', $post) ): ?>
	
		<?php $blocks = parse_blocks( $post->post_content ); ?>
		
		<?php if ( $blocks[0]['blockName'] == 'acf/gallery' ): ?>
	
			<?php echo render_block( $blocks[0] ); ?>
			
		<?php else: ?>
		
			<div class="mb-3"></div>
		
		<?php endif; ?>
			
		<div class="container">
			
			<div class="row">
				
				<div class="col-lg-3 col-xl-3 d-none d-lg-block">
					
					<?php get_sidebar(); ?>
					
				</div>
				
				<div class="col-lg-8">
					
					<?php if ( get_field('include_breadcrumbs') ): ?>
					
						<?php get_template_part('template-parts/blocks/content', 'breadcrumbs'); ?>
					
					<?php endif; ?>
					
					<?php $x = 0; ?>
					
					<?php foreach ( $blocks as $block ): ?>
					
						<?php if ( $x != 0 || $x == 0 && 'acf/gallery' != $block['blockName'] ): ?>
												
							<?php echo render_block( $block ); ?>
							
						<?php endif; ?>
					
						<?php $x ++; ?>
					
					<?php endforeach; ?>
					
				</div>
			
			</div>
			
		</div>
		
	<?php else: ?>
		
		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php the_content(); ?>
			
		<?php endwhile; ?>
			
	<?php endif; ?>

</div>

<?php get_footer();