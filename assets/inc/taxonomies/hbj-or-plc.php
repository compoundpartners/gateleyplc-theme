<?php 

function gateley_plc_split_tax() {
 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'office'); 

register_taxonomy( 'gateley_plc_or_hbj_gateley',  $screens, array(
    'hierarchical' => true,
    'labels'       => array(
    'name'              => _x( 'Site Split', 'taxonomy general name' ),
    'singular_name'     => _x( 'Site Split', 'taxonomy singular name' ),
    'menu_name'         => __( 'Gateley Plc or HBJ Gateley' ),
  ),
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'gateley-plc-or-hbj-gateley' ),
  ));
}
 add_action( 'init', 'gateley_plc_split_tax' ); 
  
  function gateley_plc_split_default_terms(){
 
        // see if we already have populated any terms
    $location = get_terms( 'gateley_plc_or_hbj_gateley', array( 'hide_empty' => false ) );
 
 $splitItems = array(
        '0' => array( 'name' => 'Gateley Plc'),
          '1' => array( 'name' => 'HBJ Gateley'),
    );
 
    // if no terms then lets add our terms
    if( empty( $location ) ){
        $split =  $splitItems;
        foreach( $split as $locs ){
            if( !term_exists( $locs['name'], 'gateley_plc_or_hbj_gateley' ) ){
                wp_insert_term( $locs['name'], 'gateley_plc_or_hbj_gateley' );
            }
        }
    }

 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'office'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_gateley_plc_or_hbj_gateley_columns', 100 );


}
function my_gateley_plc_or_hbj_gateley_columns( $columns ) {
    $columns['gateley_plc_gateley_plc_or_hbj_gateley'] = 'Gateley or HBJ';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_gateley_plc_or_hbj_gateley_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_gateley_plc_or_hbj_gateley_columns', 10, 2 );

function custom_gateley_plc_or_hbj_gateley_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_gateley_plc_or_hbj_gateley':
			$terms = get_the_term_list( $post_id, 'gateley_plc_or_hbj_gateley', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Split Set', 'gateley-plc' );
			}
			break;
		
	}
}

 
}


add_action( 'init', 'gateley_plc_split_default_terms' );