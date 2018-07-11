<?php 
add_action('init', 'careers_register');
 function careers_register() {
	$labels = array(
		'name' => _x('Careers', 'post type general name'),
		'singular_name' => _x('Our Careers', 'post type singular name'),
		'add_new_item' => __('Add Career Vacancy'),
		'edit_item' => __('Edit Career Vacancy'),
		'new_item' => __('New Career Vacancy'),
		'view_item' => __('View Career Vacancy'),
		'search_items' => __('Search Careers'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
    	'show_ui' => true,
    	'capability_type' => 'post',
	'publicly_queriable' => false,
    'public' => true,
'has_archive' => false,   'show_in_nav_menus'  => true,
   'exclude_from_search' => true,
'menu_icon' => 'dashicons-id',  // Icon Path
	'menu_position' => 5,
'rewrite' => array('pages' => false, 'slug' => 'careers/vacancies'),
    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'careers' , $args );
}
