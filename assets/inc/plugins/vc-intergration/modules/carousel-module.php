<?php 
// Carousel
function carousel_shortcode($atts, $content) { 

global $post; 
extract(shortcode_atts(array( 
"title" => 'title',
'showtitle' => '{$showtitle}',

"el_id" => 'carousel-'.$post->ID.'-'.rand(),
"slider_time" => '{$slider_time}',
"blockpagination" => '{$blockpagination}',
"showarrows" => '{$showarrows}',
"showpagination" => '{$showpagination}',
"slides_per_view" => '{$slides_per_view}',
"transition_effect" => '{$transition_effect}',
"transition_direction" => '{$transition_direction}',
"keyboardControl" => '{$keyboardControl}',
"mousewheelControl" => '{$mousewheelControl}',
"loop" => '{$loop}',
"hashnav" => '{$hashnav}',
"space_between" => "{$space_between}",
'css' => ''

), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
  
$output = '';
$output .= '<div class="'.esc_attr( $css_class ).'">';


if ($showtitle == 'yes')
$output .= "<h4>".$title."</h4>";

$output .= '<div class="swiper-container " id="'.$el_id.'">';
$output .= '<div class="swiper-wrapper">';
$output .= do_shortcode("$content");
$output .= ' </div>';
if ($blockpagination == 'no') {
 $addclass= 'standard';
}
if ($showpagination !== 'no') {
$output .= '<div class="swiper-pagination '.$addclass.'"></div>';
}
    if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT'])){
$output .= '<div class="iepagination '.$addclass.'"></div>';
    }
if ($showarrows !== 'no') {
$output .= '<div class="swiper-prev-button"><em class="icon icon-angle-left"><span class="sr-only">Left</span></em></div>';
$output .= '<div class="swiper-next-button"><em class="icon icon-angle-right"><span class="sr-only">Right</span></em></div>';
}
$output .= '</div>';
$output .= '</div>';

if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
$GLOBALS['script'] .= "jQuery(function($) {var mySwiper = new Swiper('#".$el_id.".swiper-container', {";

if($transition_effect == "fade" || $transition_effect == "cube" || $transition_effect == "coverflow") {
	$GLOBALS['script'] .= "'effect' : '".$transition_effect."',";
}
if($keyboardControl == 'yes') {
		$GLOBALS['script'] .= "'keyboardControl' : true,";
}
if(!empty($slider_time)) {
    if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT'])){

    } else {
	$speed = $slider_time*1000;
	$GLOBALS['script'] .= "'autoplay' : '".($slider_time*1000)."',";
	$GLOBALS['script'] .= "'autoplayStopOnLast' : true,";
    }
    
	
}

if(is_numeric($slides_per_view)) {
		$GLOBALS['script'] .= "'slidesPerView' : '".$slides_per_view."',";

}

if(is_numeric($space_between)) {
		$GLOBALS['script'] .= "'spaceBetween' : '".$space_between."',";

}
if($loop == 'yes') {
			$GLOBALS['script'] .= "'loop' : true,";

}
if ($showarrows !== 'no') {
 $GLOBALS['script'] .= "nextButton: '.swiper-next-button',
    prevButton: '.swiper-prev-button',";
    
    
}
if($transition_direction == 'vertical') {
		$GLOBALS['script'] .= "'direction' : '".$transition_direction."',";

}
	$GLOBALS['script'] .= "'pagination' : '.swiper-pagination',
	//'paginationClickable' : true,
	";
	
	if ($blockpagination !== 'no') {
	$GLOBALS['script'] .= " paginationBulletRender: function(index, className) {
        var slidesName = [];
        var slidesIntro = [];
	   var slidesID = [];
	   var slidesLink = [];
	   var slidesLinktarget = [];

        jQuery('#".$el_id.".swiper-container .swiper-slide').each(function() {
            slidesName.push(jQuery(this).data('title'));

            slidesIntro.push(jQuery(this).data('intro'));
		  slidesID.push(jQuery(this).attr('id'));
		  slidesLink.push(jQuery(this).data('link'));
		  var variable = jQuery(this).data('target');
		if (variable){
		  slidesLinktarget.push(jQuery(this).data('target'));
		  } else {
			   slidesLinktarget.push('_self');
		  }		 



        });
	     if (jQuery(slidesName).length > 1) { jQuery('.category-navigation').show(); } else {  jQuery('.category-navigation').hide();}
        return '<div class=\"' + className +  '\" id=\"' + slidesID[index]+'-pagination' +  '\"><div class=\"pagination-inner\"><div class=\"pagination-content\"><a href=\"'+ slidesLink[index]+'\" target=\"'+ slidesLinktarget[index]+'\">' + '<h3>' + slidesName[index].replace('-', ' ') + '</h3>' + '<span class=\"swiper-pagination-intro\">' + slidesIntro[index].replace('-', ' ') + '</span></a></div></div></div>';
	  
    },"; 
	}
	
	$GLOBALS['script'] .= "onInit: function(index, className){ 
		
	var arrowcol = jQuery('.swiper-slide-active').data('arrow-color');	
	if(arrowcol !== '{$arrowcolor}') {
		jQuery('.swiper-next-button').removeAttr( 'style' );
		jQuery('.swiper-prev-button').removeAttr( 'style' );
	jQuery('.swiper-prev-button, .swiper-next-button').css({color: arrowcol});
	
	} else {
		jQuery('.swiper-next-button').removeAttr( 'style' );
		jQuery('.swiper-prev-button').removeAttr( 'style' );

	}
	$('.gateley-menu-fw').on('show.bs.dropdown', function() {
 mySwiper.stopAutoplay();
}); 

