<?php add_action('init', 'financialevents_register');
 function financialevents_register() {
	$labels = array(
		'name' => _x('Financial Events', 'post type general name'),
		'singular_name' => _x('Financial Events', 'post type singular name'),		'add_new_item' => __('Add New Financial Event'),
		'edit_item' => __('Edit Financial Event'),
		'new_item' => __('New Financial Event'),
		'view_item' => __('View Financial Event'),
		'search_items' => __('Search Financial Events'),
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

    	'supports' => array('title')
	  ); 

	register_post_type( 'financialevents' , $args );
}