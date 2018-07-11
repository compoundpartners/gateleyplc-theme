<?php // Latest News 

function tweet_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'tweetid' => '{$tweetid}',
'showcontent' => '{$showcontent}',
'tweetsurl' => '{$tweetsurl}',
'postmeta' => '{$postmeta}',
'networkquery' => '{$networkquery}',
'whichsite' => '{$whichsite}',
), $atts ) );
$output;
wp_reset_query();
if(is_numeric($whichsite)) {
$original_blog_id = get_current_blog_id(); 
switch_to_blog($whichsite);
}
global $post;
global $options;
$output .= '<div class="twitter-header"> '.get_option("itap_user_id").' <small>@'.get_option("itap_user_id").'</small><a href="https://twitter.com/intent/follow?screen_name='.get_option("itap_user_id").'" class="feed-btn" target="_blank">Follow Us</a>
</div>';
$output .= '<div class="feed-wrapper twitter-feed feed-match-height">';
$ws = 1;

$args = array(
'post_type'=>'tweet',
'order'=>'DESC',
'posts_per_page' => 2
//'orderby'=>'menu_order'
);
$slug = the_slug();
query_posts($args); 
$count=0;
if(have_posts()) {  
/*$output .= '<script type="text/javascript" async src="//platform.twitter.com/widgets.js"></script>';*/
query_posts($args); 
while (have_posts()) : the_post(); 
global $post;

$output .= '<div class="media">';
$output .= '<div class="media-left">';
// twitter-brand
 $output .= '<em class="icon icon-social-twitter large "><span class="sr-only">Twitter</span></em>';
 

  $output .= '</div>';
  $output .= '<div class="media-body">';

  $output .= '<h4 class="media-heading">'.get_the_content().'</h4>';

 $output .=get_the_date();
  $output .= "<div class=' clearfix'></div>";


$tweetid = get_post_meta( $post->ID, '_tweet_id', true );
$output .= '<div class="post-meta btn-group mt10">';
$output .= '<a href="https://twitter.com/intent/tweet?in_reply_to='.$tweetid.'" class="btn-link"><span class="icon icon-ios-undo"></span> Reply</a>';
$output .= '<a href="https://twitter.com/intent/retweet?tweet_id='.$tweetid.'" class="btn-link views"><span class="icon icon-retweet"></span> Retweet</a>';
	$output .= '<a href="https://twitter.com/intent/favorite?tweet_id='.$tweetid.'" class="btn-link"><span class="icon icon-heart"></span> Favorite</a>';
$output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';	
  if($count !== 1) {
  $output .= '<hr>';	
  }

$count++;
endwhile;
wp_reset_query();
}
if(is_numeric($whichsite)) {

switch_to_blog( $original_blog_id );
}
$output .= "</div>";
return $output;

}
add_shortcode( 'tweet', 'tweet_func' );
