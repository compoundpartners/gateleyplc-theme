<?php /* ======== ======== ======== ======== ======== ======== */
/* Twitter									  */	
/* ======== ======== ======== ======== ======== ======== */
function twitterfeed_func( $atts ) {
extract( shortcode_atts( array(
'widgetid' => '{$widgetid}',
'screenname' => '{$screenname}',
'noheader' => '{$noheader}',
'nofooter' => '{$nofooter}',
'noborders' => '{$noborders}',
'noscrollbar' => '{$noscrollbar}',
'bordercol' => '{$bordercol}',
'linkcol' => '{$linkcol}',
'twitter_widget_width' => '{$twitter_widget_width}',
'twitter_widget_height' =>'{$twitter_widget_height}',
'datatweetlimit' => '{$datatweetlimit}'

), $atts ) );
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	$GLOBALS['script'] .= ' !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs"); ';
	$GLOBALS['script'] .= '                                                                     ';
	
$output;
$output .= '<div class="twitter-header"> '.get_bloginfo('name' ) .' <small>'.$screenname.'</small> <a href="https://twitter.com/intent/follow?screen_name='.str_replace('@', '', $screenname).'" class="feed-btn" data-show-count="false" data-show-screen-name="false" target="_blank">Follow</a>
</div>';
$output .= '<div class="feed-wrapper twitter-feed">';

$usersettings = '';        
       if($noheader == 'yes') {
		$usersettings .= ' noheader ';  
	  }
	   if($nofooter == 'yes') {
		$usersettings .= ' nofooter ';  
	  }
	     if($noborders == 'yes') {
		$usersettings .= ' noborders ';  
	  }
	       if($noscrollbar == 'yes') {
		$usersettings .= ' noscrollbar ';  
	  }
	  
if($datatweetlimit !== '-1') {
 $limit = 'data-tweet-limit="'.$datatweetlimit.'"';	
}

$output .='  <a class="twitter-timeline"  href="https://twitter.com/'.str_replace('@', '', $screenname).'" width="'.$twitter_widget_width.'"  height="'.$twitter_widget_height.'" data-chrome="'.$usersettings.'" data-widget-id="'.$widgetid.'"  '.$limit.'>Tweets by '.$screenname.'</a>';
$output .= '</div>';

return $output;

}
add_shortcode( 'twitterfeed', 'twitterfeed_func' );