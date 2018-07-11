<?php 
// Carousel Items
function carouselitem_shortcode($atts) {  
global $post;
extract(shortcode_atts(array( 
"title" => 'title',
"caption_active" => '{$caption_active}',
"sliderimg" => '{$sliderimg}',
"caption_tag" => "{$caption_tag}",
"caption_title" => "{$caption_title}",
"caption_text" => '{$caption_text}',
"caption_show" => '{$caption_show}',
"slideintro" => '{$slideintro}',
"slidecol" => '{$slidecol}',
"slidecolaaa" => '{$slidecolaaa}',
"arrowcolor" => '{$arrowcolor}',
"captionstyle" => '{$captionstyle}',
"el_id" => 'carousel-item-'.$post->ID.'-'.uniqid(),
"paginationimg" => '{$paginationimg}',
"paginationlink" => '{$paginationlink}',
"hasoverlay" => '{$hasoverlay}',

"slidetextcol" => '{$slidetextcol}',
'css' => ''
), $atts));  
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
$content;
if ($captionstyle == 'boxed') {
	$captionstyles = 'boxed';
}
if ($caption_show == '1') {  $content .= "<div class='carousel-caption container ".$captionstyles."'>";
if ($captionstyle == 'boxed') {
$content .= "<div class='text-block matchHeight'>";	
}
$content .= "<span class='badge'>".$caption_tag."</span><h2>".$caption_title."</h2>";
if ($caption_text !== " ") {
$content .= "<h4>".wpb_js_remove_wpautop($caption_text)."</h4>";
}
if ($captionstyle == 'boxed') {
$content .= "</div>";	
}
$content .= "</div>";}
$imgurl = wp_get_attachment_image_src($sliderimg, "full");
//$content .= '<a href="'.$imgurl[0].'" data-number="'.$count.'" class="prettyphoto">';
$content .= wp_get_attachment_image( $sliderimg, 'shortcode-slide', false, array('class' => 'img-responsive') );

//$content .= "</a>";
if ($caption_active == '1') { $active = 'active'; }

if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
$GLOBALS['styles'] .= '#'.$el_id." .badge, #".$el_id."-pagination .pagination-inner {background-color:".$slidecol.";}";

if ($captionstyle == 'boxed') {


	
//$GLOBALS['styles'] .= '#'.$el_id." .text-block {background-color:".hex2rgba($slidecol, 0.6).";}";
//	$GLOBALS['styles'] .= '@media (max-width: 767px) { #'.$el_id." .text-block {background-color:".$slidecol.";} }";

}
$paginationimage =  wp_get_attachment_url($paginationimg);
if(empty($paginationimage)) { $paginationimage=  wp_get_attachment_url($sliderimg) ;}

if(!empty($paginationimage)) { 
$GLOBALS['styles'] .= "#".$el_id."-pagination .pagination-inner  {background-image:url(".$paginationimage.");}";
}

if(!empty($slidetextcol)) {
	$GLOBALS['styles'] .= "#".$el_id." h2 {color:".$slidetextcol.";}";
}
$ishex = str_replace('#', '', $slidecolaaa);
if(ctype_xdigit($ishex)) {
$GLOBALS['styles'] .= ".accessAA #".$el_id."-pagination .pagination-inner .pagination-content {background-color:". hex2rgba($slidecolaaa, 0.8).";}"
;

$GLOBALS['styles'] .= ".accessAA #".$el_id." .badge, .accessAAA  #".$el_id."-pagination .pagination-inner {background-color:". $slidecolaaa.";}"
;



}

	
$GLOBALS['styles'] .= "#".$el_id."-pagination .pagination-inner .pagination-content {background-color:". hex2rgba($slidecol, 0.9).";}";
$GLOBALS['styles'] .= "#".$el_id."-pagination .pagination-inner .pagination-content:hover {background-color:". hex2rgba($slidecol, 0.6).";}";


	$thelink = vc_build_link( $paginationlink );
$link = $thelink['url'];
$target = $thelink['target'];
if(empty($target)) {
	$target = '_self';

}
$theslide;
if($hasoverlay == 'yes') {
//$swiperClass = 'swiper-large';
}
$theslide .= '<div class="swiper-slide '.$swiperClass.' '.esc_attr( $css_class ).'" id="'.$el_id.'" data-intro="'.$slideintro.'" data-title="'.$caption_tag.'" data-colour="'.$slidecol.'" data-arrow-color="'.$arrowcolor.'" data-link="'.$link.'" data-target="'.$target.'">';
if($hasoverlay == 'yes') {$theslide .= "<div class='cover'></div>";}
if(!empty($link)) { $theslide .= '<a href="'.$link.'" target="'.$target.'">'; }
$theslide .= $content;
if(!empty($link)) { $theslide .='</a>'; }
$theslide .= '</div>';

return $theslide;
}

add_shortcode('carouselitem', 'carouselitem_shortcode'); 