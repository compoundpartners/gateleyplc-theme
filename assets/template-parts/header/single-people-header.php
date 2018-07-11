
     <header class="page-header  mb30 vertical-height-no-overlay page-header-<?php echo get_the_ID(); ?> has-post-thumbnail">
     <div class="cover">
          <div class="container">
               <h1 class="entry-title">Our People</h1>
               <?php echo the_breadcrumb(); ?>
          </div>
         </div> 
     </header>
     <?php $themeswithcer = get_option('themetype');

if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
if (get_option('peoplepage') !== '' && $themeswithcer == 'main' || get_option('peoplepage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('peoplepage')), 'full' );
$url = $thumb['0'];	
} else {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}
$GLOBALS['styles'] .= ".page-header-".get_the_ID()." { background-image:url(".$url.")}";
global $post;
$color = get_post_meta(get_option('peoplepage'), '_pagecolour', true);
if (!empty($color)) {
$GLOBALS['styles'] .= ".postid-".get_the_ID()." .page-header-".get_the_ID()." .cover{ background-color:".$color."; background-color:".hex2rgba($color, 0.8)."}";
}
?>