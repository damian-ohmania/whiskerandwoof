<?php
//OPTIONS - create separate pages for each section of a web page
add_action('init', function(){
    
	//Theme Options Page
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));
		
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));
        
        acf_add_options_sub_page(array(
			'page_title' 	=> 'News Settings',
			'menu_title'	=> 'News',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_page(array(
			'page_title' 	=> 'Global Blocks',
			'menu_title'	=> 'Global Blocks',
			'menu_slug' 	=> 'global-blocks',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}
});