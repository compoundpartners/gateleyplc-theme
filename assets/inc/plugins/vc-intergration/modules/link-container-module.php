<?php 
// link_container_
function link_container_shortcode($atts, $content) { 

global $post; 
extract(shortcode_atts(array( 
"blocklink" => '{$blocklink}',

'css' => ''

), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
 $thelink = vc_build_link( $blocklink );
$link = $thelink['url'];
$output = '';
$output .= '<div class="'.esc_attr( $css_class ).'">';
$output .= '<a href="'.$blocklink.'">';

$output .= '<div class="container">';
$output .= do_shortcode("$content");
$output .= '</div>';

$output .= '<a>';
$output .= '</div>';


return $output;
}
add_shortcode('link_container', 'link_container_shortcode'); 
