<?php $img_src = wp_get_attachment_image_src( get_field('cta_image'), 'full', false ); ?>

<?php $button = get_field('cta_button'); ?>

<?php if ( $img_src ): ?>

	<section class="bg-img wrapper-lg" style="background-image: url('<?php echo $img_src[0]; ?>');">
	
		<div class="container">
			
			<div class="row justify-content-center">
				
				<div class="col-lg-8 col-xl-7 text-center">
					
					<?php if ( get_field('cta_title') ): ?>
					
						<div class="bg-white shadow p-1 text-xl mb-md-3 text-blue-dark"><?php the_field('cta_title'); ?></div>
						
					<?php endif; ?>
					
					<?php if ( $button ): ?>
					
						<a href="<?php echo $button['url']; ?>" class="btn btn-primary btn-block btn-md-inline" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						
					<?php endif; ?>
					
				</div>
				
			</div>
			
		</div>
		
	</section>
	
<?php endif; ?>