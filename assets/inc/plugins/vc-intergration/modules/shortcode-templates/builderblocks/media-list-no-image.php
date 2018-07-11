<?php $output .='<div class="media media-'.get_post_type().' '.get_post_type().' white '.$displaytype.'  media-'.get_the_ID().' ">';

$output .='<div class="media-body matchHeight no-image">';
$output .='<a  href="'.$link.'" class="'.$linkclass.'" >';
$output .= '<h4 class="media-heading">'.$blocktitle.'</h4>';

	$output .= $blockcontent;

$output .='</div>';
$output .='</div>';
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
	
	$colour = get_post_meta($post->ID, '_pagecolour', true);
	if (!empty($colour)){
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
	} else {
	$addclass=  'no-col-set';	
	}
	?>