<?php // jobss
function gateley_plc_custom_jobs_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Job Roles', 'taxonomy general name' ),
    'singular_name'     => _x( 'Job Role', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search JobRoles' ),
    'all_items'         => __( 'All Job Roles' ),
    'parent_item'       => __( 'Parent Job Role' ),
    'parent_item_colon' => __( 'Parent Job Role:' ),
    'edit_item'         => __( 'Edit Job Role' ),
    'update_item'       => __( 'Update Job Role' ),
    'add_new_item'      => __( 'Add New Job Role' ),
    'new_item_name'     => __( 'New Job Role Name' ),
    'menu_name'         => __( 'Job Roles' ),
  );
 $screens =  array('people'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_JobRole_columns', 100 );


}
function my_JobRole_columns( $columns ) {
    $columns['gateley_plc_jobs'] = 'JobRole';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_JobRole_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_JobRole_columns', 10, 2 );

function custom_JobRole_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_jobs':
			$terms = get_the_term_list( $post_id, 'gateley_plc_jobs', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Job Role(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_jobs',  $screens, array(
    'labels'       => $labels,
'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,  //  'rewrite'      => array( 'slug' => 'jobs' ),
  ));
  
    
 
}
add_action( 'init', 'gateley_plc_custom_jobs_taxonomies');


