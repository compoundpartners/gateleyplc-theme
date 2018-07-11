<?php // SubPage Gride
function relatedposts_func( $atts ) {
wp_reset_query();
extract( shortcode_atts( array(
'title' => '{$title}',
'posttypes' => '{$posttypes}',
'pageid' => '{$pageid}',
'displaytype' => '{$displaytype}',
'taxquery' => '{$taxquery}',
'popuplink' => '{$popuplink}',
'columns' => '{$columns}',
'tabletcolumns' => '{$tabletcolumns}',
'showtitle' => '{$showtitle}',
'showlink' => '{$showlink}',
'thelink' => '{$thelink}',
'headercontainer' => '{$headercontainer}',
'amountofposts' => '{$amountofposts}',
'showcontent' => '{$showcontent}',
'networkquery' => '{$networkquery}',
'whichsite' => '{$whichsite}',
'columngrid' => '{$columngrid}',
'masonry' => '{$masonry}',
'el_id' => uniqid('grid-'),
'css' => '',
'sibsorchild' => '{$sibsorchild}',
'postnotin' => '{$postnotin}',
'tax' => '{$tax}',
'headerlinkcolour' => '{$headerlinkcolour}',
'postparent' => '{$postparent}',
'postparentid' => '{$postparentid}',
'postmeta' => '{$postmeta}',
'headerlinkbackgroundcolour' => '{$headerlinkbackgroundcolour}',
'headerbackgroundcolour' => '{$headerbackgroundcolour}',
'postin' => '{$postin}',
'divider' => '{$divider}',
'truncate' => '{$truncate}',
'featuredimg' => '{$featuredimg}',
'showpagination' => '{$showpagination}',
'relatedpost' => '{$relatedpost}',
'colourthumbs' => '{$colourthumbs}',
'whicheventcat' => '{$whicheventcat}'
), $atts ) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

$args = array(
'page_id' => $pageid,
);
$output;
global $post;
$isSubpage = $post->post_parent;
if (!empty($isSubpage)){ 
$parent = $post->post_parent;
} else {
$parent = $post->ID;
}
wp_reset_query();
$args = array();
$type = array($posttypes);
//print_r( $type);



$args['post_type'] = $type;
$args['post_status'] = 'publish';	


global $post;
	 $postterms = wp_get_post_terms( get_the_ID(), $tax, array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all')); 


 $pages = array();
 foreach($postterms as $term) {
	$page =    get_page_by_title( html_entity_decode($term->name), OBJECT, $posttypes );
	$pages[] = $page->ID;
	 
 }
 $output .= '<div class="'.$css_class .'">';
 		$output .="<h4 class='loop-title'>".$title."</h4>";

foreach($pages as $post) {
	 $output .= '<div class="vc_col-xs-12 list-item">';

	
setup_postdata( $post ); 
$isinternation = get_post_meta($post->ID, '_internationalPage', true);

if($isinternation == 1 && !empty(get_post_meta($post->ID, '_subheadtwo', true))) {
$thetitle =  get_post_meta($post->ID, '_subheadtwo', true);	
} else  {
$thetitle = get_the_title();	
}
	
if ('people' == get_post_type() || $displaytype == "medialist" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list.php';
	
} elseif($displaytype == "medialistnoimage" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list-no-image.php';

	
} elseif($displaytype == "list") { 

	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/list.php';


}elseif($displaytype == "thumbnail") { 
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/thumbnail.php';
		
}
else {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/overlay-grid.php';
		
}
	 $output .= '</div>';

}
 $output .="</div>";

return $output;

}
add_shortcode( 'relatedposts', 'relatedposts_func' );