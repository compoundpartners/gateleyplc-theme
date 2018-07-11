<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

?>
<article id="<?php echo get_post_type() ?>-<?php the_ID(); ?>" class=" vc_col-md-4 vc_col-sm-6 news">
     <a class="media matchHeight" href="<?php echo get_the_permalink(); ?>">
     <div class="media-left">
  <?php 
echo "<div class='date-block media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
   echo  "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  

    ?>
     </div>
     <div class="media-body">
          <header class="entry-header">
               <?php echo "<h3 class='entry-title'>".truncate(get_the_title(), 35)."</h3>"; ?>
           
          </header>
          <!-- .entry-header -->
          
          <div class="entry-summary">
                    		<?php if(!empty(get_post_meta(get_the_ID(), '_Overview', true))) { 
						$content = strip_tags(get_post_meta(get_the_ID(), '_Overview', true)); 
				echo truncate($content, 40); } else {?>

          		<?php echo truncate(get_the_excerpt(), 40); 
						}?>

          </div>
          <!-- .entry-summary -->
     </div>
     </a>
</article>
<!-- #post-## -->
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
$url = $thumb['0'];
//$GLOBALS['styles'] .= "#".get_post_type()."-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}"; ?>