<?php // Latest News

function publications_func( $atts ) {

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
$ws = 1;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
'post_type'=>'publications',
'order'=>'DESC',
'posts_per_page' => 16,
'paged' => $paged
//'orderby'=>'menu_order'
);
$slug = the_slug();
query_posts($args);
  global $wp_query;
	    $postcount = $wp_query->found_posts;
$count=0;
if(have_posts()) {



$output .= "<div class='vc_row clearfix'>";

while (have_posts()) : the_post();
global $post;

if(($count+1) % 2 != 0){

if(($count) % 4 != 0){
$class= 'white-bar';

} else {
$class= 'grey-bar';
}

$output .= "<div class='".$class."'>";
}

$output .= '<div class="vc_col-md-6">';
$attachment = get_post_meta(get_the_ID(), '_publication', true);

$output .= '<div class="media breifings">';
$output .= '<div class="media-left">';

$output .= '<a href="'.wp_get_attachment_url( $attachment ).'" target="_blank">';

$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>';
 $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';
 $output .= '</a>';

  $output .= '</div>';
  $output .= '<div class="media-body matchHeight">';

  $output .= '<a href="'.wp_get_attachment_url( $attachment ).'" target="_blank">';

  $output .= '<h4 class="media-heading">'.get_the_title().'</h4>';
   $output .= '</a>';
if($showcontent == 'yes') {
$output	.= truncate(get_post_meta($post->ID, '_Overview', true), 80);
}
//  $output .= ' <a href="'.wp_get_attachment_url( $attachment ).'" class="readmore-link" target="_blank">Read More</a>';


if($postmeta== 'yes') {

	$output .= '<div class="post-meta mt10"><div class="dropdown">
  <a class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <i class="icon icon-share"></i> Share
  </a>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';
$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.wp_get_attachment_url( $attachment ).'">
 <span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';
$output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. wp_get_attachment_url( $attachment ).'&amp;title='.str_replace(' ', '%20', $thetitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>
';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.wp_get_attachment_url( $attachment ).'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.wp_get_attachment_url( $attachment ).'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
/*$output .= '<li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url='.wp_get_attachment_url( $attachment ).'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.wp_get_attachment_url( $attachment ).'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';*/

  $output .= '</ul>
</div>';

$output .= "</a></div>";
}

  $output .= '</div>';
  $output .= '</div>';

  $output .= '</div>';

if ($count % 2 != 0) {
$output .= "</div>";
}


$count++;
endwhile;


  $output .= 	"</div><div class='vc_row clearfix'><div class='white-bar'>".page_pagination()."</div></div>";
if($postcount < 10 && $postcount & 1) {
$output .= "</div>";
}

wp_reset_query();
}
return $output;

}
add_shortcode( 'publications', 'publications_func' );
