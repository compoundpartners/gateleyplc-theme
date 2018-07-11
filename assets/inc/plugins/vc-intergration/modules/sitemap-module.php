<?php /* ======== ======== ======== ======== ======== ======== */
/* Twitter									  */	
/* ======== ======== ======== ======== ======== ======== */
function sitemap_func( $atts ) {
extract( shortcode_atts( array(
'title' => '{$title}',


), $atts ) );
 $output;
 

 $cols = get_dynamic_sidebar( 'mega-menu-cols' );
  $output .= "<div class='vc_row'>";
 $output .= str_replace('vc_col-md-2', 'vc_col-md-4 matchHeight',  $cols);
   $output .= "</div>";

       $output .= get_dynamic_sidebar( 'mega-menu-split-gateley' );
 
 
  return $output;

}
add_shortcode( 'sitemap', 'sitemap_func' );