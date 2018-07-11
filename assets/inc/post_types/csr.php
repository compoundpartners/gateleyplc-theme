<?php add_action('init', 'csr_register');
 function csr_register() {
	$labels = array(
		'name' => _x('CSR Articles', 'post type general name'),
		'singular_name' => _x('Corporate Social Responsibility', 'post type singular name'),
		'add_new_item' => __('Add New CSR Article'),
		'edit_item' => __('Edit CSR Article'),
		'new_item' => __('New CSR Article'),
		'view_item' => __('View CSR Article'),
		'search_items' => __('Search CSR Article'),
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
	'publicly_queriable' => true,
   'show_ui' => true,
   'show_in_nav_menus'  => false,
   'exclude_from_search' => false,
   'has_archive' => false,
   'rewrite' => array('slug' =>'corporate-social-responsibility/article', 'pages' => false),
					'menu_icon' => 'dashicons-smiley',  // Icon Path
								'menu_position' => 5,

    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'csr' , $args );
}