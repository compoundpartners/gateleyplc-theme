<?php

if($popuplink =='yes') {	

$link = "#".get_post_type().'-'.get_the_ID(); $linkclass= "open-popup-link";
} else {
$link = get_the_permalink();	
}


$output .='<a class="media list media-'.get_the_ID().' '.$linkclass.'" href="'.$link.'">';

$output .="<div class='media-left'>";	
if($colourthumbs == 'yes') {
$output .="<div class='cover'></div>";	
}
if (has_post_thumbnail() && $featuredimg !== 'date') {
$output .=get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'media-object'));
} else {
	if(get_post_type() == 'post') {
$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  
 
	}elseif( get_post_type() == 'event' ) {
 $output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_post_meta(get_the_ID(), '_event_start_date', true))).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime(get_post_meta(get_the_ID(), '_event_start_date', true))).'</span></div>';  
 
 	}else {
	$output .="<div class='media-object placeholder-block placeholder-small'><i class='icon icon-photo'></i></div>";
	}

}
$output .="</div>";	
$output .="<div class='media-body'>";	
$output .="<h5>". $thetitle."</h5>";
/*if($showcontent == 'yes') {
$content = get_the_content();
$output .=truncate($content,100); 
}*/
if($showcontent == 'yes') {
$output	.= get_post_meta(get_the_ID(), '_Overview', true);
}

if($postmeta== 'yes') {
	
	$output .= '<div class="post-meta mt10"><div class="dropdown">
  <button class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <i class="icon icon-share"></i> Share
  </button>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';
$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';
$output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thetitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>
';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$output .= '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';
 
  $output .= '</ul>
</div>';

$output .= '</a><i class="icon icon-eye"></i>'.(my_get_post_views()).'<i class="icon icon-comment"></i>'.get_comments_number()." Comment<small>(s)</small></div>";
}

$output .="</div>";	
$output .="</a>";
?>