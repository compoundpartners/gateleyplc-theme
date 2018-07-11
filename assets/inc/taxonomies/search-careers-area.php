<?php // jobss
function gateley_plc_custom_areas_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Careers Area', 'taxonomy general name' ),
    'singular_name'     => _x( 'Careers Area', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Careers Area' ),
    'all_items'         => __( 'All Careers Area' ),
    'parent_item'       => __( 'Parent Careers Area' ),
    'parent_item_colon' => __( 'Parent Careers Area:' ),
    'edit_item'         => __( 'Edit Careers Area' ),
    'update_item'       => __( 'Update Careers Area' ),
    'add_new_item'      => __( 'Add New Careers Area' ),
    'new_item_name'     => __( 'New Careers Area Name' ),
    'menu_name'         => __( 'Career Area' ),
  );
$screens =  array('careers'); 
/* foreach( $screens as $screen) { 
//add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_CareersArea_columns', 100 );
}*/
function my_CareersArea_columns( $columns ) {
    $columns['gateley_plc_areas'] = 'Careers Area';
    unset( $columns['comments'] );
    return $columns;
}
function custom_CareersArea_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_areas':
			$terms = get_the_term_list( $post_id, 'gateley_plc_areas', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Area(s) Set', 'gateley-plc' );
			}
			break;
	}
}
register_taxonomy( 'gateley_plc_areas',  $screens, array(
    'labels'       => $labels,
'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,  //  'rewrite'      => array( 'slug' => 'jobs' ),
  ));
}
add_action( 'init', 'gateley_plc_custom_areas_taxonomies');