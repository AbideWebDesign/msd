<?php $img_src = wp_get_attachment_image_src( get_field('cta_image'), 'full', false ); ?>

<?php $button = get_field('cta_button'); ?>

<section class="bg-img wrapper-lg" style="background-image: url('<?php echo $img_src[0]; ?>');">

	<div class="container">
		
		<div class="row justify-content-center">
			
			<div class="col-lg-8 col-xl-7 text-center">
				
				<div class="bg-white shadow p-1 text-xl mb-md-3 text-blue-dark"><?php the_field('cta_title'); ?></div>
				
				<a href="<?php echo $button['url']; ?>" class="btn btn-primary btn-block btn-md-inline" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
				
			</div>
			
		</div>
		
	</div>
	
</section>