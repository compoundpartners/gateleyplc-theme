<?php // services
function gateley_plc_custom_service_taxonomies() {

  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Services', 'taxonomy general name' ),
    'singular_name'     => _x( 'Service', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Services' ),
    'all_items'         => __( 'All Services' ),
    'parent_item'       => __( 'Parent Service' ),
    'parent_item_colon' => __( 'Parent Service:' ),
    'edit_item'         => __( 'Edit Service' ),
    'update_item'       => __( 'Update Service' ),
    'add_new_item'      => __( 'Add New Service' ),
    'new_item_name'     => __( 'New Service Name' ),
    'menu_name'         => __( 'Service' ),
  );
 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'careers', 'corporate-deals', 'housebuilder-markets', 'talking-matters', 'talking-trainees'); 
foreach( $screens as $screen) {
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_Service_columns', 100 );


}
function my_Service_columns( $columns ) {
    $columns['gateley_plc_service'] = 'Services';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_Service_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_Service_columns', 10, 2 );

function custom_Service_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_service':
			$terms = get_the_term_list( $post_id, 'gateley_plc_service', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Service(s) Set', 'gateley-plc' );
			}
			break;

	}
}

  register_taxonomy( 'gateley_plc_service',  $screens, array(
    'hierarchical' => true,
    'labels'       => $labels,
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'services' ),
  ));

}
add_action( 'init', 'gateley_plc_custom_service_taxonomies');
