<?php $post_objects = get_field('parent_pages'); ?>

<?php $depth = get_field('page_depth'); ?>

<?php if ( $post_objects ): ?>

	<div class="wrapper-text wrapper-page-links">
		
		<div class="container">
	
			<div class="row">
				
				<div class="col-12">
											
					<?php foreach ( $post_objects as $post ): ?>
						
						<?php if ( ! get_field('hide_title') ): ?>
						
							<h2><?php echo get_field('title') ? get_field('title') : get_the_title( $post->ID ); ?></h2>
							
						<?php endif; ?>
						
						<ul class="page-links <?php echo ( $depth == 1 ? 'page-depth-1' : 'page-depth-2' ); ?>">
							
							<?php 
								
							wp_list_pages( array(
								'title_li' => '',
								'depth' => $depth,
								'child_of' => $post->ID,
								'sort_column' => 'menu_order',
							) );
							
							?>
							
						</ul>
					
					<?php endforeach; ?>
										
				</div>
				
			</div>
	
		</div>
		
	</div>
	
<?php endif; ?>