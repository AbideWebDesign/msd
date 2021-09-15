<?php
/**
 * @package msd
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>

<?php get_template_part('template-parts/blocks/content','alert'); ?>

<div id="header-top" class="bg-blue-dark">
	
	<div class="container-fluid container-xl">
		
		<div class="row justify-content-center justify-content-md-between">
			
			<div class="col-auto d-none d-md-block align-self-center">
				
				<div class="d-flex">
					
					<div id="staff-icon" class="mr-2 pr-2 border-right border-light align-self-center">
						
						<a href="<?php echo home_url('/staff-resources'); ?>" class="text-sm"><i class="fa fa-user"></i> <?php _e('Staff'); ?></a>
						
					</div>
					
					<div class="align-self-center">
						
						<?php ubermenu( 'school-menu', array( 'menu' => 23 ) ); ?>
						
					</div>
					
				</div>
				
			</div>
			
			<div class="col-auto align-self-center">
				
				<a href="<?php the_field('covid_19_page', 'options'); ?>" class="text-sm"><i class="fa fa-user-shield text-xs"></i> <?php _e('COVID-19'); ?></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div id="search-bar" class="search">

	<div class="search-bar-inner">

		<div class="container-fluid container-xl">

			<div class="row">

				<div class="col-12">

					<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

						 <label class="sr-only" for="search-text"><?php _e('Search...'); ?></label>

						 <input type="text" class="search-field" id="search-text" placeholder="<?php _e('Search...'); ?>" value="<?php echo get_search_query(); ?>" name="s">

						 <button type="submit" id="ss-icon"><i class="fa fa-search"></i></button>

					</form>

				</div>

			</div>

		</div>

	</div>

</div>

<div class="site">
		
	<div id="header-global">

		<div class="container-fluid container-xl">

			<div class="row justify-content-center justify-content-sm-between">

				<div class="col-auto col-lg-5">

					<div id="logo" class="clearfix">

						<a href="<?php echo get_home_url(); ?>"><img class="img-fluid" src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" /></a>

					</div>

				</div>

				<div class="col-lg-auto align-self-center d-none d-lg-block">

					<div id="nav-top-links" class="d-flex">

						<div id="nav-top" class="d-flex">
							
							<?php ubermenu( 'top-menu' , array( 'menu' => 8 ) ); ?>
							
						</div>

						<div id="nav-top-search-container" class="align-self-center">

							<a href="#" id="search-toggle" class="text-sm"><i class="fas fa-search"></i></a>

						</div>

					</div>

				</div>
				
				<div class="col-md-auto align-self-center d-lg-none mt-2 mt-md-0">
					
					<div id="mobile-nav" class="d-lg-none">
					
						<a class="shiftnav-toggle shiftnav-toggle-button d-flex m-auto justify-content-center text-white bg-primary" data-shiftnav-target="shiftnav-main">
										
							<div class="align-self-center">
								
								<i class="fa fa-bars text-white"></i> 
								
							</div>
							
							<div class="ml-1 align-self-center font-weight-bold"><?php _e('Explore'); ?></div>
							
						</a>	
						
					</div>		

					
				</div>

			</div>

		</div>

	</div>
		
	<div id="menu-global" class="d-none d-lg-block" role="navigation">

		<div class="container container-lg-full">

			<div role="navigation">

				<div id="primary-nav" tabindex="0">
					
					<div id="desktop-nav">
						
						<?php ubermenu( 'primary-menu' , array( 'menu' => 9 ) ); ?>		
						
					</div>
					
				</div>

			</div>

		</div>

	</div>