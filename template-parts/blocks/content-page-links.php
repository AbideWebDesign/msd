<?php $post_objects = get_field('parent_pages'); ?>

<?php $depth = get_field('page_depth'); ?>

<?php if ( $post_objects ): ?>

	<div class="wrapper-text wrapper-page-links">
		
		<div class="container">
	
			<div class="row">
				
				<div class="col-12">
											
					<?php foreach ($post_objects as $post): ?>
						
						<h2><?php echo get_the_title( $post->ID ); ?></h2>
						
						<ul class="page-links <?php echo ( $depth == 1 ? 'page-depth-1' : 'page-depth-2' ); ?>">
							
							<?php 
								
							wp_list_pages( array(
								'title_li' => '',
								'depth' => $depth,
								'child_of' => $post->ID,
								'sort_column' => 'post_title',
							));
							
							?>
							
						</ul>
					
					<?php endforeach; ?>
					
					
					
				</div>
				
			</div>
	
		</div>
		
	</div>
	
<?php endif; ?>