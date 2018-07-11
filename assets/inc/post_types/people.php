<?php 
add_action('init', 'people_register');
 function people_register() {
	$labels = array(
		'name' => _x('People', 'post type general name'),
		'singular_name' => _x('Our People', 'post type singular name'),
		'add_new_item' => __('Add New Person'),
		'edit_item' => __('Edit Persons Profile'),
		'new_item' => __('New Person Profile'),
		'view_item' => __('View Person\'s Profile'),
		'search_items' => __('Search People'),
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
'menu_icon' => 'dashicons-id',  // Icon Path
	'menu_position' => 5,

    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 

	register_post_type( 'people' , $args );
}
function people_tax_update( $ID, $post ) {
     $title = $post->post_title;    
     if( !term_exists(  $title, 'gateley_plc_people' ) ){
           wp_insert_term(  $title, 'gateley_plc_people');
       }
}
add_action( 'publish_people', 'people_tax_update', 10, 2 );