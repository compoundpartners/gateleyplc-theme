<?php 
// Carousel
function timeline_shortcode($atts, $content) { 

global $post; 
extract(shortcode_atts(array( 
"title" => 'title',
"barbottom" => '{$barbottom}',
"el_id" => 'timeline-'.rand(),
'css' => ''

), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
  
$output = '';
$output .= '<section class="timeline '.esc_attr( $css_class ).'" id="'.$el_id.'">';
	
$output .= do_shortcode("$content");

$output .= '</section>';
if(is_numeric($barbottom)) {
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
$GLOBALS['styles'] .= '#'.$el_id.".timeline::before {bottom:".$barbottom."px;}";
}
return $output;
}
add_shortcode('timeline', 'timeline_shortcode'); 