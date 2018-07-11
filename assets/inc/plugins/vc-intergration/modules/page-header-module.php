<?php
// Page Header
function pageheader_shortcode($atts, $content) { 

global $post; 
extract(shortcode_atts(array( 
"title" => '{$title}',
"el_class" => '{$el_class}',
"isoverlay" => '{$isoverlay}',
"showbreadcrumbs" => '{$showbreadcrumbs}',
"backgroundimage" => '{$backgroundimage}',
"backgroundcolour" => '{$backgroundcolour}'
), $atts));  


if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	$colour = $backgroundcolour;
	
	$backgroundimg = wp_get_attachment_image_src( $backgroundimage, 'header-image-cropped' );
	
	if (empty($backgroundimg)) {
			$backgroundimg = get_the_post_thumbnail($post->ID, 'header-img-cropped');
	} else {
	$GLOBALS['styles'] .= ".page-header-".get_the_ID(). "{ background:url(".$backgroundimg[0].") !important;}";
	}
	$colourcode = ltrim($colour, '#');
	
	
	if (!empty($colour) && 	ctype_xdigit($colourcode)){

$GLOBALS['styles'] .= ".page-id-".get_the_ID()." .page-header-".get_the_ID(). " .cover{ background:".$colour."; background:".hex2rgba($colour, 0.9)."; background-size:cover;}";
//$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
	} else {
	$addclass=  'no-col-set';	
	}


	if(!empty($backgroundimg)){
$hasthumb = 'has-post-thumbnail';
	} else {
	$hasthumb = '';	
	}
	
	if($isoverlay == 'yes') {
		$padclass= 'vertical-height-no-overlay';
	} else {
		$padclass= 'vertical-height';
	}
$output = '';
$output .= "<header class='page-header page-header-".get_the_ID()." ".$hasthumb." ".$el_class." ".$padclass."'>";
$output .= "<div class='cover'>";

$output .= "<div class='container'>";
$output .= '<div class="clearfix"><h1 class="entry-title">'.get_the_title().'</h1>';
$output .= the_breadcrumb()."</div>";
$output .= do_shortcode("$content");
$output .= "</div>";
$output .= "</div>";
$output .= "</header>";

return $output;
}
add_shortcode('pageheader', 'pageheader_shortcode'); 