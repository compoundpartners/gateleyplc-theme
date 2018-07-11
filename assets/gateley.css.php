<?php  
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
header('Content-type: text/css');
  header('Cache-control: must-revalidate');
 ob_start("compress");
  function compress($buffer) {
    /* remove comments */
    $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', ' ', $buffer);
    /* remove tabs, spaces, newlines, etc. */
    $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $buffer);
    return $buffer;
  }
    

    /* css files for combining */
    include('static/framework.css');
    include('../../style.css');
    include('static/typography.css');
    include('static/navigation.css');
        include('static/icons.css');
    include('static/lists.css');
    include('static/buttons.css');
    include('static/forms.css');
    include('static/inpage-navigation.css');
        include('static/blockquotes.css');
        include('static/media.css');
    //include('progress-bars.css');
    //include('modal.css');
    //include('tooltips-popups.css');
   include('static/labels-badges.css');
   include('static/message-boxes.css');
    include('static/tables.css');
    include('static/animate.css');
    
     if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT'])){
    // if IE<=8
    include('static/fallback/fallback-hero-slider.css');
        include('static/fallback/ie-fallback.css');
    exit;
}
else
{
    include('static/hero-slider.css');
   }
    include('static/page-popup.css');
    include('static/animation.css');
    include('static/search-page.css');
    include('static/timeline.css');
    include('static/events.css');
        include('static/feeds.css');
    include('static/utilities.css');
    	include('static/accessibilty/aaa.css');
    include('static/responsive.css');

if(isset(get_option('logowidth'))) {
	?>
     .navbar-brand > img {
     max-width:<?php echo get_option('logowidth'); ?>px;
     }
     <?php
}

ob_end_flush();