$('.gateley-menu-fw').on('hidden.bs.dropdown', function() {
 mySwiper.startAutoplay(); 
}); 




 
	},";
	$GLOBALS['script'] .= "onSlideChangeEnd: function(index, className){
		
	var arrowcol = jQuery('.swiper-slide-active').data('arrow-color');	
	if(arrowcol !== '{$arrowcolor}') {
		jQuery('.swiper-next-button').removeAttr( 'style' );
		jQuery('.swiper-prev-button').removeAttr( 'style' );
	jQuery('.swiper-prev-button, .swiper-next-button').css({color: arrowcol});
	
	} else {
		jQuery('.swiper-next-button').removeAttr( 'style' );
		jQuery('.swiper-prev-button').removeAttr( 'style' );

	}
		
	}";

$GLOBALS['script'] .= " });";

    if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT'])){
  $GLOBALS['script'] .= "
 

        jQuery('#".$el_id.".swiper-container .swiper-slide').each(function(index) {
      
var content = jQuery('<div class=\"pagination-bullet\" id=\"' + jQuery(this).attr('id')+'-pagination' +  '\"><div class=\"pagination-inner\"><div class=\"pagination-content\"><a href=\"'+ jQuery(this).data('link')+'\" target=\"'+ jQuery(this).data('target')+'\">' + '<h3>' + jQuery(this).data('title').replace('-', ' ') + '</h3>' + '<span class=\"swiper-pagination-intro\">' + jQuery(this).data('intro').replace('-', ' ') + '</span></a></div></div></div>');

jQuery('#".$el_id.".swiper-container .swiper-pagination').append(content);
        });";
    }
	if ($blockpagination !== 'no') {

 $GLOBALS['script'] .= "//jQuery('#".$el_id.".swiper-container .swiper-pagination .swiper-pagination-bullet').matchHeight();
  $('.swiper-pagination').addClass('swiper-block' );
 var c = $( '#".$el_id.".swiper-container .swiper-slide' ).length;
 $('.swiper-pagination').addClass('bullet-count-'+ c );";
 
}
 $GLOBALS['script'] .= "  });";
	if ($blockpagination !== 'no') {

 $GLOBALS['script'] .= "jQuery(window).resize(function() {
	 jQuery('#".$el_id.".swiper-container .swiper-pagination .swiper-pagination-bullet').matchHeight();
 });";




	}

return $output;
}
add_shortcode('carousel', 'carousel_shortcode'); 