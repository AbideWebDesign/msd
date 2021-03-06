<?php $building = get_the_terms( $post, 'building' ); ?>

<tr id="post-<?php the_ID(); ?>">
	
	<td><?php echo ( is_array( $building ) ? ucwords( strtolower( $building[0]->name ) ) : '' ); ?></td>
	
	<td><?php echo ucwords( get_field('staff_first_name') ); ?></td>
	
	<td><?php echo ucwords( get_field('staff_last_name') ); ?></td>
	
	<td>
		
		<?php if ( get_field('staff_email_address') ): ?>
			
			
			<a href="mailto:<?php the_field('staff_email_address'); ?>"><?php the_field('staff_email_address'); ?></a>
			
		<?php endif; ?>
	
	</td>
	
	<td><?php echo ucwords( get_field('staff_position_description') ); ?></td>
					
</tr>