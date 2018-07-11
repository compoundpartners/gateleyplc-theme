<?php
$output .='<a class="media list '.$linkclass.'" href="'.$link.'">';


$output .='<div  class="media-left '.$linkclass.'">';
if($colourthumbs == 'yes') {
$output .="<div class='cover'></div>";	
}
if (!empty(wp_get_attachment_image( $blockimage, 'shortcode-slide' ))) {
$output .= wp_get_attachment_image( $blockimage, 'shortcode-slide' );
}else {
	$output .="<img class='media-object invisible' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png); background-size:cover;  background-position:center center;}";

	}
	$output .='</div>';

$output .="<div class='media-body'>";	
$output .= '<h4 class="media-heading">'.$blocktitle.'</h4>';
	$output .= $blockcontent;

$output .="</div>";	
$output .="</a>";
?>