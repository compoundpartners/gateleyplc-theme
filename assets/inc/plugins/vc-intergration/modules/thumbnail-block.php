<?php 
/* ======== ======== ======== ======== ======== ======== */
/* Pageblock									  */	
/* ======== ======== ======== ======== ======== ======== */


function thumbnail_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'pageimage' => '{$pageimage}',
'pagecontent' => '{$pagecontent}',
'colourthumbs' => '{$colourthumbs}',
'css' => ''
), $atts ) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

$args = array(
'page_id' => $pageid,
);


$output .= '<div class="thumbnail matchHeight thumbnail-service white thumbnail  thumbnail-'.$pageid.'">';

$output .= '<a href="'.get_the_permalink($pageid).'" class="thumbnail-left matchHeight ">';
$output .= get_the_post_thumbnail($pageid, "page-block-thumb", array('class' => 'thumbnail-object'));
$output .= '</a>';

$output .= '<div class="thumbnail-body caption ">';
$output .= '<a href="'.get_the_permalink($pageid).'" class="">';
$output .= $pagecontent;
$output .= '</a>';
$output .= '</div></div>';


return $output;
}
add_shortcode( 'thumbnail', 'thumbnail_func' );