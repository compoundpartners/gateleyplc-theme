<?php function gateley_plc_spotlight_tax() {
 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'office'); 

register_taxonomy( 'spotlight',  $screens, array(
    'hierarchical' => true,
    'labels'       => array(
    'name'              => _x( 'Spotlight', 'taxonomy general name' ),
    'singular_name'     => _x( 'Spotlight', 'taxonomy singular name' ),
    'menu_name'         => __( 'Spotlight Item' ),
  ),
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'spotlight' ),
  ));
}
 add_action( 'init', 'gateley_plc_spotlight_tax' ); 
  
  function gateley_plc_spotlight_default_terms(){
 
        // see if we already have populated any terms
    $location = get_terms( 'spotlight', array( 'hide_empty' => false ) );
 
 $spotlightItems = array(
          '1' => array( 'name' => 'In Spotlight'),
    );
 
    // if no terms then lets add our terms
    if( empty( $location ) ){
        $spotlight =  $spotlightItems;
        foreach( $spotlight as $locs ){
            if( !term_exists( $locs['name'], 'spotlight' ) ){
                wp_insert_term( $locs['name'], 'spotlight' );
            }
        }
    }
add_action( 'init', 'gateley_plc_spotlight_default_terms' );



 $screens =  array('page', 'post', 'people', 'services', 'sectors', 'office'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_spotlight_columns', 100 );
}
function my_spotlight_columns( $columns ) {
    $columns['gateley_plc_spotlight'] = 'Spotlight';
    unset( $columns['comments'] );
    return $columns;
}

add_action( 'manage_posts_custom_column' , 'custom_spotlight_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_spotlight_columns', 10, 2 );

function custom_spotlight_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_spotlight':
			$terms = get_the_term_list( $post_id, 'spotlight', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'Not in Spotlight', 'gateley-plc' );
			}
			break;
		
	}
} 
}