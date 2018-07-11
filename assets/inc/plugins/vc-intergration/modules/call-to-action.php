<?php
/* ======== ======== ======== ======== ======== ======== */
/* Fact block								  */	
/* ======== ======== ======== ======== ======== ======== */

function call_to_action_func( $atts ) {

extract( shortcode_atts( array(
'calltoactioncontent' => '{$calltoactioncontent}',
'calltoactionlink' => '{$calltoactionlink}',
'calltoactionbackground' => '{$calltoactionbackground}',
'calltoactioncoloroverlay' => '{$calltoactioncoloroverlay}',

'css' => '',


), $atts ) );
$args = array(
'post_type' => 'sectors',
'p' => $pageid,
);
$output;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
$thelink = vc_build_link( $calltoactionlink );
$link = $thelink['url'];
$imgurl = wp_get_attachment_url($calltoactionbackground);
$GLOBALS['styles'] .= ".calltoaction-".get_the_ID()."{ background:url(".$imgurl."); background-size:cover; background-position:center center;}";
$GLOBALS['styles'] .= ".calltoaction-".get_the_ID()." .cover{ background:".$calltoactioncoloroverlay.";}";

$output .= "<div class='".esc_attr( $css_class )."'>";
$output .= '<div class="calltoaction-'.get_the_ID().' calltoaction '.$addclass.'">';

$output .= '<div class="cover "></div>';

$output .= '<div class="calltoaction-body container">';
$output .= '<div class="row">';
$output .= '<div class="vc_col-md-9">';
$output .= $calltoactioncontent;
$output .= '</div>';
$output .= '<div class="vc_col-md-3">';
$output .= '<a class="btn btn-purple btn-lg pull-right" href="'.$link.'" target="'.$thelink["target"].'">'.$thelink["title"].'</a>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';
$output .= '</div>';


return $output;
}
add_shortcode( 'call_to_action', 'call_to_action_func' );
