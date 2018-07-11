<?php add_action('init', 'services_register');
 function services_register() {
	$labels = array(
		'name' => _x('Services', 'post type general name'),
		'singular_name' => _x('Services', 'post type singular name'),
		'add_new_item' => __('Add New Service'),
		'edit_item' => __('Edit Service'),
		'new_item' => __('New Service'),
		'view_item' => __('View Service'),
		'search_items' => __('Search Services'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => true,
    	'rewrite' => true,
	'publicly_queriable' => true,
   'show_ui' => true,
   'show_in_nav_menus'  => true,
   'exclude_from_search' => false,
					'menu_icon' => 'dashicons-businessman',  // Icon Path
								'menu_position' => 5,

    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'services' , $args );
}

function service_tax_update( $ID, $post ) {
     $title = $post->post_title;    
     if( !term_exists(  $title, 'gateley_plc_service' ) ){
           wp_insert_term(  $title, 'gateley_plc_service');
       }
}
add_action( 'publish_services', 'service_tax_update', 10, 2 );