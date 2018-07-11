<?php /* ======== ======== ======== ======== ======== ======== */
/* Spotlight Feed									  */	
/* ======== ======== ======== ======== ======== ======== */
function spotlightfeed_func( $atts ) {
extract( shortcode_atts( array(
'title' => '{$title}',

), $atts ) );

$output;

//$output .= '<div class="feed-wrapper blog-feed">';
$i = 0;



			
		
$args = array(
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'spotlight',
			'field' => 'name',

			'terms'    => 'In Spotlight',
		),
		array(
			'taxonomy' => 'gateley_plc_or_hbj_gateley',
			'field' => 'slug',

			'terms'    => get_option('thisissite'),
		),
	),
);
$id = 'spotlight-'.rand().'-slider';

if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
$GLOBALS['script'] .= "jQuery(function($) {
	
	var ".str_replace("-", "", $id)."Swiper = new Swiper('#".$id.".swiper-container', {
    speed: 400,";
	$the_query = new WP_Query( $args );
// The Loop
if ( $the_query->have_posts() ) {
	$postcount = $the_query->found_posts;
	if($postcount > 1) {
		$GLOBALS['script'] .= "autoplay: 5000,";

	}
	}
	
	
	
$GLOBALS['script'] .= "});   
});";
$output .= '<div class="feed-header">'. $title .'</div>';
$output .= '<div class="feed-match-height feed-wrapper spotlight-wrapper">';
$output .= '<div class="swiper-container spotlight-slider " id="'.$id.'">';
$output .= '<div class="swiper-wrapper ">';
$the_query = new WP_Query( $args );
// The Loop
if ( $the_query->have_posts() ) {
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		$output .= '<div class="swiper-slide">';

		$output .= '<div class="thumbnail spotlight " >';
		if(has_post_thumbnail()) {
		$output .= '<a href="'.get_the_permalink(get_the_ID()).'">';
		$output .= get_the_post_thumbnail(get_the_ID(), 'thumbnail');
				$output .= '</a>';
		}

  $output .= '<div class="caption">';
  		$output .= '<a href="'.get_the_permalink(get_the_ID()).'">';

  $output .= '<h4 class="media-heading">'.get_the_title().'</h4><hr />';
  //$output .= strip_shortcodes(get_the_content());
$output .= truncate(strip_tags(  get_post_meta(get_the_ID(), '_Overview', true) ),45);
  
				//$output .= '</a>';

  $output .= ' <span class="readmore-link">Read More <span class="sr-only">about '.get_the_title().'</span></span></a>';



	
	$output .= '<br>
<div class="post-meta btn-group mt10 clearfix"><div class="dropdown">
  <a class="btn btn-link dropdown-toggle" id="ShareMenu-'.$count.'-'.$post->ID.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"><span class="sr-only">Share</span></em> <small>Share</small>
  </a>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'-'.$post->ID.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';

$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <small class="sr-only">email</small> </a> </li>';
$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <small class="sr-only">facebook</small> </a> </li>';
$output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thetitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <small class="sr-only">linkedin</small> </a> </li>
';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <small class="sr-only">twitter</small> </a> </li>';
$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <small class="sr-only">google+</small> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );


$output .= '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <small class="sr-only">pinterest</small> </a> </li>';
 
  $output .= '</ul>';
  $output .= '</div>';
$output .= '<span class="btn btn-link"><em class="icon icon-eye"><span class="sr-only">Views</span></em>'.(str_replace('Views', '', my_get_post_views()))."</span></div>";
$output .= '</div>';
  $output .= '</div>';	
	  $output .= '</div>';

	
	}
} else {
	// no posts found
 

}

$output .= "</div></div>";
$output .= '</div>';


return $output;

}
add_shortcode( 'spotlightfeed', 'spotlightfeed_func' );