<?php // sectors
function gateley_plc_custom_sector_taxonomies() {
 
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Sectors', 'taxonomy general name' ),
    'singular_name'     => _x( 'Sector', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Sectors' ),
    'all_items'         => __( 'All Sectors' ),
    'parent_item'       => __( 'Parent Sector' ),
    'parent_item_colon' => __( 'Parent Sector:' ),
    'edit_item'         => __( 'Edit Sector' ),
    'update_item'       => __( 'Update Sector' ),
    'add_new_item'      => __( 'Add New Sector' ),
    'new_item_name'     => __( 'New Sector Name' ),
    'menu_name'         => __( 'Sector' ),
  );
 $screens =  array('page', 'post', 'people', 'services', 'sectors'); 
foreach( $screens as $screen) { 
add_filter( 'manage_edit-'.strtolower($screen).'_columns', 'my_Sector_columns', 100 );


}
function my_Sector_columns( $columns ) {
    $columns['gateley_plc_sector'] = 'Sectors';
    unset( $columns['comments'] );
    return $columns;
}


add_action( 'manage_posts_custom_column' , 'custom_Sector_columns', 10, 2 );
add_action( 'manage_pages_custom_column' , 'custom_Sector_columns', 10, 2 );

function custom_Sector_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'gateley_plc_sector':
			$terms = get_the_term_list( $post_id, 'gateley_plc_sector', '', ',', '' );
			if ( is_string( $terms ) ) {
				echo $terms;
			} else {
				_e( 'No Sector(s) Set', 'gateley-plc' );
			}
			break;
		
	}
}

  register_taxonomy( 'gateley_plc_sector',  $screens, array(
    'labels'       => $labels,
'hierarchical'               => true,
				'public'                     => true,
				'show_ui'                    => true,
				'show_admin_column'          => true,
				'show_in_nav_menus'          => true,
				'show_tagcloud'              => true,  //  'rewrite'      => array( 'slug' => 'sector' ),
  ));
  
    
 
}
add_action( 'init', 'gateley_plc_custom_sector_taxonomies');


