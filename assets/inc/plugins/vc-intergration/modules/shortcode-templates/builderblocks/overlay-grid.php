<?php 	$class = 'thumbnail-overlay';


   

$output .='<div class="thumbnail-'.get_the_ID().' thumbnail '.$class . ' ' .$addclass.'">';
$output .='<a href="'.$link.'">';

if (!empty(wp_get_attachment_image( $blockimage, 'shortcode-slide' ))) {
$output .= wp_get_attachment_image( $blockimage, 'shortcode-slide' );
}else {
	$output .="<img class='media-object invisible' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png); background-size:cover;  background-position:center center;}";

	}
	
	

$output .='<div class="caption">';
$output .='<h3>';
$output .= ''.$blocktitle.'';
$output .='</h3>';
//$output .=wpb_js_remove_wpautop(get_post_meta($post->ID, "_cepageintro", true), true);
$output .='</div>';
$output .='</a>';
$output .='</div>';