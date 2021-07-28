<article <?php post_class('mb-2 pb-2 border-bottom'); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		
		<div class="col-xl-3">
			
			<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_id(), 'medium', array('alt'=> esc_html( get_the_title() ), 'class' => 'img-fluid w-100') ); ?></a>
		
		</div>
		
		<div class="col-xl-9">
			
			<header class="post-header">
		
				<a class="stretched-link text-body" href="<?php the_permalink(); ?>"><h2 class="text-dark"><?php the_title(); ?></h2></a>
				
			</header><!-- .entry-header -->
		
			<div class="post-content">
		
				<?php the_excerpt(); ?>
		
			</div><!-- .entry-content -->
			
		</div>
		
	</div>

</article><!-- #post-## -->