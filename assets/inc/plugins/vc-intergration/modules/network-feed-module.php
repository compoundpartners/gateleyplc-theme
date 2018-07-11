<?php // Latest News 

function networkfeed_func( $atts ) {

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

//$output .= '<div class="news-header"> '. $title .'<a href="'.get_permalink(get_option("newspage")).'" class="feed-btn" target="_blank">View All</a></div>';

$output .= '<div class="absolute-feed">';

$output .= '<div class=" news-feed container">';
$output .= '<div class="vc_col-lg-4 vc_col-lg-offset-8 vc_col-md-4 vc_col-md-offset-8 ">';

$ws = 1;
$theposts = as_latest_posts(3,12);

foreach($theposts as $p) {
$output .= '<div class="media">';
$output .= '<div class="media-left">';

//$output .= '<a href="'.$p['permalink'].'">';
$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime($p['date'])).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime($p['date'])).'</span></div>';  
// $output .= '</a>';
  $output .= '</div>';
  
  $output .= '<div class="media-body">';
  $output .= '<a href="'.$p['permalink'].'">';

  $output .= '<h4 class="media-heading">'.$p['title'].'</h4>';
//   $output .= '</a>';

//  $output .= ' <a href="'.$p['permalink'].'" class="readmore-link">Read More</a>';

  $output .= 'Read More</a>';



	
  $output .= '</div>';	

  $output .= '</div>';	

$count++;

wp_reset_query();
}
$output .= "</div>";

$output .= "</div>";
$output .= "</div>";

if(is_user_logged_in()){}

return  $output;
}
add_shortcode( 'networkfeed', 'networkfeed_func' );
