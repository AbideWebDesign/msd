<?php $images = get_field('gallery'); ?>

<div class="wrapper-gallery mb-3">
	
	<div class="container-lg-full container-xl">
		
		<div class="row no-gutters">
			
			<div class="col-12">
				
				<div id="carousel" class="carousel slide d-flex" data-ride="carousel">
					
					<?php if ( is_array( $images ) && count( $images ) > 1 ): ?>
						
						<ol class="carousel-indicators">
							
							<?php for ( $i = 0; $i < count( $images ); ++$i ): ?>
							
									<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php echo ( $i == 0 ? 'class = "active"' : '' ); ?>></li>
							
							<?php endfor; ?>
						
						</ol>
						
					<?php endif; ?>
					
					<div class="carousel-inner" role="listbox">
								
						<?php $x = 0; ?>
						
						<?php if ( is_array( $images ) ): ?>	
							
							<?php foreach ( $images as $image ): ?>
								
								<?php $image_size = wp_get_attachment_image_src($image, 'slide-lg', false); ?>
								
								<div class="carousel-item <?php echo ( $x == 0 ? 'active' : '' ); ?>">
									
									<?php echo ( $image_size[1] == 1318 ? '<img src="' . $image_size[0] . '" class="img-fluid w-100 d-none d-md-block" />' : wp_get_attachment_image( $image, 'slide-sm', false, array('class'=>'img-fluid w-100') ) ); ?>
									
									<?php echo wp_get_attachment_image( $image, 'card', false, array( 'class'=>'img-fluid w-100 d-md-none' ) ); ?>

									
								</div>
								
								<?php $x ++; ?>
								
							<?php endforeach; ?>
						
						<?php else: ?>
						
							<div class="carousel-item <?php echo ( $x == 0 ? 'active' : '' ); ?>">
									
								<?php echo wp_get_attachment_image( $images, 'slide-lg', false, array( 'class' => 'img-fluid w-100' ) ); ?>
									
							</div>
						
						<?php endif; ?>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>