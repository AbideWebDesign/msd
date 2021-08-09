<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$tax = $wp_query->get_queried_object();

?>
<div class="bg-orange py-3">

	<div class="container">

		<div class="row">

			<div class="col-12">
				
				<div class="text-sm font-weight-bold"><?php _e('Buidling Directory'); ?></div>
				
				<h1 class="text-lg mb-0"><?php echo $tax->name; ?></h1>

			</div>

		</div>

	</div>

</div>

<div id="archive-wrapper" class="mt-1 mb-3">

	<div class="container" tabindex="-1">

		<?php if ( have_posts() ) : ?>

		<?php $buildings = get_terms( array( 'taxonomy' => 'building', 'hide_empty' => true ) ); ?>
														
			<div class="bg-light p-1 mb-1 text-uppercase font-weight-bold border rounded">
				
				<div class="text-dark text-sm mb-1"><?php _e('Select Building'); ?></div>
													
				<select name="building-select" id="building-select" class="custom-select custom-select-cats">
		
					<option><?php _e('Select a Building'); ?></option>
					
					<option value="<?php echo home_url('staff'); ?>"><?php _e('All Staff'); ?></option>
					
					<?php foreach ( $buildings as $cat ): ?>
					
						<option value="<?php echo get_term_link( $cat );  ?>"><?php echo ucwords( strtolower ( $cat->name ) ); ?></option>
				
					<?php endforeach; ?>
					
				</select>
				
			</div>

			<div class="table-responsive">
				
				<table class="table table-borderd table-striped table-sm">
					
					<tr>
						
						<th><?php _e('Building Name'); ?></th><th><?php _e('First Name'); ?></th><th><?php _e('Last Name'); ?></th><th><?php _e('Email Address'); ?></th><th><?php _e('Position Description'); ?></th><th><?php _e('Phone Number'); ?></th>
						
					</tr>		
				
					<?php while ( have_posts() ) : the_post(); ?>
											
							<?php get_template_part( 'loop-templates/content', 'staff-archive' ); ?>
		
					<?php endwhile; ?>
				
				</table>
				
			</div>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		<?php msd_pagination(); ?>

	</div>

</div>

<?php get_footer();
