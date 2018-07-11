<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */


$attachment = get_post_meta(get_the_ID(), '_publication', true);
?>
<article id="<?php echo get_post_type(); ?>-<?php the_ID(); ?>" class=" vc_col-md-4 vc_col-sm-6 news">
     <a class="media matchHeight" href="<?php echo wp_get_attachment_url( $attachment ); ?>" target="_blank">
     <div class="media-left">
    <?php if (has_post_thumbnail()){ the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive media-object invisible')); } else {
echo "<div class='date-block media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
   echo  "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  
}
    ?>
     </div>
     <div class="media-body">
          <header class="entry-header">
               <?php echo "<h3 class='entry-title'>".get_the_title()."</h3>"; ?>
           
          </header>
          <!-- .entry-header -->
          
          <div class="entry-summary">
          		<?php echo get_the_excerpt(); ?>

          </div>
          <!-- .entry-summary -->
     </div>
     </a>
</article>

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$url = $thumb['0'];
$GLOBALS['styles'] .= "#".get_post_type()."-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}"; ?>
<!-- #post-## -->
