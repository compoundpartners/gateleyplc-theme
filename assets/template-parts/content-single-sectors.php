<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
?>
<article id="sector-<?php the_ID(); ?>" <?php post_class(); ?>>
     <header class="page-header vertical-height<?php if(empty($url)) { echo '-no-overlay'; }?>">
          <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title">Specialist Sector</h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>     
     <div class="entry-content container">
                         <?php echo the_content(); ?>
                        
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

$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
$GLOBALS['styles'] .= "#sector-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";
?>