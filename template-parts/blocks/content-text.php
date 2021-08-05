<?php $includes = get_field('text_settings'); ?>

<div class="wrapper-text <?php echo ( in_array('lead', $includes) && ! get_field('text_content') ? '' : 'pb-3'); ?>">
	
	<div class="container">
		
		<?php if ( in_array( 'lead', $includes ) ): ?>
		
			<div class="row">
				
				<div class="col-12">
			
					<?php if ( in_array( 'heading', $includes ) && get_field('text_heading') ): ?>
					
						<h1 class="text-blue-dark mb-2"><?php the_field('text_heading'); ?></h1> 
						
					<?php endif; ?>
				
		<?php elseif ( in_array( 'image', $includes ) ): ?>

			<?php $type_lg = ( get_field('text_image_style') == 'Full' ? 'card-full' : 'card-alt' ); ?>
			
			<?php $type = ( get_field('text_image_style') == 'Full' ? 'card-full' : 'slide-lg' ); ?>		
				
			<div class="row">
				
				<div class="col-lg-4">
					
					<?php echo wp_get_attachment_image( get_field('text_image'), $type_lg, false, array('class'=>'img-fluid w-100 d-none d-lg-block') ); ?>
					
					<?php echo wp_get_attachment_image( get_field('text_image'), $type, false, array('class'=>'img-fluid w-100 d-lg-none mb-2') ); ?>
	
				</div>
				
				<div class="col-lg-8">
		
		<?php else: ?>
		
			<div class="row">
				
				<div class="col-12">
					
		<?php endif; ?>
		
		<?php if ( in_array( 'heading', $includes ) && get_field('text_heading') && ! in_array( 'lead', $includes ) ): ?>
			
			<h2 class="text-primary mb-2"><?php the_field('text_heading'); ?></h2>
					
		<?php endif; ?>
		
		<?php if ( in_array( 'content', $includes ) && get_field('text_content') ): ?>
		
			<?php the_field('text_content'); ?>
		
		<?php endif; ?>
				
		<?php if ( in_array( 'list', $includes ) ): ?>
							
			<ul class="fa-ul mb-0">
				
				<?php while ( have_rows( 'text_list' ) ): the_row(); ?>
				
					<li>
						
						<span class="fa-li"><i class="fas fa-chevron-right text-primary"></i></span> 
							
						<?php if ( get_sub_field('item_type') == 'Full' && get_sub_field('item_title') ): ?>
						
							<p class="mb-0"><strong><?php the_sub_field('item_title'); ?></strong></p>
						
						<?php endif; ?>
							
						<?php if ( get_sub_field('item_text') ): ?>
						
							<?php the_sub_field('item_text'); ?>
							
						<?php endif; ?>
							
						<?php if ( get_sub_field('item_type') == 'Full' && get_sub_field('item_link') ): ?>
						
							<?php $link = get_sub_field('item_link'); ?>
							
							<p class="mt-1 mb-2"><a class="btn btn-primary btn-sm" title="Click to visit <?php echo $link['url']; ?>"  href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> <i class="fas fa-chevron-right text-xs"></i></a></p>
						
						<?php endif; ?>
						
					</li>
				
				<?php endwhile; ?>
				
			</ul>
		
		<?php endif; ?>
		
		<?php if ( have_rows( 'text_buttons' ) ): ?>
		
			<?php $x = 0; ?>
		
			<div class="wrapper-buttons d-flex flex-column flex-md-row">
				
				<?php while ( have_rows('text_buttons') ): the_row(); ?>
					
					<?php $link = get_sub_field('button'); ?>
					
					<a class="btn <?php echo ( $x == 0 ? 'btn-primary' : 'btn-secondary' ); ?> mr-2" href="<?php echo $link['url']; ?>" title="Click to visit <?php echo $link['title']; ?>" target="<?php echo $link['target']; ?>"><?php echo ( get_sub_field('button_type') == 'download' ? '<i class="fa fa-file-download text-sm mr-1"></i>' : ''); ?><?php echo $link['title']; ?><?php echo ( get_sub_field('button_type') == 'external' ? '<i class="fa fa-external-link-alt text-sm ml-1"></i>' : ''); ?></a>
				
					<?php $x ++; ?>
					
				<?php endwhile; ?>
				
			</div>
		
		<?php endif; ?>

					
			</div>
			
		</div>
		
	</div>
				
</div>

<?php if ( in_array('border', $includes) ): ?>

	<div class="wrapper-border-bottom mb-3">
		
		<div class="container">
			
			<div class="row">
				
				<div class="col-12">
					
					<div class="border-bottom"></div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
<?php endif; ?>