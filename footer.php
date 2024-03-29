<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div id="wrapper-footer" class="wrapper-sm bg-dark">

	<div class="container-fluid container-xl">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						
						<div class="row justify-content-center justify-content-lg-start">
							
							<div class="col-auto border-lg-right border-light mt-2 mt-md-0 mr-lg-2 mr-xl-3 order-2 order-lg-1 text-center text-lg-left">
								
								<div class="pr-lg-2 pr-xl-3">
									
									<div class="text-center text-md-left mb-3 mb-md-0">
										
										<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image( get_field('logo_white', 'options'), 'Full', false, array('class'=>'img-fluid footer-logo') ); ?></a>

									</div>
									
									<div class="text-lg-sm text-white mt-2">
										
										<div class="mb-2">
											
											<?php the_field('district_office_address_street', 'options'); ?><br />
										
											<?php the_field('district_office_city', 'options' ); ?>, <?php _e('OR'); ?> <?php the_field('district_office_zip', 'options' ); ?>
										
										</div>
										
										<strong><?php _e('Email:'); ?></strong> <a class="text-white" href="mailto:<?php the_field('district_office_email', 'options'); ?>"><?php the_field('district_office_email', 'options'); ?></a><br>
										
										<strong><?php _e('Phone:'); ?></strong> <a class="text-white" href="tel: <?php the_field('district_office_phone', 'options'); ?>"><?php the_field('district_office_phone', 'options'); ?></a><br>
										
										<strong><?php _e('Fax:'); ?></strong> <a class="text-white" href="tel: <?php the_field('district_office_fax', 'options'); ?>"><?php the_field('district_office_fax', 'options'); ?></a><br>
									
										<div class="mt-2">
											
											<?php the_field('district_disclaimer', 'options'); ?>
											
										</div>
										
										<div class="mt-2">
											
											<div class="d-flex justify-content-center justify-content-md-start text-xl">
												
												<div class="mr-1"><a class="text-white" href="https://www.facebook.com/McMinnvilleSchoolDistrict" target="_blank"><i class="fab fa-facebook"></i></a></div>
											
												<div class="mr-1"><a class="text-white" href="https://www.instagram.com/mcminschools/" target="_blank"><i class="fab fa-instagram-square"></i></a></div>
												
												<div><a class="text-white" href="https://twitter.com/McMSchools" target="_blank"><i class="fab fa-twitter-square"></i></a></div>
												
											</div>
											
										</div>
																				
									</div>
									
								</div>
								
							</div>
							
							<div class="col-12 col-lg-8 col-xl-9 border-light mb-4 mb-lg-0 order-1 order-lg-2">
								
								<div class="row justify-content-center">
									
									<div class="col-md-6 col-xl-3 mb-2 mb-xl-0">
										
										<h5 class="text-white text-uppercase font-weight-bold mb-1"><?php _e('Schools'); ?></h5>
										
										<div class="text-lg-sm text-white">
											
											<?php 
											
												$menuParameters = array (
													'theme_location' 	=> 'footer-menu-1',					
													'echo'            	=> true,
													'menu_id'			=> 'footer-menu-1',
													'menu_class'      	=> 'footer-menu',
													'depth'           	=> 0,
												);
												
												wp_nav_menu( $menuParameters );	
																					
											?>
											
										</div>
										
									</div>
									
									<div class="col-md-6 col-xl-3 mb-2 mb-xl-0">
										
										<h5 class="text-white text-uppercase font-weight-bold mb-1"><?php _e('About Us'); ?></h5>
										
										<div class="text-lg-sm text-white">
											
											<?php 
											
												$menuParameters = array (
													'theme_location' 	=> 'footer-menu-2',					
													'echo'            	=> true,
													'menu_id'			=> 'footer-menu-2',
													'menu_class'      	=> 'footer-menu',
													'depth'           	=> 0,
												);
												
												wp_nav_menu( $menuParameters );	
																					
											?>
											
										</div>
										
									</div>
									
									<div class="col-md-6 col-xl-3 mb-2 mb-md-0">
										
										<h5 class="text-white text-uppercase font-weight-bold mb-1"><?php _e('Departments'); ?></h5>
										
										<div class="text-lg-sm text-white">
											
											<?php 
											
												$menuParameters = array (
													'theme_location' 	=> 'footer-menu-3',					
													'echo'            	=> true,
													'menu_id'			=> 'footer-menu-3',
													'menu_class'      	=> 'footer-menu',
													'depth'           	=> 0,
												);
												
												wp_nav_menu( $menuParameters );	
																					
											?>
											
										</div>
										
									</div>		
									
									<div class="col-md-6 col-xl-3">
										
										<h5 class="text-white text-uppercase font-weight-bold mb-1"><?php _e('Parents & Students'); ?></h5>
										
										<div class="text-lg-sm text-white">
											
											<?php 
											
												$menuParameters = array (
													'theme_location' 	=> 'footer-menu-4',					
													'echo'            	=> true,
													'menu_id'			=> 'footer-menu-4',
													'menu_class'      	=> 'footer-menu',
													'depth'           	=> 0,
												);
												
												wp_nav_menu( $menuParameters );	
																					
											?>
											
										</div>
										
									</div>		
									
									<div class="col-12 mt-3">
										
										<div class="text-white text-lg font-weight-bold text-center">McMinnville School District will honor, empower, and prepare each individual to thrive and contribute.</div>
										
									</div>							
									
								</div>
																
							</div>
														
						</div>

					</div>

				</footer>

			</div>

		</div>

	</div>

</div>

<div class="bg-primary py-1 text-white text-xs text-center text-md-left">
	
	<div class="container-fluid container-xl">
		
		<div class="row justify-content-between">
			
			<div class="col-md-auto mb-1 mb-md-0">
				
				<a href="<?php echo home_url('/web-accessibility'); ?>" class="text-white"><?php _e('Web Accessibility'); ?></a> | <a href="<?php echo home_url('/wp-login.php'); ?>" class="text-white"> <?php _e('Website Login'); ?></a>
				
			</div>
			
			<div class="col-md-auto mb-1 mb-md-0">
				
				<?php _e('Copyright © ' . date('Y') . ' McMinnville School District. All rights reserved.'); ?>
				
			</div>
			
			<div class="col-md-auto">
				
				<a href="https://abidewebdesign.com" target="_blank"><?php _e('Website Design and Maintenance by Abide Web Design'); ?></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

<div id="google_translate_element" class="d-none"></div>

<script type="text/javascript">

	function googleTranslateElementInit() {
	  	
	  	new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
	
	}

</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>

