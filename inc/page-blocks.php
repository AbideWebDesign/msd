<?php 
	

add_action('acf/init', 'msd_acf_init');

function msd_acf_init() {
	
	if ( function_exists( 'acf_register_block' ) ) {
		
		acf_register_block( array (
			'name'				=> 'hero-banner',
			'title'				=> __('Hero Banner'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'align-full-width',
			'mode'				=> 'edit',
		) );
		
		acf_register_block( array (
			'name'				=> 'quick-links',
			'title'				=> __('Quick Links'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-links',
		) );
		
		acf_register_block( array (
			'name'				=> 'news-calendar',
			'title'				=> __('News/Calendar'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'megaphone',
			'mode'				=> 'edit',
		) );
		
		acf_register_block( array (
			'name'				=> 'cta',
			'title'				=> __('Call To Action'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'plus-alt',
			'mode'				=> 'edit',
		) );		
		
		acf_register_block( array (
			'name'				=> 'cards',
			'title'				=> __('Cards'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'columns',
			'mode'				=> 'edit',
		) );	
		
		acf_register_block( array (
			'name'				=> 'call-out',
			'title'				=> __('Call Out'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'awards',
			'mode'				=> 'edit',
		) );

		acf_register_block( array (
			'name'				=> 'gallery',
			'title'				=> __('Image Gallery'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-gallery',
			'mode'				=> 'edit',
		) );	
		
		acf_register_block( array (
			'name'				=> 'gallery-small',
			'title'				=> __('Image Gallery Small'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'format-gallery',
			'mode'				=> 'edit',
		) );	

		
		acf_register_block( array (
			'name'				=> 'text',
			'title'				=> __('Text'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'welcome-write-blog',
			'mode'				=> 'edit',
		) );
		
		acf_register_block( array (
			'name'				=> 'staff',
			'title'				=> __('Staff'),
			'description'		=> __(''),
			'render_callback'	=> 'msd_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-users',
			'mode'				=> 'edit',
		) );
				
	}
}

function msd_acf_block_render_callback( $block ) {
	
	$slug = str_replace( 'acf/', '', $block['name'] );
	
	if ( file_exists( get_theme_file_path( "/template-parts/blocks/content-{$slug}.php" ) ) ) {
		
		include( get_theme_file_path( "/template-parts/blocks/content-{$slug}.php" ) );
	
	}
}

add_filter( 'allowed_block_types_all', 'msd_allowed_block_types' );
 
function msd_allowed_block_types( $allowed_blocks ) {

	return array(
		'acf/hero-banner',
		'acf/quick-links',
		'acf/news-calendar',
		'acf/cta',
		'acf/cards',
		'acf/call-out',
		'acf/gallery',
		'acf/gallery-small',
		'acf/text',
		'acf/staff',
	);
 
}

add_filter('acf/load_field/name=gallery', 'acf_load_gallery_field_choices');

function acf_load_gallery_field_choices( $field ) {

    // reset choices
    $field['choices'] = array();
    
	$galleries = get_terms( 'wpmf-category' );

	foreach ( $galleries as $gallery ) {

		$field['choices'][ $gallery->term_id ] = $gallery->name;
        
    }
    
    // return the field
    return $field;
    
}