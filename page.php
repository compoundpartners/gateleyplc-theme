<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */


get_header(); $themeswithcer = get_option('themetype'); ?>
<?php

	if('investor' !==  $themeswithcer) {
if(get_post_meta($post->ID, '_hasSlider', true) !== '1') {?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-image-cropped' );
$url = $thumb['0'];
?>
 <header class="page-header vertical-height<?php if(empty($url)) { echo '-no-overlay'; }?> <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?>">          
 <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title">            <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?></h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header> 
     
     
<?php } } else {  ?>
<?php global $post;?>


<?php if(get_post_meta($post->ID, '_hasSlider', true) == '1' && $_COOKIE['first_disclaimer'] == '1' && $_COOKIE['second_disclaimer'] == '1' || get_post_meta($post->ID, '_hasHeader', true) == '1' && $_COOKIE['first_disclaimer'] == '1' && $_COOKIE['second_disclaimer'] == '1' ) { 

} else { ?>
<header class="investor-page-header vertical-height investor-page-header-<?php echo get_the_ID(); ?> <?php echo $hasthumb; ?>">
     <div class="cover">
          <div class="container">
          <div class="page-title">
               <h1>
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
?><?php } 
?>
<div id="primary" class="content-area container">

<?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	global $post;
$colour = get_post_meta($post->ID, '_pagecolour', true);
if(!empty($colour)) {
$GLOBALS['styles'] .= ".page-id-".get_the_ID()." .page-header .cover{ background:".$colour."; background:".hex2rgba($colour, 0.9)."}";
}
$GLOBALS['styles'] .= ".page-id-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";
?>
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
    break;
}
?>
<?php if (!empty(get_option('blog_disclaimer'))) {
	?>
     <div class="well well-bordered mt20">
     <?php echo get_option('blog_disclaimer'); ?>
     </div>
     <?php
} ?>
</div>
<?php get_footer(); ?>
