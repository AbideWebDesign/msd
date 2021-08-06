<?php

global $post;

if ( $post->post_parent ) {

	$parents = get_post_ancestors( $post->ID );

  	if ( empty( $parents ) || count( $parents ) == 1 ) {
	  	
  		$root_page_id = $post->post_parent;

  		$titlenamer = get_the_title( $post->ID );
  		
  	} else {
	  	
  		$x = $post->ancestors;

  		end( $x );

  		$root_page_id = prev( $x );

  		$titlenamer = get_the_title( $root_page_id );
  		
  	}
  		
	$walker = new Razorback_Walker_Page_Selective_Children();
	
	$children = wp_list_pages( array (
	    'title_li' => '',
	    'child_of' => $root_page_id,
	    'walker' => $walker,
	    'echo'	=> 0,
	    'depth' => 1
	) );

} else {
	
	$children = wp_list_pages( array (
		'title_li' => '',
		'depth' => 1,
		'child_of' => $post->ID,
		'echo' => 0,
	) );
	
	$root_page_id = $post->ID;
	
	$titlenamer = get_the_title( $post->ID );

}

?>

<?php if ( $children ): ?>
								
	<div class="wrapper-sidebar-links bg-light navbar-expand-lg">
		
		<div class="bg-blue-dark text-white p-2">
			
			<div class="d-flex justify-content-between">
				
				<div>
					
					<?php if ( ! is_admin() ): ?>
					
						<a href="<?php the_permalink( $root_page_id ); ?>"><div class="font-weight-bold text-lg"><?php echo get_the_title( $root_page_id ); ?></div></a>
						
					<?php else: ?>
					
						<?php _e('Parent Name Will Go Here'); ?>
						
					<?php endif; ?>
					
				</div>
				
				<div class="d-lg-none">
					
					<button type="button" class="navbar-toggle btn-plain text-white" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
			
						<span class="sr-only">Toggle navigation</span>
				
						<i class="fa fa-1x fa-chevron-down"></i>
								
					</button>
					
				</div>
				
			</div>
			
		</div>
		
		<div class="navbar-collapse collapse sidebar-navbar-collapse">
			
			<ul class="nav navbar-nav list-unstyled text-sm mb-0">
				
				<?php if ( ! is_admin() ): ?>
				
					<?php echo $children; ?>
					
				<?php else: ?>
				
					<?php _e('Links will go here'); ?>
					
				<?php endif; ?>
				
			</ul>
			
		</div>
		
	</div>
					
<?php endif; ?>