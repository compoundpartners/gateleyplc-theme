<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

?>

<article id="<?php get_post_type(); ?>-<?php the_ID(); ?>" class=" vc_col-md-4 vc_col-sm-6 people">
     <a class="media matchHeight" href="<?php echo get_the_permalink(); ?>">
     <div class="media-left"><?php echo get_the_post_thumbnail($post->ID, "thumbnail", array('class' => 'media-object invisible'))?>
     </div>
     <div class="media-body">
          <header class="entry-header">
               <?php echo "<h3 class='entry-title'>".get_the_title()."</h3>"; ?>
          </header>
          <!-- .entry-header -->
          
          <div class="entry-summary">
          </div>
          <!-- .entry-summary -->
     </div>
     </a>
</article>
<!-- #post-## -->

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$url = $thumb['0'];
$GLOBALS['styles'] .= "#".get_post_type()."-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}"; ?>


