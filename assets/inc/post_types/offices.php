<?php 
add_action('init', 'office_register');
 function office_register() {
	$labels = array(
		'name' => _x('Offices', 'post type general name'),
		'singular_name' => _x('Our Office', 'post type singular name'),
		'add_new_item' => __('Add New Office'),
		'edit_item' => __('Edit Office'),
		'new_item' => __('New Office'),
		'view_item' => __('View Office'),
		'search_items' => __('Search Offices'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
    	'show_ui' => true,
    	'capability_type' => 'post',
	'publicly_queriable' => true,
    'public' => true,
'has_archive' => false,   'show_in_nav_menus'  => true,
   'exclude_from_search' => false,
'menu_icon' => 'dashicons-location',  // Icon Path
	'menu_position' => 5,

//    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
    	'supports' => array('title', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'office' , $args );
}
function office_tax_update( $ID, $post ) {
     $title = $post->post_title;    
     if( !term_exists(  $title, 'gateley_plc_us_location' ) ){
           wp_insert_term(  $title, 'gateley_plc_us_location');
       }
}
add_action( 'publish_office', 'office_tax_update', 10, 2 );