<?php // SubPage Gride
function subpagegrid_func( $atts ) {
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
$type = $posttypes;
//print_r( $type);



$args['post_type'] = $type;
$args['post_status'] = 'publish';	

if(is_numeric($amountofposts) && $amountofposts !== -1) {
	$args['posts_per_page'] = $amountofposts;

} else {
	$args['posts_per_page'] = -1;
	
}

if($showpagination == 'yes') {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$args['paged'] = $paged;	
}


	if($sibsorchild == 'child') {
		if(is_numeric($postparentid)) {
			$args['post_parent'] = $postparentid;
		} else {
		$args['post_parent'] = get_the_ID();
		}
	} elseif($sibsorchild == 'sibs'){
		global $post;
	$args['post_parent'] = $post->post_parent;	

if(!empty($postnotin) && is_numeric($postnotin)){
	$postnotin = array($postnotin);
			$args['post__not_in'] = $postnotin;

}
}

if ($postparent == 'yes') {
		$args['post_parent'] = 0;	
}
//echo $taxquery;
if($taxquery == 'yes') {
	$args['tax_query'] = array(
		array(
			'taxonomy' => $tax,
			'field'    => 'slug',
			'terms'    => the_slug(),
		),
	);
} elseif ($type == 'event' && $whicheventcat !== 'none') {
	
$args['tax_query'] = array(
		array(
			'taxonomy' => 'event-categories',
			'field'    => 'slug',
			'terms'    => $whicheventcat,
		),
	);
}
 if($type == 'event') {

$args['order']= 'ASC';
$args['orderby'] = 'meta_value';
$args['meta_key'] = '_event_start_date';
	
} elseif($posttypes == 'post') {
$args['order']= 'DESC';
$args['orderby'] = 'date';		
}else {
if( get_option('themetype') == 'investor') {
	$args['order']= 'ASC';
	$args['orderby'] = 'menu_order';	
} else {
	$args['order']= 'ASC';
	$args['orderby'] = 'title';
}
}

if($relatedpost == 'yes') {
	global $post;
 $postterms = wp_get_post_terms( get_the_ID(), $tax, array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all')); 
 $pages = array();
 foreach($postterms as $term) {
	$page =    get_page_by_title( html_entity_decode($term->name), OBJECT, $posttypes );
	$pages[$page->ID] = $page->ID;
	 
 }
if(!empty($pages)){
			$args['post__in'] = $pages;

} else {
$args['post__in'] = array(0);	
}
 
}

//var_dump($args);
//$output .=$displaytype;
// The Query
//$output .= $networkquery . ' '. $whichsite;
if($networkquery == 'yes') {
$original_blog_id = get_current_blog_id(); 
switch_to_blog($whichsite);	

}


$the_query = new WP_Query( $args );

 $count = $the_query->post_count; 
 
 if ($columns == 'default' || $columns == '') {
if ($count % 3 == 0 || 'people' !== get_post_type()) {
$classes = 'vc_col-md-4 vc_col-sm-4 vc_col-xs-12';	
} else{
$classes = 'vc_col-md-3 vc_col-sm-3 vc_col-xs-12';	
} 
}elseif($columns == 'vc_col-md-12') {
	$classes = '';
} elseif($columns == 'no-column') {
	$classes = '';
} else {
	$classes = $columns . ' vc_col-xs-12 ' . $tabletcolumns;
}
$thispageID = get_the_ID();
	global $post;
setup_postdata( get_the_ID() );
$output .= "<div class='".esc_attr( $css_class )."'>";
	if ($showtitle == 'yes') {
if ($headercontainer == 'yes') {
	$output .="<div class='title-header title-header-".$thispageID."'>"; }
		$output .="<h4 class='loop-title'>".$title."</h4>";
$thelink = vc_build_link( $thelink );
if ($showlink == 'yes') {$output .="<a href='".$thelink['url']."' class='btn pull-right'>";
if (!empty($thelink['title'])) {
$output .=$thelink['title'];
} else {
$output .="View All";
}
$output .="</a>";
//var_dump($thelink);
 }
if ($headercontainer == 'yes') {	$output .="</div>"; 
if(!empty($headerbackgroundcolour)) {	
$GLOBALS['styles'] .= " .title-header.title-header-".$thispageID." { background:".$headerbackgroundcolour.";}";	
}
if ($showlink == 'yes') {
if(!empty($headerlinkbackgroundcolour)) {	
$GLOBALS['styles'] .= " .title-header.title-header-".$thispageID." .btn { background:".$headerlinkbackgroundcolour.";}";
}
if(!empty($headerlinkcolour)) {	
$GLOBALS['styles'] .= " .title-header.title-header-".$thispageID." .btn { color:".$headerlinkcolour.";}";
}
}
}
	}
	if($columngrid == 'yes') {  $row = ' vc_row '; }
$output .="<div class='clear clearfix ".$el_id." ".$row."'>";	

$isinternation = get_post_meta($post->ID, '_internationalPage', true);

if ( $the_query->have_posts() ) {
//var_dump($pages);

if($masonry =='yes') {
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
$GLOBALS['script'] .="
	$(window).bind('load', function() {
		 setTimeout(function(){ $('.".$el_id."').isotope(); }, 1000);
		
	});";
}
//$output .="<div class='vc_row mt30'>";
while ($the_query->have_posts() ) : $the_query->the_post();	
if ($thispageID !== $post->ID) {
		
	if($popuplink =='yes') {	
	$containerclass= 'popup-container';
	}
if(!empty($title)) {
}
$output .='<div class="'.$classes .' '.$containerclass.' '.$displaytype.'-item">';
if($popuplink =='yes') {	

if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	
$GLOBALS['script'] .="
	$(document).ready(function() {
		$('.open-popup-link').magnificPopup({
			  type:'inline',
			  midClick: true
		});
	});";
}

if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
	
	$colour = get_post_meta($post->ID, '_pagecolour', true);
	$GLOBALS['styles'] .= ".media.list.media-".get_the_ID()." .cover{ background:".$colour.";}";

	if (!empty($colour)){
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). ". .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";

	  
	   if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT']))
{
    // if IE<=8
    $GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). ".thumbnail-overlay .caption{       background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#80".str_replace('#', '', $colour).",endColorstr=#80".str_replace('#', '', $colour).";}";

}
else
{
   }

$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ /*background:".$colour."; */background:".hex2rgba($colour, 0.5)."}";




	} else {
	$addclass=  'no-col-set';	
	}

if ($featuredimg !== 'date') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$url = $thumb['0'];
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}";

}
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

if($divider== 'yes') {
	$output .="<hr>";

}
$output .="</div>";

if($popuplink =='yes') {	
$output .='<div id="'.get_post_type().'-'.get_the_ID().'" class="white-popup-block mfp-hide animated">';
	require get_template_directory() . '/assets/template-parts/popup/content-popup-'.get_post_type().'.php';
//get_template_part( 'assets/template-parts/popup/content', 'popup-'.get_post_type());
$output .='</div>';
}
}
endwhile;
if($showpagination == 'yes') {
$output .= page_pagination();
}
} else {
$output .='<div class="vc_col-md-12">Sorry, no '.$posttypes.' have been found…</div>';

}
$output .= "</div>";

$output .='</div>';
wp_reset_postdata();

wp_reset_postdata();
if($networkquery == 'yes') {
switch_to_blog( $original_blog_id );	
}
if($masonry =='yes') {
wp_enqueue_style( 'isotope-css' );
wp_enqueue_script( 'isotope' );
}

return $output;

}
add_shortcode( 'subpagegrid', 'subpagegrid_func' );