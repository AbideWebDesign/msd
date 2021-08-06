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
						
						<div class="row justify-content-center justify-content-md-start">
							
							<div class="col-12 col-md-3 col-lg-3 col-xl-3 border-lg-right border-light mt-2 mt-md-0">
								
								<div class="pr-lg-3">
									
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
																				
									</div>
									
								</div>
								
							</div>
							
							<div class="col-12 col-md-9 col-lg-9 col-xl-9 border-light mt-4 mt-md-0">
								
								<div class="d-flex px-lg-2 flex-column flex-md-row justify-content-center">
									
									<div class="pr-md-3 mb-1 mb-md-0">
										
										<h5 class="text-primary text-uppercase font-weight-normal mb-1"><?php _e('Schools'); ?></h5>
										
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
									
									<div class="pr-md-3 mb-1 mb-md-0">
										
										<h5 class="text-primary text-uppercase font-weight-normal mb-1"><?php _e('About Us'); ?></h5>
										
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
									
									<div class="pr-md-3 mb-1 mb-md-0">
										
										<h5 class="text-primary text-uppercase font-weight-normal mb-1"><?php _e('Departments'); ?></h5>
										
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
									
									<div class="mb-1 mb-md-0">
										
										<h5 class="text-primary text-uppercase font-weight-normal mb-1"><?php _e('Parents & Students'); ?></h5>
										
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
									
								</div>
								
							</div>
														
						</div>

					</div>

				</footer>

			</div>

		</div>

	</div>

</div>

<div class="py-1 bg-primary text-white text-xs text-center text-md-left">
	
	<div class="container-fluid container-xl">
		
		<div class="row justify-content-between">
			
			<div class="col-md-auto mb-1 mb-md-0">
				
				<a href="<?php echo home_url('/privacy'); ?>"><?php _e('Privacy & Terms'); ?></a> | <a href="<?php echo home_url('/website-terms-conditions'); ?>"> <?php _e('Website Terms & Conditions'); ?></a> | <a href="<?php echo home_url('/login'); ?>"><?php _e('Login'); ?></a>
				
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

