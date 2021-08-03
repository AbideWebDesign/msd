<?php if ( get_field('gallery_type') == 'content-single' ): ?>
	
	<?php $images = get_field('gallery_inline_text'); ?>
	
<?php else: ?>

	<?php $images = get_field('gallery'); ?>
	
<?php endif; ?>

<div class="wrapper-gallery <?php echo ( get_field('gallery_type') == 'content-single' ? 'pb-3' : ''); ?>">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-12">
				
				<div id="carousel" class="carousel slide d-flex" data-ride="carousel">
					
					<?php if ( count( $images ) > 1 ): ?>
						
						<ol class="carousel-indicators">
							
							<?php for ( $i = 0; $i < count( $images ); ++$i ): ?>
							
									<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php echo ( $i == 0 ? 'class = "active"' : '' ); ?>></li>
							
							<?php endfor; ?>
						
						</ol>
						
					<?php endif; ?>
					
					<div class="carousel-inner" role="listbox">
								
						<?php $x = 0; ?>
							
						<?php foreach ( $images as $image ): ?>
								
							<div class="carousel-item <?php echo ( $x == 0 ? 'active' : '' ); ?>">
								
								<?php echo wp_get_attachment_image( $image, 'slide-lg', false, array( 'class' => 'img-fluid w-100' ) ); ?>
								
							</div>
							
							<?php $x ++; ?>
							
						<?php endforeach; ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>