<?php 
/* ======== ======== ======== ======== ======== ======== */
/* Pageblock									  */	
/* ======== ======== ======== ======== ======== ======== */


function linkblockbuilder_func( $atts ) {

extract( shortcode_atts( array(
'blocktitle' => '{$blocktitle}',
'blockimg' => '{$blockimg}',
'blockcontent' => '{$blockcontent}',
'blocklink' => '{$blocklink}',
'displaytype' => '{$displaytype}',
'css' => '{$css}'
), $atts ) );



$thelink = vc_build_link( $blocklink );
$link = $thelink['url'];
$linktarget = $thelink['target'];

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
$blockimage = $blockimg;
$output;
$url = $thumb['0'];
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}";

if ('people' == get_post_type() || $displaytype == "medialist" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/builderblocks/media-list.php';
	
} elseif($displaytype == "medialistnoimage" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/builderblocks/media-list-no-image.php';

	
} elseif($displaytype == "list") { 

	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/builderblocks/list.php';


}else {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/builderblocks/overlay-grid.php';
		
}

return $output;
}
add_shortcode( 'linkblockbuilder', 'linkblockbuilder_func' );