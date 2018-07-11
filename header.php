<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gateley-plc
 */
if (get_option('disclaimer') == '1') {
	if($_POST['ds1_submitted'] == 'submit') {
		if (!isset($_COOKIE['first_disclaimer'])) {
			setcookie('first_disclaimer','1',time() + (10800));
			header('Location:'.home_url());
		}
	}
	if($_POST['ds2_submitted'] == 'submit') {
		if (!isset($_COOKIE['second_disclaimer'])) {
		setcookie('second_disclaimer','1',time() + (10800));
			header('Location:'.home_url());

		}
	}
	 if($_COOKIE['first_disclaimer'] !== '1' || $_COOKIE['second_disclaimer'] !== '1') {
		 if(is_front_page()) {

		 } else {
			header('Location:'.home_url());
			exit;
		 }

	 }
} else {
	if (isset($_COOKIE['first_disclaimer'])) {
	   setcookie("first_disclaimer", "", time()-3600);
	}

	if (isset($_COOKIE['second_disclaimer'])) {
	   setcookie("second_disclaimer", "", time()-3600);
	}
}
if(get_post_meta(get_the_ID(), '_redirectPage',true) ==1) {
	$url = do_shortcode(get_post_meta(get_the_ID(), '_redirectPageUrl',true));
	header('Location: ' . $url);
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="loading">

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
 <?php $lockdown = get_option('lockdown');

 if($lockdown == 1) {
if(!is_user_logged_in()) {
 ?>
 <script>
$(document).ready(function() {
	$("body").find("a").each(function(){

    $(this).removeAttr('href');
});
});
</script>
 <?php }
 }
echo '<!--[if lt IE 9]>
  <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
  <script src="http://apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge" />';
     if(preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){

echo '<!--[if lt IE 8]>
 <style>
.collapseie8 ul li{ float:left; }
.navbar-nav, .collapse{ display:block; }
    .navbar-inverse.nav li.dropdown.open > .dropdown-toggle,
    .navbar-inverse.nav li.dropdown.active > .dropdown-toggle,
    .navbar-inverse.nav li.dropdown.open.active > .dropdown-toggle, .nav, .navbar, .navbar-inverse.navbar-inner, .alert-cookie-policy.alert-dismissible {

        filter: none!important;
        background-image: none;
    }
    .alert-cookie-policy {display:none !important;}
    .vc_col-xs-1,.vc_col-xs-2,.vc_col-xs-3,.vc_col-xs-4,.vc_col-xs-5,.vc_col-xs-6,.vc_col-xs-7,.vc_col-xs-8,.vc_col-xs-9,.vc_col-xs-10,.vc_col-xs-11,.vc_col-xs-12,.vc_col-sm-1,.vc_col-sm-2,.vc_col-sm-3,.vc_col-sm-4,.vc_col-sm-5,.vc_col-sm-6,.vc_col-sm-7,.vc_col-sm-8,.vc_col-sm-9,.vc_col-sm-10,.vc_col-sm-11,.vc_col-sm-12,.vc_col-md-1,.vc_col-md-2,.vc_col-md-3,.vc_col-md-4,.vc_col-md-5,.vc_col-md-6,.vc_col-md-7,.vc_col-md-8,.vc_col-md-9,.vc_col-md-10,.vc_col-md-11,.vc_col-md-12,.vc_col-lg-1,.vc_col-lg-2,.vc_col-lg-3,.vc_col-lg-4,.vc_col-lg-5,.vc_col-lg-6,.vc_col-lg-7,.vc_col-lg-8,.vc_col-lg-9,.vc_col-lg-10,.vc_col-lg-11,.vc_col-lg-12,.input-group,.vc_row,.content, .row{box-sizing:border-box; *behavior: url('.get_template_directory_uri().'/assets/css/static/fallback/boxsizing.htc);
    }
    .vc_row, .row {width:100%; clear:both}

 .media {
    *behavior: url('. get_template_directory_uri().'/assets/css/static/fallback/display-table.min.htc);
  }
  </style>

  <script>
  document.createElement("header");
document.createElement("footer");
document.createElement("section");
document.createElement("aside");
document.createElement("nav");
document.createElement("article");
document.createElement("figure");
document.createElement("time");
  </script>
<![endif]-->
';

	}?>
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/img/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/img/manifest.json">
<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/safari-pinned-tab.svg">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/img/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/assets/img/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content">
<?php esc_html_e( 'Skip to content', 'gateley-plc' ); ?>
</a>
<?php $themeswithcer = get_option('themetype');
switch ($themeswithcer) {
    case "main":
	/*if(is_user_logged_in() && is_super_admin()) {*/
		get_template_part( 'assets/template-parts/header/header', 'main-website-production' );
	/*} else {
   // if(get_current_blog_id() !== 16) {
	    		get_template_part( 'assets/template-parts/header/header', 'main-website-update' );

   // }else {
		get_template_part( 'assets/template-parts/header/header', 'main-website' );
    }
	}*/
        break;
    case "investor":
		get_template_part( 'assets/template-parts/header/header', 'investor-website' );
        break;
    case "blog":
     if ( get_header_image() ) : ?>
<?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';
	}

$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
$GLOBALS['styles'] .= ".page-header{ background-image:url(".get_header_image().") !important; margin-bottom:30px !important; padding:50px 0 100px;}";
?>


	<?php endif; // End header image check.
		get_template_part( 'assets/template-parts/header/header', 'blog-website' );
        break;
    default:
		get_template_part( 'assets/template-parts/header/header', 'main-website' );
}
?>
<!-- #masthead -->
<div id="content" class="site-content">
