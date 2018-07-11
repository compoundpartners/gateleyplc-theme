<?php /* ======== ======== ======== ======== ======== ======== */
/* Spotlight Feed									  */	
/* ======== ======== ======== ======== ======== ======== */
function relatedcontacts_func( $atts ) {
extract( shortcode_atts( array(
'title' => '{$title}',
'tax' => '{$tax}',
'css' => '{$css}',
'relatedpost' => '{$relatedpost}',
'showregion' => '{$showregion}'

), $atts ) );
wp_reset_query(); wp_reset_postdata();
$output;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

//$output .= '<div class="feed-wrapper blog-feed">';
    $slug = get_the_title();
    $slug = strip_tags($slug);
     $slug = str_replace(' ', '-',  $slug );
$args['post_type'] ='people';

if($relatedpost == 'taxquery') {

	$args['tax_query'] = array(
		array(
			'taxonomy' => $tax,
			'field'    => 'slug',
			'terms'    =>  the_slug(),
		),
	);

} elseif($relatedpost == 'pagetaxquery') {
	global $post;
 $postterms = wp_get_post_terms( get_the_ID(), $tax, array('orderby' => 'menu_order', 'order' => 'ASC', 'fields' => 'all')); 
 $pages = array();
 foreach($postterms as $term) {
	$page =    get_page_by_title( html_entity_decode($term->name), OBJECT, 'people' );
	$pages[$page->ID] = $page->ID;
	echo "<script> </script>";
	 
 }
	
$args['order'] = 'ASC';

 
}
$the_query = new WP_Query( $args );
$output .= "<div class='".esc_attr( $css_class )."'>";

$id = 'spotlight-'.rand().'-slider';

if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
		$i = 1;

$output .= ' <h4 class="contact-title">'.$title.'</h4> ';
if ( $the_query->have_posts() ) {

$output .= '<div class="swiper-container spotlight-slider" id="'.$id.'">';
$output .= '<div class="swiper-wrapper">';
// The Loop
$count = $the_query->found_posts;
	
	if($relatedpost == 'pagetaxquery') {
	global $post;
	$split = get_option('thisissite');
if($split == 'gateley-plc') {
 $theorder =	'ASC';
} else {
	 $theorder =	'DESC';
}

 $postterms = wp_get_post_terms( get_the_ID(), $tax, array('orderby' => 'menu_order', 'order' => $theorder, 'fields' => 'all')); 
 $pages = array();
 foreach($postterms as $term) {
	$page =    get_page_by_title($term->name, OBJECT, 'people' );
	//echo $term->name;
	$output .= '<div class="swiper-slide slide-'.$i.'">';
		if ($count == 1) {
			$mediablock = 'media medialist media-person';
			$thumbnailclass = 'media-object ';
			$mediablockcaption = 'media-body';
			$mediaimgblock = 'media-left';

		} else {
			$mediablock = 'thumbnail spotlight';
			$thumbnailclass = 'img-responsive';
			$mediablockcaption = 'caption';
						$mediaimgblock = 'thumbnail-img';


		}
		$output .= '<div class="'.$mediablock .' matchHeightSlider" >';
		  $output .= '<a  href="'.get_the_permalink($page->ID).'"><div class="'.$mediaimgblock.'">';
		$output .= get_the_post_thumbnail($page->ID, 'thumbnail', array('class' => $thumbnailclass, 'alt' => get_the_title($page->ID)));
				  $output .= '</div></a>';

  $output .= '<div class="'.$mediablockcaption.'">';
  $output .= '<a  href="'.get_the_permalink($page->ID).'"><h4 class="media-heading">'.get_the_title($page->ID).'</h4><hr /></a>';
  if( get_post_meta($page->ID, 'regions', true) && $showregion == 'yes') { 
		$output .=  "<small>".get_post_meta($page->ID, 'regions', true)."</small><br>";
  }
  //$output .= strip_shortcodes(get_the_content());
 
if(get_post_meta($page->ID, '_personEmail', true)) {
	$myvalue = get_the_title($page->ID);
	$arr = explode(' ', trim($myvalue));
	
$output .= '<a href="mailto:'.get_post_meta($page->ID, '_personEmail', true).'"><strong>Email '.$arr[0].'</strong></a><br>
';
}
if( get_post_meta($page->ID, '_personNumber', true)) { 

$output .=  "Direct Telephone: <br>
<span class='telephone'> ".get_post_meta($page->ID, '_personNumber', true)."</span>";
 } 
/* if(!is_user_logged_in()) {
$output .= truncate(strip_tags(  get_post_meta($page->ID, '_Overview', true) ),50);
  } else {
 }*/
  
  
  $output .= '</div>';
  $output .= '</div>';	
	  $output .= '</div>';
$i++;
	 
 }
	} else {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$output .= '<div class="swiper-slide">';
		if ($count == 1) {
			$mediablock = 'media medialist media-person';
			$thumbnailclass = 'media-object ';
			$mediablockcaption = 'media-body';
			$mediaimgblock = 'media-left';

		} else {
			$mediablock = 'thumbnail spotlight';
			$thumbnailclass = 'img-responsive';
			$mediablockcaption = 'caption';
						$mediaimgblock = 'thumbnail-img';


		}
		$output .= '<a class="'.$mediablock .' matchHeightSlider" href="'.get_the_permalink(get_the_ID()).'" >';
		  $output .= '<div class="'.$mediaimgblock.'">';
		$output .= get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => $thumbnailclass));
				  $output .= '</div>';

  $output .= '<div class="'.$mediablockcaption.'">';
  $output .= '<h4 class="media-heading">'.get_the_title().'</h4><hr />';
  //$output .= strip_shortcodes(get_the_content());
$output .= truncate(strip_tags(  get_post_meta(get_the_ID(), '_Overview', true) ),50);
  
  
  $output .= '</div>';
  $output .= '</a>';	
	  $output .= '</div>';
$i++;

	
	}
 }
	
	
	if ($count == 1) {
		$slidesperview	= 1;
	} else {
		$slidesperview = 2;
	}
	
$GLOBALS['script'] .= "jQuery(function($) {
	var ".str_replace("-", "", $id)."Swiper = new Swiper('#".$id.".swiper-container', {
    speed: 400,
    slidesPerView: ".$slidesperview.",
     nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    breakpoints: {
    500: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 2,
    },
    980: {
      slidesPerView: 1,
    },
    1024: {
      slidesPerView: ".$slidesperview.",
    }
    }
   
});
 });";
	$output .= "</div>";

	$output .= '<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>';


	$output .= "</div>";
} else {
	// no posts found
 $output .='<div class="text-white mb20">Sorry, no contacts have been found…</div>';

}

$output .= '</div>';

return $output;
wp_reset_query(); wp_reset_postdata();

}
add_shortcode( 'relatedcontacts', 'relatedcontacts_func' );