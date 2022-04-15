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
	
	<?php $blocks = parse_blocks( $post->post_content ); ?>
		
	<?php if ( $blocks[0]['blockName'] == 'acf/gallery' ): ?>
		
		<div class="bg-light gallery-header">
			
			<?php echo render_block( $blocks[0] ); ?>
			
		</div>
	
	<?php endif; ?>

	<?php if ( get_field('include_sidebar', $post) ): ?>
				
		<div class="py-lg-3">
					
			<div class="container-fluid container-xl">
				
				<div class="row">
					
					<div class="col-lg-3 mb-2 mb-lg-0">
						
						<?php get_sidebar(); ?>
													
						<?php if ( get_field('include_callout') ): ?>
						
							<?php if ( get_field('callout_type') == 'Staff' ): ?>
							
								<?php $count = count(get_field('staff')); ?>
								
								<?php $x = 1; ?>
								
								<div class="pt-3">
									
									<div class="p-2 bg-dark text-white font-weight-bold text-lg"><?php the_field('callout_title'); ?></div>
									
									<div class="bg-light">
										
										<?php while ( have_rows('staff') ): the_row() ?>
										
											<div class="py-1 px-2 text-sm <?php echo ( $count != $x ? 'border-bottom' : '' ); ?>">
												
												<div class="font-weight-bold text-primary">
													
													<?php if ( get_sub_field('email') ): ?>
														
															<a class="text-primary" href="mailto:<?php the_sub_field('email'); ?>" target="_blank">
																
													<?php endif; ?>
													
													<?php the_sub_field('name'); ?>
													
													<?php if ( get_sub_field('email') ): ?>
														
														</a>
													
													<?php endif; ?>
													
												</div>
												
												<?php if ( get_sub_field('title') ): ?>
												
													<div class="text-sm"><?php the_sub_field('title'); ?></div>
												
												<?php endif; ?>
												
												<?php if ( get_sub_field('phone') ): ?>
												
													<div class="text-sm mb-0"><i class="fa fa-phone text-muted"></i> <a class="text-body" href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a></div>
												
												<?php endif; ?>

												<?php if ( get_sub_field('email') ): ?>
												
													<div class="text-sm mb-0"><i class="fa fa-envelope text-muted"></i> <a class="text-body" href="mailto:<?php the_sub_field('email'); ?>" target="_blank"><?php the_sub_field('email'); ?></a></div>
												
												<?php endif; ?>
												
												
											</div>
										
											<?php $x ++; ?>
											
										<?php endwhile; ?>
										
									</div>
									
								</div>
							
							<?php else: ?>
																
								<div class="pt-3 border-md-top d-none d-lg-block">
									
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
															
						<?php endif; ?>
						
					</div>
					
					<div class="col-lg-9 order-1 order-lg-2 wrapper-content">
						
						<?php if ( get_field('include_breadcrumbs') ): ?>
						
							<?php get_template_part('template-parts/blocks/content', 'breadcrumbs'); ?>
						
						<?php endif; ?>
						
						<?php $x = 0; ?>
						
						<?php foreach ( $blocks as $block ): ?>
						
							<?php if ( ( $x != 0 || $x == 0 && 'acf/gallery' != $block['blockName'] ) && 'acf/cta' != $block['blockName'] ): ?>
													
								<?php echo render_block( $block ); ?>
								
							<?php endif; ?>
						
							<?php $x ++; ?>
						
						<?php endforeach; ?>
						
					</div>
				
				</div>
				
			</div>
			
		</div>
		
	<?php else: ?>
		
		<?php $x = 0; ?>
					
		<?php foreach ( $blocks as $block ): ?>
		
			<?php if ( $x != 0 || $x == 0 && 'acf/gallery' != $block['blockName'] ):?>
									
				<?php echo render_block( $block ); ?>
				
			<?php endif; ?>
		
			<?php $x ++; ?>
		
		<?php endforeach; ?>

	<?php endif; ?>

</div>

<?php if ( has_block('acf/cta') && get_field('include_sidebar', $post) ): ?>

	<?php foreach ( $blocks as $block ): ?>
	
		<?php if ( 'acf/cta' == $block['blockName'] ): ?>
		
			<?php echo render_block( $block ); ?>
		
		<?php endif; ?>
	
	<?php endforeach; ?>

<?php endif; ?>

<?php get_footer();