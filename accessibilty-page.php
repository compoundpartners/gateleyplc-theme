<?php
/**
 * Template Name: Accessibilty Page
 *
 * @package WordPress
 * @package gateley-plc 
 */

get_header(); $themeswithcer = get_option('themetype'); ?>
<?php $themeswithcer = get_option('themetype');

	$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-image', false);
$thumb_url = $thumb_url_array[0];
if(!empty($thumb_url)){
$hasthumb = 'has-post-thumbnail';
	} else {
	$hasthumb = '';	
	}
	if('investor' !==  $themeswithcer) {
?>
<header class="page-header vertical-height page-header-<?php echo get_the_ID(); ?> <?php echo $hasthumb; ?>">
     <div class="cover">
          <div class="container">
               <h1 class="page-title">
                    <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?>
               </h1>
               <?php echo the_breadcrumb(); ?>
          </div>
     </div>
</header>
<?php } else {  ?>
<header class="investor-page-header vertical-height investor-page-header-<?php echo get_the_ID(); ?> <?php echo $hasthumb; ?>">
     <div class="cover">
          <div class="container">
          <div class="page-title">
               <h1 >
			<?php if (get_option('disclaimer') == '1') {
	 if($_COOKIE['first_disclaimer'] !== '1' && $_COOKIE['second_disclaimer'] !== '1') { ?>
       Disclaimer <small>- Step 1 </small> 
               <?php } elseif($_COOKIE['second_disclaimer'] !== '1') { ?>
       Disclaimer <small>- Step 2 </small>   
               <?php } else {
			echo the_title();
			}?>
			<?php } else {
			echo the_title();
			}?>
               
               </h1>
            <?php echo the_breadcrumb(); ?>
            </div>
          </div>
     </div>
</header>
<?php } 
?>
<div id="primary" class="content-area container">

<?php // var_dump( wp_get_sites( $args )); ?>

     <?php 
switch ($themeswithcer) {
    case "investor":
		get_template_part( 'assets/template-parts/content/page', 'investor-website' ); 
        break;
    case "blog":
		get_template_part( 'assets/template-parts/content/page', 'blog-website' ); 
        break;
    default:

    if (get_post_type() == 'post') { 
    		get_template_part( 'assets/template-parts/content', get_post_format() );
    } else {
		get_template_part( 'assets/template-parts/content/page', 'main-website' ); 
    }
}
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	$colour = $backgroundcolour;
	$backgroundimg = wp_get_attachment_url( $backgroundimage );
	if(!empty($thumb_url)){
	$GLOBALS['styles'] .= "page-id-".get_the_ID(). " .page-header-".get_the_ID(). "{ background-image:url(".$thumb_url.");}";
	} else {
		
	}
  ?>
</div>
<?php get_footer(); ?>
