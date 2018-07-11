<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */
$themeswithcer = get_option('themetype');
?>
<?php
if (get_option('eventpage') !== '' && $themeswithcer == 'main' || get_option('eventpage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('eventpage')), 'full' );
$url = $thumb['0'];	

} else {$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}

?>

<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
     
      <header class="page-header vertical-height<?php if(empty($url)) { echo '-no-overlay'; } else { echo ' has-post-thumbnail';}?>">
     
          <div class="cover <?php if(empty($url) || $themeswithcer == 'blog') { echo 'no-feature'; }?>">
               <div class="container">
                                       <h1 class="entry-title width50">
 <?php echo the_title(); ?></h1>
                    <?php  echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>     
     
     
     <div class="entry-content container">
     <div class="vc_row wpb_row vc_row-fluid row-no-pad equalheights vc_custom_1448531742856 vc_row-has-fill white">
          <div class="wpb_column vc_column_container vc_col-sm-8 vc_custom_1447847458600">
         		<div class="content-inner">
               <?php echo the_content(); ?>
               </div>
          </div>
          <div class="col-no-pad sidebar sidebar-grey border-left wpb_column vc_column_container vc_col-sm-4">
          <?php dynamic_sidebar( 'Events Sidebar' ); ?>
          </div>
     </div>
     <footer class="entry-footer container">
          <?php gateley_plc_entry_footer(); ?>
     </footer>
</article>
<?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
if (get_option('eventpage') !== '' && $themeswithcer == 'main' || get_option('eventpage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('eventpage')), 'full' );
$url = $thumb['0'];	
} else {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}
$GLOBALS['styles'] .= "#event-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";

?>
