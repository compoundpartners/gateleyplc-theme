<?php /**
 * Header & Footer Setup
 */
require get_template_directory() . '/assets/inc/header-footer.php';
 /**
 * Admin Setup
 */
require get_template_directory() . '/assets/inc/admin/admin.php';
require get_template_directory() . '/assets/inc/admin/setup-options.php';
require get_template_directory() . '/assets/inc/admin/user-upload-files.php';
/**
 * Load Static RESOURCES

require get_template_directory() . '/assets/inc/admin/static_requires.php';		
 */
 /**
 * Pagination
 */
require get_template_directory() . '/assets/inc/pagination/alphabetical-pagination.php';
require get_template_directory() . '/assets/inc/pagination/page-pagination.php';


 /**
 * General Functions
 */
require get_template_directory() . '/assets/inc/general-functions/vcard.php';
require get_template_directory() . '/assets/inc/general-functions/colour-convertor.php';
require get_template_directory() . '/assets/inc/general-functions/external-link.php';
require get_template_directory() . '/assets/inc/general-functions/compress.php';
require get_template_directory() . '/assets/inc/general-functions/truncate.php';
require get_template_directory() . '/assets/inc/general-functions/getUrls.php';
require get_template_directory() . '/assets/inc/general-functions/rewrite-rules.php';
require get_template_directory() . '/assets/inc/general-functions/post_view.php';

require get_template_directory() . '/assets/inc/general-functions/get-page-by-slug.php';
function removeElementWithValue($array, $key, $value){
     foreach($array as $subKey => $subArray){
          if($subArray[$key] == $value){
               unset($array[$subKey]);
          }
     }
     return $array;
}
function the_slug() { /** Admin Slug Function */ 
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}
function is_child( $parent = '' ) {
    global $post;

    $parent_obj = get_page( $post->post_parent, ARRAY_A );
    $parent = (string) $parent;
    $parent_array = (array) $parent;

    if ( in_array( (string) $parent_obj['ID'], $parent_array ) ) {
        return true;
    } elseif ( in_array( (string) $parent_obj['post_title'], $parent_array ) ) {
        return true;    
    } elseif ( in_array( (string) $parent_obj['post_name'], $parent_array ) ) {
        return true;
    } else {
        return false;
    }
}


add_action( 'admin_enqueue_scripts', 'gateley_admin_plugin_scripts' );
function gateley_admin_plugin_scripts( $hook_suffix ) {
	
	wp_register_script('my-admin-js',  get_template_directory() . '/assets/inc/admin/js/admin.js', array('jquery'));
	  wp_enqueue_script('my-admin-js');
	  wp_enqueue_media();	 

}


function get_dynamic_sidebar($index = 1)
{
$sidebar_contents = "";
ob_start();
dynamic_sidebar($index);
$sidebar_contents = ob_get_clean();
return $sidebar_contents;
} 


/**
 * Load Site Mirror
 */
//require get_template_directory() . '/assets/inc/general-functions/site-mirror.php';

 /**
 * Widgets
 */
require get_template_directory() . '/assets/inc/sidebars/widgets.php';
require get_template_directory() . '/assets/inc/sidebars/widgetareas.php';

/**
* Styles Set Up
*/
require get_template_directory() . '/assets/inc/styles/load-styles.php';
require get_template_directory() . '/assets/inc/styles/styles-classes.php';

 /**
 * Breadcrumbs Setup
 */
require get_template_directory() . '/assets/inc/theme/breadcrumbs.php';

/**
* Media Set Up
*/
require get_template_directory() . '/assets/inc/theme/media.php';

/**
 * Implement the Custom Header feature.

require get_template_directory() . '/assets/inc/custom-header.php';
 */
 
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/assets/inc/theme/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/assets/inc/admin/customizer.php';

/**
 * Load Visual Composer compatibility file.
 */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/vc-intergration.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/shortcodes.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/vc-extend.php';
/**
 * Extend Search
 */
require get_template_directory() . '/assets/inc/search/extend-search.php';
require get_template_directory() . '/assets/inc/search/query-vars.php';