<?php $form = get_field('form'); ?>

<?php if ( $form ): ?>

	<div class="wrapper-text py-3">
		
		<div class="container">
	
			<div class="row">
				
				<div class="col-12">
																	
					<?php echo do_shortcode('[gravityform id="' . $form . '" title="true" description="true"]'); ?>
										
				</div>
				
			</div>
	
		</div>
		
	</div>
	
<?php endif; ?>