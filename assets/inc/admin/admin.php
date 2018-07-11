<?php add_action( 'admin_enqueue_scripts', 'gateley_add_color_picker' );
function gateley_add_color_picker( $hook ) {
 
    if( is_admin() ) { 
     
        // Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
                 wp_enqueue_style( 'admin-styles', get_template_directory_uri() . '/assets/inc/admin/css/admin.css' ); 

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'admin-scripts', get_template_directory_uri() . '/assets/inc/admin/js/admin.js', array( 'wp-color-picker' ), false, true ); 
    }
}


function gateley_add_taxonomy_filters() {
	global $typenow;
 
	// an array of all the taxonomyies you want to display. Use the taxonomy name or slug
	$taxonomies = array('gateley_plc_us_location', 'gateley_plc_service', 'gateley_plc_sector');
 
	// must set this to the post type you want the filter(s) displayed on
	if( $typenow == 'people' ){
 
		foreach ($taxonomies as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) { 
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}
add_action( 'restrict_manage_posts', 'gateley_add_taxonomy_filters' );


function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_theme_mod('gateley_plc_menu_logo'); ?>);
  background-size: 100% auto !important;
  padding-bottom: 0px;
  width: 200px;
  height: 50px;
}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );