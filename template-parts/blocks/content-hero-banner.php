<?php if ( get_field('carousel_images') || is_home() || is_single() ): ?>

	<?php
	
		if ( get_field('carousel_images') ) {
			
			$slides = get_field('carousel_images');
			
			$num_slides = count( $slides );
			
		} elseif ( is_home() ) {
			
			$args = array( 'post_type' => 'post', 'posts_per_page' => '3' );

			$query = new WP_Query( $args );
			
			$num_slides = 3;

		} elseif ( is_single() ) {
			
			$num_slides = 1;
			
		}
		
	?>
	
	<section class="wrapper-hero-banner bg-light">
	
		<div class="container container-lg-full">
			
			<div class="row">
				
				<div class="col-12">
			
					<div id="carousel" class="carousel slide d-flex" data-ride="carousel">
					
						<?php if ( $num_slides > 1 ): ?>
						
							<ol class="carousel-indicators">
								
								<?php for ( $i = 0; $i < $num_slides; ++$i ): ?>
								
										<li data-target="#carousel" data-slide-to="<?php echo $i; ?>" <?php echo ( $i == 0 ? 'class="active"' : '' ); ?>></li>
								
								<?php endfor; ?>
							
							</ol>
							
						<?php endif; ?>
						
						<div class="carousel-inner" role="listbox">
								
							<?php $x = 0; ?>
							
							<?php if ( get_field('carousel_images') ): ?>
							
								<?php while ( have_rows('carousel_images') ): the_row(); ?>
										
									<div class="carousel-item <?php echo ( $x == 0 ? 'active' : '' ); ?>">
															  		
										<div class="row no-gutters h-100">
											
											<div class="col-md-4 order-2 order-md-1 bg-dark">
												
												<div class="slide-content-wrap d-flex pl-xl-4">
												
													<div class="slide-content bg-white shadow align-self-center">
														
														<div class="p-2 p-xl-3">
													
															<h1 class="text-primary mb-2"><?php the_sub_field('slide_title'); ?></h1>
														
															<?php the_sub_field('slide_content'); ?>
															
															<?php if ( get_sub_field('slide_button') ): ?>
														
																<?php $button = get_sub_field('slide_button'); ?>
																																	
																<a href="<?php echo $button['url']; ?>" class="btn btn-primary btn-lg btn-block" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
																															
															<?php endif; ?>	
															
														</div>														
															
													</div>
																	  							  	
												</div>
												
											</div>
											
											<div class="col-md-8 order-1 order-md-2 align-self-xl-center">
												
												<?php $img_src = wp_get_attachment_image_src( get_sub_field('slide_image'), 'slide', false ); ?>
												
												<div class="d-xl-none h-100 w-100 slide-image" style="background-image: url('<?php echo $img_src[0]; ?>');"></div>
												
												<?php echo wp_get_attachment_image( get_sub_field('slide_image'), 'slide', false, array( 'alt' => get_the_title( get_sub_field('slide_image') ), 'class'=>'w-100 img-fluid d-none d-xl-block' ) ); ?>
												
											</div>
										
										</div>
									
										<?php $x ++; ?>
										
									</div>
									
								<?php endwhile; ?>
								
							<?php elseif ( is_home() ): // News Page ?>
							
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								
									<?php $colors = array( 'blue-dark', 'green', 'orange' ); ?>
										
									<div class="carousel-item <?php echo ( $x == 0 ? 'active' : '' ); ?>">

										<div class="row no-gutters h-100">
											
											<div class="col-md-4 order-2 order-md-1 bg-<?php echo $colors[$x]; ?>">
												
												<div class="slide-content-wrap d-flex pl-xl-4">
												
													<div class="slide-content bg-white shadow align-self-center">
														
														<div class="p-2 p-xl-3">
													
															<h1 class="text-<?php echo $colors[$x]; ?> mb-2"><?php the_title(); ?></h1>
														
															<?php the_excerpt(); ?>
															
															<a href="<?php the_permalink(); ?>" class="btn btn-<?php echo $colors[$x]; ?> btn-lg btn-block"><?php _e('View Post'); ?></a>
													
														</div>
																
													</div>
																	  							  	
												</div>
												
											</div>
											
											<div class="col-md-8 order-1 order-md-2 align-self-xl-center">
												
												<?php $img_src = get_the_post_thumbnail_url( $post->ID, 'slide' ); ?>
												
												<div class="d-xl-none h-100 w-100 slide-image" style="background-image: url('<?php echo $img_src; ?>');"></div>
												
												<?php echo get_the_post_thumbnail( get_sub_field('slide_image'), 'slide', array( 'alt'=> get_the_title( get_sub_field('slide_image') ), 'class'=>'w-100 img-fluid d-none d-xl-block' ) ); ?>
												
											</div>
										
										</div>
									
										<?php $x ++; ?>
										
									</div>
									
								<?php endwhile; ?>
								
								<?php wp_reset_query(); ?>	
								
							<?php elseif ( is_single() && get_post_type( get_the_ID() ) != 'staff' ): ?>
							
								<div class="carousel-item active">
															  		
									<div class="row no-gutters h-100">
										
										<div class="col-md-4 order-2 order-md-1 bg-dark">
											
											<div class="slide-content-wrap d-flex pl-xl-4">
												
												<div class="slide-content slide-content-sm bg-white shadow align-self-center">
													
													<div class="p-2 p-xl-3">
												
														<h1 class="text-secondary mb-2"><?php the_title(); ?></h1>
														
														<div class="text-sm mb-1"><strong><?php echo ( get_field('legacy_post_date') ? get_field('legacy_post_date') :  'Posted on ' . get_the_date() ); ?></strong></div>
														
														<div class="d-flex text-lg">
															
															<div class="mr-1"><a class="text-primary" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook"></i></a></div>
															
															<div class="mr-1"><a class="text-primary" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo strip_tags( get_the_excerpt() ); ?>"><i class="fab fa-twitter"></i></a></div>

														</div>

													</div>
															
												</div>
																  							  	
											</div>
											
										</div>
										
										<div class="col-md-8 order-1 order-md-2 align-self-xl-center">
											
											<?php $img_src = get_the_post_thumbnail_url( $post->ID, 'slide' ); ?>
											
											<div class="d-xl-none h-100 w-100 slide-image" style="background-image: url('<?php echo $img_src; ?>');"></div>
											
											<?php echo get_the_post_thumbnail( get_sub_field('slide_image'), 'slide', array('alt'=> get_the_title(get_sub_field('slide_image')), 'class'=>'w-100 img-fluid d-none d-xl-block') ); ?>
											
										</div>
									
									</div>
								
									<?php $x ++; ?>
									
								</div>	
								
							<?php elseif ( 'staff' == get_post_type() ): ?>
							
								<?php $building = get_the_terms( $post, 'building' ); ?>
								
								<div class="carousel-item active">
															  		
									<div class="row no-gutters h-100">
										
										<div class="col-md-4 order-2 order-md-1 bg-dark">
											
											<div class="slide-content-wrap d-flex pl-xl-4">
												
												<div class="slide-content slide-content-sm bg-white shadow align-self-center">
													
													<div class="p-2 p-xl-3">
												
														<h1 class="text-secondary mb-1"><?php the_title(); ?></h1>
														
														<div class="text-sm mb-1"><?php the_field('staff_position_description'); ?></div>
														
														<?php if ( get_field('staff_secondary_description') ): ?>
														
															<div class="text-sm mb-1"><?php the_field('staff_secondary_description'); ?></div>
														
														<?php endif; ?>
														
														<?php if ( get_field('staff_work_phone') ): ?>
								
															<div class="text-sm"><i class="fa fa-phone-square-alt mr-1"></i> <?php the_field('staff_work_phone'); ?></div>
														
														<?php endif; ?>
														
														<?php if ( get_field('staff_email_address') ): ?>
									
															<div class="text-sm"><a href="mailto:<?php the_field('staff_email_address'); ?>" class="text-decoration-none text-body"><i class="fa fa-envelope mr-1"></i> <?php the_field('staff_email_address'); ?></a></div>
														
														<?php endif; ?>
														
														<?php if ( $building ): ?>
														
															<div class="text-sm mb-1"><i class="fa fa-school mr-1"></i><?php echo ucwords( strtolower( $building[0]->name ) ); ?></div>
															
														<?php endif; ?>
														
													</div>
															
												</div>
																  							  	
											</div>
											
										</div>
										
										<div class="col-md-8 order-1 order-md-2 align-self-xl-center">
											
											<?php if ( get_field('staff_image') ): ?>

												<?php $img_src = wp_get_attachment_image_src( get_field('staff_image'), 'slide', false ); ?>

												<?php if ( $img_src[1] < 900 ): ?>
													
													<?php $to_small = true; ?>
																								
													<?php $img_src = wp_get_attachment_image_src( get_school_image_id(), 'slide', false ); ?>
																										
												<?php endif; ?>
												
											<?php else: ?>
											
												<?php $img_src = wp_get_attachment_image_src( get_school_image_id(), 'slide', false ); ?>
												
											<?php endif; ?>
											
											<div class="d-xl-none h-100 w-100 slide-image" style="background-image: url('<?php echo $img_src[0]; ?>');"></div>
											
											<?php if ( get_field('staff_image') ): ?>

												<?php if ( ! $to_small ): ?>
												
													<?php echo wp_get_attachment_image( get_field('staff_image'), 'slide', false, array('alt'=> get_the_title( get_field('staff_image') ), 'class'=>'w-100 img-fluid d-none d-xl-block') ); ?>
										
												<?php else: ?>
												
													<?php echo wp_get_attachment_image( get_school_image_id(), 'slide', false, array('alt'=> get_the_title( get_field('staff_image') ), 'class'=>'w-100 img-fluid d-none d-xl-block') ); ?>
												
												<?php endif; ?>
												
											<?php else: ?>
											
												<?php echo wp_get_attachment_image( get_school_image_id(), 'slide', false, array('alt'=> get_the_title( get_field('staff_image') ), 'class'=>'w-100 img-fluid d-none d-xl-block') ); ?>
											
											<?php endif; ?>
											
										</div>
									
									</div>
								
									<?php $x ++; ?>
									
								</div>																
							
							<?php endif; ?>
								
						</div>
												
					</div>
											
				</div>
				
			</div>
			
		</div>
	
	</section>
	
<?php endif; ?>