<?php $output .='<div class="media media-'.get_post_type().' '.get_post_type().' white '.$displaytype.'  media-'.get_the_ID().' '.esc_attr( $css_class ).'">';

$output .='<a  href="'.$link.'"  class="media-left '.$linkclass.' builder-block">';
if (!empty(wp_get_attachment_image($blockimage, 'shortcode-slide' ))) {
$output .= wp_get_attachment_image( $blockimage, 'thumbnail', false, array(	'class'	=> "media-object"));
}else {
	$output .="<img class='media-object invisible' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png); background-size:cover;  background-position:center center;}";

	}
$output .='</a>';
$output .='<div class="media-body matchHeight">';
$output .='<a  href="'.$link.'" class="'.$linkclass.'" >';
$output .= '<h4 class="media-heading">'.$blocktitle.'</h4>';
if(!empty($blockcontent)) {
	$output .=  wpb_js_remove_wpautop( $blockcontent, true ) ;
}
$output .='</a>';
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