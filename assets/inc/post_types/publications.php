<?php add_action('init', 'publications_register');
 function publications_register() {
	$labels = array(
		'name' => _x('Briefings', 'post type general name'),
		'singular_name' => _x('Briefings', 'post type singular name'),		'add_new_item' => __('Add New Briefing'),
		'edit_item' => __('Edit briefing'),
		'new_item' => __('New briefing'),
		'view_item' => __('View briefing'),
		'search_items' => __('Search briefings'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'rewrite' => true,
	'publicly_queriable' => false,
   'show_ui' => true,
   'show_in_nav_menus'  => false,
   'exclude_from_search' => true,
					'menu_icon' => 'dashicons-welcome-add-page',  // Icon Path
								'menu_position' => 5,

    	'supports' => array('title', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'publications' , $args );
}