<?php // jobss
function gateley_plc_custom_departments_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Careers Department', 'taxonomy general name' ),
    'singular_name'     => _x( 'Careers Department', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Careers Department' ),
    'all_items'         => __( 'All Careers Department' ),
    'parent_item'       => __( 'Parent Careers Department' ),
    'parent_item_colon' => __( 'Parent Careers Department:' ),
    'edit_item'         => __( 'Edit Careers Department' ),
    'update_item'       => __( 'Update Careers Department' ),
    'add_new_item'      => __( 'Add New Careers Department' ),
    'new_item_name'     => __( 'New Careers Department Name' ),
    'menu_name'         => __( 'Career Department' ),
  );
 $screens =  array('careers'); 
  /*
foreach( $screens as $screen) { 
//add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_CareersDepartment_columns', 100 );
}*/
function my_CareersDepartment_columns( $columns ) {
    $columns['gateley_plc_departments'] = 'Careers Department';
    unset( $columns['comments'] );
    return $columns;
}

function custom_CareersDepartment_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_departments':
			$terms = get_the_term_list( $post_id, 'gateley_plc_departments', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Department(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_departments',  $screens, array(
    'labels'       => $labels,
'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,  //  'rewrite'      => array( 'slug' => 'jobs' ),
  ));
  
    
 
}
add_action( 'init', 'gateley_plc_custom_departments_taxonomies');


