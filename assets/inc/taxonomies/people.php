<?php // peoples
function gateley_plc_custom_people_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'People', 'taxonomy general name' ),
    'singular_name'     => _x( 'Contact(s)', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search People' ),
    'all_items'         => __( 'All People' ),
    'parent_item'       => __( 'Parent Contact' ),
    'parent_item_colon' => __( 'Parent Contact:' ),
    'edit_item'         => __( 'Edit Contact' ),
    'update_item'       => __( 'Update Contact' ),
    'add_new_item'      => __( 'Add New Contact' ),
    'new_item_name'     => __( 'New Contact Name' ),
    'menu_name'         => __( 'Contact(s)' ),
  );
 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'careers', 'publications'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_Contact_columns', 100 );


}
function my_Contact_columns( $columns ) {
    $columns['gateley_plc_people'] = 'People';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_Contact_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_Contact_columns', 10, 2 );

function custom_Contact_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_people':
			$terms = get_the_term_list( $post_id, 'gateley_plc_people', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Contact(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_people',  $screens, array(
    'hierarchical' => true,
    'labels'       => $labels,
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'people' ),
  ));
 
}
add_action( 'init', 'gateley_plc_custom_people_taxonomies');


