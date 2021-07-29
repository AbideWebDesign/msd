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
		
			<div class="mb-lg-3"></div>
		
		<?php endif; ?>
			
		<div class="container">
			
			<div class="row">
				
				<div class="col-lg-3 col-xl-3 order-2 order-lg-1 mb-3">
					
					<div class="d-none d-lg-block">
						
						<?php get_sidebar(); ?>
						
					</div>
					
					<?php if ( get_field('include_callout') ): ?>
						
						<div class="pt-3 border-md-top">
							
							<div class="row">
								
								<?php if ( get_field('callout_image') ): ?>
								
									<div class="col-lg-12 col-md-4 align-self-center">
										
										<?php echo wp_get_attachment_image( get_field('callout_image'), 'card-sm', false, array('alt'=>get_the_title( get_field('callout_image') ), 'class'=>'img-fluid w-100 mb-1') ); ?>
										
									</div>
								
								<?php endif; ?>
								
								<div class="<?php echo ( get_field('callout_image') ? 'col-md-8' : '' ); ?> col-lg-12 align-self-center">
									
									<?php if ( get_field('callout_title') ): ?>
									
										<div class="text-dark font-weight-bold mb-1"><?php the_field('callout_title'); ?></div>
									
									<?php endif; ?>
									
									<?php if ( get_field('callout_text') ): ?>
			
										<div class="text-sm mb-1"><?php the_field('callout_text'); ?></div>
			
									<?php endif; ?>
			
									<?php if ( get_field('callout_button') ): ?>
									
										<?php $link = get_field('callout_button'); ?>
			
										<a class="btn btn-secondary btn-sm" href="<?php echo $link['url']; ?>" target="<?php $link['target']; ?>" title="Click to view <?php echo $link['title']; ?>"><?php echo $link['title']; ?></a>
			
									<?php endif; ?>
									
								</div>
								
							</div>
	
						</div>
					
					<?php endif; ?>
					
				</div>
				
				<div class="col-lg-8 col-xl-9 order-1 order-lg-2">
					
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