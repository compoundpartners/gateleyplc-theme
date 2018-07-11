<?php // Latest News 

function latestnews_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'title' => '{$title}',
'showcontent' => '{$showcontent}',
'newsurl' => '{$newsurl}',
'postmeta' => '{$postmeta}'
), $atts ) );
$output;
wp_reset_query();
global $post;

$output .= '<div class="news-header"> '. $title .'<a href="'.get_permalink(get_option("newspage")).'" class="feed-btn" target="_blank">View All</a>
</div>';
$output .= '<div class="feed-wrapper news-feed feed-match-height">';
$ws = 1;
$args = array(
'post_type'=>'post',
'order'=>'DESC',
'posts_per_page' => 2
//'orderby'=>'menu_order'
);
$slug = the_slug();
query_posts($args); 
$count=0;
if(have_posts()) {  query_posts($args); 
while (have_posts()) : the_post(); 
global $post;
$output .= '<div class="media">';
$output .= '<div class="media-left">';

$output .= '<a href="'.get_the_permalink().'/#date-link">';
$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  
 $output .= '</a>';
  $output .= '</div>';
  
  $output .= '<div class="media-body">';
  $output .= '<a href="'.get_the_permalink().'/#content">';

  $output .= '<h4 class="media-heading">'.get_the_title().'</h4>';
   $output .= '</a>';
if($showcontent == 'yes') {
		//$output	.= '<span class="hidden-sm">';

	$content = strip_tags(get_post_meta($post->ID, '_Overview', true));
$output	.= truncate($content, 80);
	//$output	.= '</span>';

}
  $output .= ' <a href="'.get_the_permalink().'/#button" class="readmore-link">Read More <span class="sr-only">about '.get_the_title().'</span></a>';



if($postmeta== 'yes') {
	
	$output .= '<div class="post-meta mt10"><div class="dropdown">
  <a class="btn btn-link dropdown-toggle"  id="ShareMenu-'.$count.'-'.$post->ID.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"></em> Share
  </a>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'-'.$post->ID.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';

$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <small class="sr-only">email</small></a> </li>';

$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <small class="sr-only">facebook</small> </a> </li>';



$output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thetitle).'" target="_blank"> <span class="icon-social-linkedin"></span> <small class="sr-only">linkedin</small> </a> </li>
';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" target="_blank"> <span class="icon-social-twitter"> </span> <small class="sr-only">twitter</small> </a></li>';


$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <small class="sr-only">google+</small> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$output .= '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <small class="sr-only">pinterest</small> </a> </li>';
 
  $output .= '</ul>
</div>';

$output .= '<span class="views"><em class="icon icon-eye"></em>'.(my_get_post_views())."</span></div>";
}
  $output .= '</div>';
  $output .= '</div>';	
  if($count !== 1) {
  $output .= '<hr>';	
  }

$count++;
endwhile;
wp_reset_query();
}
$output .= "</div>";
return $output;

}
add_shortcode( 'latestnews', 'latestnews_func' );
