<?php // peoples
function gateley_search_custom_people_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Search People', 'taxonomy general name' ),
    'singular_name'     => _x( 'Search Contact(s)', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search People' ),
    'all_items'         => __( 'All Search Related People' ),
    'parent_item'       => __( 'Parent Contact' ),
    'parent_item_colon' => __( 'Parent Contact:' ),
    'edit_item'         => __( 'Edit Search Contact' ),
    'update_item'       => __( 'Update Search Contact' ),
    'add_new_item'      => __( 'Add New Search Contact' ),
    'new_item_name'     => __( 'New Contact Name' ),
    'menu_name'         => __( 'Search Contact(s)' ),
  );
 $screens =  array('sectors', 'services'); 


  register_taxonomy( 'gateley_search_people',  $screens, array(
    'hierarchical' => true,
    'labels'       => $labels,
    'show_ui'      => true,
    'query_var'    => true,
	'public'  => false
  ));
 
}
add_action( 'init', 'gateley_search_custom_people_taxonomies');


