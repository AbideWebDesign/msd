<?php global $post; ?>

<?php $count = count( get_field('cards') ); ?>

<?php $col_class = ( $count == 4 ? 'col-md-6 col-lg-5 col-xl-3 mb-2 mb-xl-0' : 'col-lg-4 mb-2 mb-lg-0' ); ?>

<?php $colors = array( 'bg-primary', 'bg-orange', 'bg-green', 'bg-red' ); ?>

<?php $x = 0; ?>

<div class="wrapper wrapper-cards <?php echo ( get_field('include_sidebar', $post) ? 'wrapper-cards-sub' : ''); ?>">
	
	<div class="container">
	
		<div class="row <?php echo ( get_field('include_sidebar', $post) ? '' : 'justify-content-center'); ?>">
			
			<?php while ( have_rows('cards') ): the_row(); ?>
			
				<div class="<?php echo $col_class; ?>">
					
					<?php if ( get_sub_field('card_link') ): ?>
					
						<?php $link = get_sub_field('link'); ?>
						
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
							
					<?php endif; ?>
				
					<?php if ( get_sub_field('card_content') ): ?>
					
						<?php echo wp_get_attachment_image( get_sub_field('card_image'), 'card-sm', false, array('class'=>'img-fluid w-100') ); ?>
						
						<div class="<?php echo $colors[$x]; ?> text-white text-center p-2">
						
							<h4><?php the_sub_field('card_title'); ?></h4>
							
							<?php if ( get_sub_field('card_content') ): ?>
							
								<?php the_sub_field('card_content'); ?>
							
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
					
					<?php if ( get_sub_field('card_link') ): ?>
				
						</a>
				
					<?php endif; ?>
										
				</div>
			
				<?php $x++; ?>
				
			<?php endwhile; ?>
			
		</div>
		
	</div>
	
</div>