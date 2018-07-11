<?php
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
header('Content-type: text/css');
  header('Cache-control: must-revalidate');
ob_start();
    /* css files for combining */
    include('static/framework.css');
    include('../../style.css');
    include('static/typography.css');
    include('static/navigation.css');
        include('static/icons.css');
    include('static/lists.css');
    include('static/buttons.css');
    include('static/forms.css');
    include('static/hubspot.css');
    include('static/blog-signup.css');
    include('static/inpage-navigation.css');
        include('static/blockquotes.css');
        include('static/media.css');
        include('static/mega-menu.css');
    //include('progress-bars.css');
    //include('modal.css');
    //include('tooltips-popups.css');
   include('static/labels-badges.css');
   include('static/message-boxes.css');
    include('static/tables.css');
    include('static/animate.css');
            include('static/feeds.css');
    include('static/page-popup.css');
    include('static/animation.css');
    include('static/search-page.css');
    include('static/timeline.css');
    include('static/events.css');
    include('static/utilities.css');
    include('static/visual-composer.css');
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

    	include('static/accessibilty/aaa.css');
    include('static/responsive.css');

if(get_option('logowidth')) {
	?>
     .navbar-brand > img {
     max-width:<?php echo get_option('logowidth'); ?>px;
     }

     <?php
}
if(get_option('eventpage')) {
$eventpage = get_option('eventpage');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($eventpage), 'header-image-cropped' );
$url = $thumb['0'];
echo '.post-type-archive-tribe_events .page-header, .single-tribe_events .page-header, .page-template-events-page  .page-header{ background-image:url("'.$url.'")}';
}
if(get_option('customcss')) {
 echo get_option('customcss');
}
if (esc_attr( get_option('showhomepageadvert')  == '1')) {
?>
.campaign-advert-slidedown {
background-image:url(<?php echo get_option('homepageadvertbackground') ?>);
background-position:288px 108px;
 background-size: auto 201px;
  background-repeat: none;}

<?php
}
ob_end_flush();
