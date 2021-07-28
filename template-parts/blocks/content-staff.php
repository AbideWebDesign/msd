<?php $staff = get_field('staff'); ?>

<?php if ( $staff ): ?>
	
	<div class="mb-2 pb-1 <?php echo ( get_field('staff_include_border') ? 'border-top pt-3' : '' ); ?>">
		
		<div class="row">
			
			<div class="col-12">
				
				<h2 class="text-dark"><?php the_field('staff_title'); ?></h2>
				
			</div>
			
		</div>
		
		<div class="row">
		
			<?php foreach ( $staff as $s ): ?>
			
				<div class="<?php echo ( count( $staff ) < 2 ? 'col-lg-6 mb-1' : 'col-md-6 col-lg-4 mb-1'); ?> align-self-stretch">
					
					<div class="border rounded px-2 py-1 h-100">
						
						<div class="row">
	
							<div class="col-12">
								
								<div class="text-dark font-weight-bold"><?php echo get_the_title($s); ?></div>
	
								<div class="text-sm"><?php the_field('staff_position_description', $s); ?></div>
								
								<?php if ( get_field('staff_work_phone', $s) ): ?>
								
									<div class="text-sm"><i class="fa fa-phone-square-alt mr-1"></i> <?php the_field('staff_work_phone', $s); ?></div>
								
								<?php endif; ?>
								
								<?php if ( get_field('staff_email_address', $s) ): ?>
									
									<div class="text-sm"><a href="mailto:<?php the_field('staff_email_address', $s); ?>" class="text-decoration-none text-body"><i class="fa fa-envelope mr-1"></i> <?php the_field('staff_email_address', $s); ?></a></div>
								
								<?php endif; ?>
								
								<?php if ( get_field('staff_bio', $s) ): ?>
								
									<div class="mt-1"><a href="<?php get_the_permalink($s); ?>" class="btn btn-secondary btn-sm"><?php _e('View Bio'); ?></a></div>
								
								<?php endif; ?>
								
							</div>
							
						</div>
										
					</div>
					
				</div>
			
			<?php endforeach; ?>
							
		</div>
		
	</div>
	
<?php endif; ?>