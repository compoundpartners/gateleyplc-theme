<?php 	$class = 'thumbnail-overlay';
$colour =get_post_meta(get_the_ID(), '_pagecolour', true);
	if (!empty($colour)){
			$addclass=  'col-set';	

$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
	} else {
	$addclass=  'no-col-set';	
	}
	
$output .='<div class="thumbnail-'.get_the_ID().' thumbnail '.$class . ' ' .$addclass.' matchHeight">';
$output .='<a href="'.get_the_permalink().'">';
if(has_post_thumbnail()) {
if(get_current_blog_id() == 0) {
$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'page-block-thumb');
$imageURL = str_replace('sites/0/','',$image[0]);
$output .= "<img src='".$imageURL."' alt='".get_the_title()."'>";
} else {
$output .=get_the_post_thumbnail(get_the_ID(), "page-block-thumb");
	
}
} else {
$output .= "<img src='".get_template_directory_uri() . "/assets/img/placeholder.png'>";
}

$output .='<div class="caption">';
$output .='<h3>';
$output .=$thetitle;
$output .='</h3>';
//$output .=wpb_js_remove_wpautop(get_post_meta($post->ID, "_cepageintro", true), true);
$output .='</div>';
$output .='</a>';
$output .='</div>';