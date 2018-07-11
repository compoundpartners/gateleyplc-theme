<?php
/* ======== ======== ======== ======== ======== ======== */
/* Blog Feed									  */	
/* ======== ======== ======== ======== ======== ======== */
function blogfeed_func( $atts ) {
extract( shortcode_atts( array(
'title' => '{$title}',
'feedurl' => '{$feedurl}',
'blogurl' => '{$blogurl}',
'postmeta' => '{$postmeta}'

), $atts ) );

$output;
$output .= '<div class="blog-header"> '. $title .'<a href="'.$blogurl.'" class="feed-btn" target="_blank">View All</a>
</div>';
$output .= '<div class="feed-wrapper blog-feed">';
$xml;

$xml = simplexml_load_file($feedurl);
$i = 0;
foreach($xml->channel->item as $item)

{
 // display data code goes here
 
$output .= '<a class="media" href="'.$item->guid.'" target="_blank">';
$output .= '<div class="media-left">';
  $output .=  "<span class='day'>".date('d', strtotime($item->pubDate)).'</span>'; 
    $output .=  "<span class='month'>".date('M', strtotime($item->pubDate)).'</span>';  
 
  $output .= '</div>';
  $output .= '<div class="media-body">';
  $output .= '<h4 class="media-heading">'.$item->title.'</h4>';
   $output .= truncate(strip_tags($item->description),80);
   if($postmeta== 'yes') {
$output .= '<div class="post-meta mt5"><em class="icon icon-share"><span class="sr-only">Share</span></em>Share <em class="icon icon-eye"><span class="sr-only">Views</span></em>'.(my_get_post_views()).'<em class="icon icon-comment"><span class="sr-only">Comment</span></em>'.get_comments_number()." Comment<small>(s)</small></div>";
}
  $output .= '</div>';
  $output .= '</a>';	
   if($i !== 2) {
  	$output .= '<hr>';	
  }

$i++;
	    if ($i > 2) break;
}






//$output .='  <a class="twitter-timeline"  href="https://twitter.com/'.str_replace('@', '', $screenname).'" width="'.$twitter_widget_width.'"  height="'.$twitter_widget_height.'" data-chrome="'.$usersettings.'" data-widget-id="'.$widgetid.'"  '.$limit.'>Tweets by '.$screenname.'</a>';
$output .= '</div>';

return $output;

}
add_shortcode( 'blogfeed', 'blogfeed_func' );
