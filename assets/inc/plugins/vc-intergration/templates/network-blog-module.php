<?php // Latest News 

function networkblogfeed_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'title' => '{$title}',
'showcontent' => '{$showcontent}',
'blogurl' => '{$blogurl}',
'postmeta' => '{$postmeta}',
'whichsite' => '{$whichsite}',

), $atts ) );
$output;
wp_reset_query();
$original_blog_id = get_current_blog_id(); 
switch_to_blog($whichsite);	
global $post;
if ($whichsite == 0) {
	$blognews = 'news';
} else {
		$blognews = 'blog';

}
$output .= '<div class="'.$blognews.'-header"> '. $title .'<a href="'.$blogurl.'" class="feed-btn" target="_blank">View All</a>
</div>';
$output .= '<div class="feed-wrapper '.$blognews.'-feed feed-match-height">';
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
$output .= '<div class="media">';
$output .= '<div class="media-left">';

$output .= '<a href="'.get_the_permalink().'">';

$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  
 $output .= '</a>';

  $output .= '</div>';
  $output .= '<div class="media-body">';
  $output .= '<a href="'.get_the_permalink().'">';

  $output .= '<h4 class="media-heading">'.get_the_title().'</h4>';
   $output .= '</a>';
if($showcontent == 'yes') {
	//$output	.= '<span class="hidden-sm">';
	
	if(!empty(get_post_meta(get_the_ID(), '_Overview', true))) { 
$content	= strip_tags(get_post_meta(get_the_ID(), '_Overview', true));
	} else { 
	$content = strip_tags(get_the_excerpt());

	}
	
	$output	.=  truncate($content, 80);
	//	$output	.= '</span>';

}
  $output .= ' <a href="'.get_the_permalink().'" class="readmore-link">Read More</a>';



if($postmeta== 'yes') {
	
	$output .= '<div class="post-meta mt10"><div class="dropdown">
  <button class="btn btn-link dropdown-toggle" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"><span class="sr-only">Share</span></em> Share
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

$output .= '</a><span class="views"><em class="icon icon-eye"><span class="sr-only">Views</span></em>'.(my_get_post_views()).'</span><span class="comments"><em class="icon icon-comment"><span class="sr-only">Comments</span></em>'.get_comments_number()." Comment<small>(s)</small></span></div>";
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
switch_to_blog( $original_blog_id );	

return $output;

}
add_shortcode( 'networkblogfeed', 'networkblogfeed_func' );
