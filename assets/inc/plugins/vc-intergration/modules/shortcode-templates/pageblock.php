<?php 
/* ======== ======== ======== ======== ======== ======== */
/* Pageblock									  */	
/* ======== ======== ======== ======== ======== ======== */


function pageblock_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'displaytype' => '{$displaytype}',
'showcontent' => '{$showcontent}',
'css' => '',

), $atts ) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

$args = array(
'page_id' => $pageid,
);
$output;
global $post;
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
$isinternation = get_post_meta($post->ID, '_internationalPage', true);

	
	$output .= "<div class='".esc_attr( $css_class )."'>";
while ( $loop->have_posts() ) : $loop->the_post();

if($isinternation == 1 && !empty(get_post_meta($post->ID, '_subheadtwo', true))) {
$thetitle =  get_post_meta($post->ID, '_subheadtwo', true);	
} else  {
$thetitle = get_the_title();	
}
	

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}";

if ('people' == get_post_type() || $displaytype == "medialist" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list.php';
	
} elseif($displaytype == "medialistnoimage" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list-no-image.php';

	
} elseif($displaytype == "list") { 

	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/list.php';


}else {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/overlay-grid.php';
		
}
endwhile;
	$output .= "</div>";

}
return $output;
}
add_shortcode( 'pageblock', 'pageblock_func' );