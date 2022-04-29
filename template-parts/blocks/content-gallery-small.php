<?php $gallery_id = get_field('gallery'); ?>

<div class="wrapper-text mb-3">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-12">
				
				<?php if ( get_field('gallery_title') ): ?>
				
					<h2 class="text-primary mb-1"><?php the_field('gallery_title'); ?></h2>
				
				<?php endif; ?>
				
				<?php if ( get_field('gallery_text') ): ?>
				
					<div class="mb-2"><?php the_field('gallery_text'); ?></div>
				
				<?php endif; ?>
				
				<?php echo do_shortcode('[wpmf_gallery wpmf_autoinsert="1" wpmf_folder_id="' . $gallery_id . '" display="masonry" columns="3" size="medium" targetsize="large" link="file" wpmf_orderby="post__in" wpmf_order="ASC" gutterwidth="10" border_style="none" img_border_radius="0" border_width="0" border_color="transparent" img_shadow="0 0 0 0 transparent" autoplay="1" include_children="0"]'); ?>
				
			</div>
			
		</div>
		
	</div>
	
</div>