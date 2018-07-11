<?php // jobss
function gateley_plc_custom_roles_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Careers Roles', 'taxonomy general name' ),
    'singular_name'     => _x( 'Careers Role', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Careers Roles' ),
    'all_items'         => __( 'All Careers Roles' ),
    'parent_item'       => __( 'Parent Careers Role' ),
    'parent_item_colon' => __( 'Parent Careers Role:' ),
    'edit_item'         => __( 'Edit Careers Role' ),
    'update_item'       => __( 'Update Careers Role' ),
    'add_new_item'      => __( 'Add New Careers Role' ),
    'new_item_name'     => __( 'New Careers Role Name' ),
    'menu_name'         => __( 'Career Roles' ),
  );
 $screens =  array('careers'); 
/*foreach( $screens as $screen) { 
//add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_CareersRole_columns', 100 );
}*/
function my_CareersRole_columns( $columns ) {
    $columns['gateley_plc_roles'] = 'Careers Role';
    unset( $columns['comments'] );
    return $columns;
}

function custom_CareersRole_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_roles':
			$terms = get_the_term_list( $post_id, 'gateley_plc_roles', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Role(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_roles',  $screens, array(
    'labels'       => $labels,
'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,  //  'rewrite'      => array( 'slug' => 'jobs' ),
  ));
}
add_action( 'init', 'gateley_plc_custom_roles_taxonomies');