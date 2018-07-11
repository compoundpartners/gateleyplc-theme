<?php /* ======== ======== ======== ======== ======== ======== */
/* Breadcrumbs									  */	
/* ======== ======== ======== ======== ======== ======== */
function breadcrumbs_shortcode($atts, $content = null) {  
extract(shortcode_atts(array( 
"id" => 'id',
), $atts));
return the_breadcrumb();
}
add_shortcode('breadcrumbs', 'breadcrumbs_shortcode'); 

