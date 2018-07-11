<?php add_action('init', 'sectors_register');
 function sectors_register() {
	$labels = array(
		'name' => _x('Sectors', 'post type general name'),
		'singular_name' => _x('Sectors', 'post type singular name'),
		'add_new_item' => __('Add New Sector'),
		'edit_item' => __('Edit Sector'),
		'new_item' => __('New Sector'),
		'view_item' => __('View Sector'),
		'search_items' => __('Search Sectors'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'labels' => $labels,
				'hierarchical' => true,
				'description' => '',
				'taxonomies' => array( '', ),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => '5',
				'show_in_nav_menus' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'has_archive' => false,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => true,
				'capability_type' => 'post',
					'menu_icon' => 'dashicons-products',  // Icon Path
								'menu_position' => 5,

    	'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields')
	  ); 
	register_post_type( 'sectors' , $args );
}
function sector_tax_update( $ID, $post ) {
     $title = $post->post_title;    
     if( !term_exists(  $title, 'gateley_plc_sector' ) ){
           wp_insert_term(  $title, 'gateley_plc_sector');
       }
}
add_action( 'publish_sectors', 'sector_tax_update', 10, 2 );