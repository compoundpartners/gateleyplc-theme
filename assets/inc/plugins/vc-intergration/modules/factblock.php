<?php
/* ======== ======== ======== ======== ======== ======== */
/* Fact block								  */	
/* ======== ======== ======== ======== ======== ======== */

function factblock_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'percentage' => '{$percentage}',
'fact' => '{$fact}'

), $atts ) );
$args = array(
'post_type' => 'sectors',
'p' => $pageid,
);
$output;

$output .= '<div class="media-'.get_the_ID().' media '.$addclass.' media-factblock">';
$output .= '<div class="media-left ">';
$output .= '<div class="media-object media-object-percentage">';
$output .= '<div class="arrow">';
$output .= '</div>';

$output .= $percentage;

$output .= '</div>';

$output .= '</div>';

$output .= '<div class="media-body">';
//$output .= '<a href="'.get_the_permalink().'">';
$output .= wpb_js_remove_wpautop($fact, true);
//$output .= '</a>';
$output .= '</div>';
$output .= '</div>';


return $output;
}
add_shortcode( 'factblock', 'factblock_func' );
