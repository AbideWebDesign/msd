<?php global $post; ?>

<?php $count = count( get_field('cards') ); ?>

<?php if ( $count <= 2 ): ?>

	<?php $col_class = 'col-md-6 mb-2'; ?>

<?php elseif ( $count == 3 ): ?>

	<?php $col_class = 'col-md-6 col-lg-4 mb-2'; ?>

<?php elseif ( $count >= 4 ): ?>

	<?php $col_class = 'col-md-6 col-lg-4 col-xl-3 mb-2'; ?>

<?php endif; ?>

<?php $colors = array( 'bg-primary', 'bg-green', 'bg-red', 'bg-orange', 'bg-dark', 'bg-primary', 'bg-orange', 'bg-red', 'bg-green', 'bg-dark', 'bg-primary', 'bg-red', 'bg-primary', 'bg-green', 'bg-red', 'bg-orange', 'bg-dark', 'bg-primary', 'bg-orange', 'bg-red', 'bg-green', 'bg-dark', 'bg-primary', 'bg-red' ); ?>

<?php $x = 0; ?>

<?php $padding = ( get_field('padding_type') == 'wrapper-sm-none' ? 'wrapper-sm-none' : 'wrapper' ); ?>

<div class="<?php echo $padding; ?> wrapper-cards <?php echo ( get_field('include_sidebar', $post) || ! get_field('cards_include_background') ? 'wrapper-cards-sub' : ''); ?>">
	
	<div class="container">
		
		<?php if ( get_field('cards_title') ): ?>
		
			<div class="row <?php echo ( get_field('include_sidebar', $post) ? '' : 'justify-content-center'); ?>">
				
				<div class="col-auto">
					
					<h2 class="text-dark mb-3"><?php the_field('cards_title'); ?></h2>
					
				</div>
				
			</div>
		
		<?php endif; ?>
	
		<div class="row <?php echo ( get_field('include_sidebar', $post) ? '' : 'justify-content-center'); ?>">
			
			<?php while ( have_rows('cards') ): the_row(); ?>
			
				<div class="<?php echo $col_class; ?>">
					
					<div class="h-100 <?php echo ( get_sub_field('card_type') != 'Text Focus' ? $colors[$x] : 'card-text border rounded p-1' ); ?>">
					
						<?php if ( get_sub_field('card_link') && get_sub_field('card_type') != 'Text Focus' ): ?>
						
							<?php $link = get_sub_field('card_link'); ?>
							
							<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
								
						<?php endif; ?>
					
						<?php if ( get_sub_field('card_content') || get_sub_field('card_text_content') ): ?>
						
							<?php if ( get_sub_field('card_image_style') == 'Full' ): ?>
								
								<div class="text-center mb-3">
									
									<?php echo wp_get_attachment_image( get_sub_field('card_image'), 'small', false, array('class'=>'img-fluid') ); ?>
									
								</div>

							<?php else: ?>
							
								<?php echo wp_get_attachment_image( get_sub_field('card_image'), 'card-sm', false, array('class'=>'img-fluid w-100') ); ?>
								
							<?php endif; ?>
							
							<div class="<?php echo ( get_sub_field('card_type') != 'Text Focus' ? $colors[$x] . 'text-white' : '' ); ?> text-center p-2">
							
								<h4><?php the_sub_field('card_title'); ?></h4>
								
								<?php if ( get_sub_field('card_type') == 'Text Focus' ): ?>
								
									<?php the_sub_field('card_text_content'); ?>
								
								<?php else: ?>
								
									<?php if ( get_sub_field('card_content') ): ?>
									
										<?php the_sub_field('card_content'); ?>
									
									<?php endif; ?>
									
								<?php endif; ?>
								
								<?php if ( get_sub_field('card_link') && get_sub_field('card_type') == 'Text Focus' ): ?>
								
									<?php $link = get_sub_field('card_link'); ?>
									
									<div class="mt-2">
										
										<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" class="btn btn-primary btn-block"><?php echo $link['title']; ?></a>
										
									</div>
								
								<?php endif; ?>
								
							</div>
						
						<?php else: ?>
							
							<?php $img_src = wp_get_attachment_image_src( get_sub_field('card_image'), 'card', false ); ?>
													
							<div class="d-flex h-100 quick-link-wrap" style="background: url(<?php echo $img_src[0]; ?>) center center no-repeat; background-size: cover">
							
								<div class="<?php echo $colors[$x]; ?> text-white text-center p-2 d-flex justify-content-center align-self-end w-100">
							
									<h4 class="mb-0"><?php the_sub_field('card_title'); ?></h4>
							
								</div>
							
							</div>
													
						<?php endif; ?>
						
						<?php if ( get_sub_field('card_link') && get_sub_field('card_type') != 'Text Focus' ): ?>
					
							</a>
					
						<?php endif; ?>
						
					</div>
										
				</div>
			
				<?php $x++; ?>
				
			<?php endwhile; ?>
			
		</div>
		
	</div>
	
</div>