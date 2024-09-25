<?php
	
global $post;

// Initialize variables for child and parent pages
$exclude = implode( ', ', get_field( 'excluded_pages', 'options' ) );
$parent_id = $post->post_parent ? $post->post_parent : $post->ID;
$child_pages_array = [];

// Check if the current page has children for both 'page' and 'np-redirect' post types
if ( $post->post_parent ) {
    $child_query = new WP_Query( array(
        'post_type' => array( 'page', 'np-redirect' ),
        'post_parent' => $post->ID,
        'exclude' => $exclude,
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ) );

    $child_pages_array = $child_query->posts;
}

// Get top-level children of both 'page' and 'np-redirect' types, ordered by menu order
$top_level_query = new WP_Query( array(
    'post_type' => array( 'page', 'np-redirect' ),
    'post_parent' => $parent_id,
    'exclude' => $exclude,
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
) );

$top_level_children = $top_level_query->posts;

// Output the sidebar menu structure
if ( ! empty( $top_level_children ) ): ?>

	<div class="wrapper-sidebar-links bg-light navbar-expand-lg">
		
		<div class="bg-blue-dark text-white p-2">
			
			<div class="d-flex justify-content-between">
				
				<div>
					
					<?php if ( ! is_admin() ): ?>
					
						<a href="<?php the_permalink( $parent_id ); ?>"><div class="font-weight-bold text-lg"><?php echo get_the_title( $parent_id ); ?></div></a>
						
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
				
			        <?php foreach ( $top_level_children as $child ): ?>
			            <li<?php echo $child->ID == $post->ID && ! empty( $child_pages_array ) ? ' class="current_page_item"' : ''; ?>>
			                <a href="<?php echo ( get_post_type( $child->ID ) == 'np-redirect' ) ? get_post_field( 'post_content', $child->ID ) : get_the_permalink( $child->ID ); ?>" <?php echo ( get_post_type( $child->ID ) == 'np-redirect' ) ? 'target="_blank"' : ''; ?>>
			                    <?php echo get_the_title( $child->ID ); ?>
			                </a>
			
			                <?php
			                // Check if the current child page is the one being viewed and if it has children
			                if ( $child->ID == $post->ID && ! empty( $child_pages_array ) ): ?>
			                    <ul class="children">
			                        <?php foreach ( $child_pages_array as $sub_child ): ?>
			                            <li>
			                                <a href="<?php echo ( get_post_type( $sub_child->ID ) == 'np-redirect' ) ? get_post_field( 'post_content', $sub_child->ID ) : get_the_permalink( $sub_child->ID ); ?>" <?php echo ( get_post_type( $sub_child->ID ) == 'np-redirect' ) ? 'target="_blank"' : ''; ?>>
			                                    <?php echo get_the_title( $sub_child->ID ); ?>
			                                </a>
			                            </li>
			                        <?php endforeach; ?>
			                    </ul>
			                <?php endif; ?>
			            </li>
			        <?php endforeach; ?>
			        
			    <?php else: ?>
			    
			    	<li><?php _e('Links will go here'); ?></li> 
			    
			    <?php endif; ?>
			    
    		</ul>
    		
		</div>
		
	</div>
	
<?php endif; ?>