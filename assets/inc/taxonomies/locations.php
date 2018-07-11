<?php function gateley_plc_custom_location_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Location', 'taxonomy general name' ),
    'singular_name'     => _x( 'Locations', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Location' ),
    'all_items'         => __( 'All Locations' ),
    'parent_item'       => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item'         => __( 'Edit Location' ),
    'update_item'       => __( 'Update Location' ),
    'add_new_item'      => __( 'Add New Location' ),
    'new_item_name'     => __( 'New Location Name' ),
    'menu_name'         => __( 'Location' ),
  );
 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'careers'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_columns', 100 );


}
function my_columns( $columns ) {
    $columns['gateley_plc_us_location'] = 'Locations';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_columns', 10, 2 );

function custom_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_us_location':
			$terms = get_the_term_list( $post_id, 'gateley_plc_us_location', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No location(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_us_location',  $screens, array(
    'hierarchical' => true,
    'labels'       => $labels,
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'location' ),
  ));
 
}
add_action( 'init', 'gateley_plc_custom_location_taxonomies');

function gateley_plc_default_terms(){
 
        // see if we already have populated any terms
    $location = get_terms( 'gateley_plc_us_location', array( 'hide_empty' => false ) );
 
    // if no terms then lets add our terms
    if( empty( $location ) ){
        $locations = gateley_plc_get_us_locations();
        foreach( $locations as $location ){
            if( !term_exists( $location['name'], 'gateley_plc_us_location' ) ){
                wp_insert_term( $location['name'], 'gateley_plc_us_location', array( 'slug' => $location['short'] ) );
            }
        }
    }
 
}
add_action( 'init', 'gateley_plc_default_terms' );

function gateley_plc_get_us_locations(){
 
    $locations = array(
        '0' => array( 'name' => 'Aberdeen', 'short' => 'aberdeen' ),
        '1' => array( 'name' => 'Birmingham', 'short' => 'birmingham' ),
        '2' => array( 'name' => 'Edinburgh', 'short' => 'edinburgh' ),
        '3' => array( 'name' => 'Glasgow', 'short' => 'glasgow' ),
        '4' => array( 'name' => 'Leeds', 'short' => 'leeds' ),
        '5' => array( 'name' => 'Leicester', 'short' => 'leicester' ),
        '6' => array( 'name' => 'Manchester', 'short' => 'manchester' ),
        '7' => array( 'name' => 'Nottingham', 'short' => 'nottingham' ),
        '8' => array( 'name' => 'Dubai', 'short' => 'dubai' ),
    );
 
    return $locations;
}

