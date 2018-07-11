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
     <header class="page-header vertical-height-no-overlay">
          <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title">Briefings</h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>
     <!-- .entry-header -->
     
     <div class="entry-content container mb30">
          <div class="vc_row row-no-pad equalheights white-bg">
               <div class="vc_col-md-8 col-no-pad">
                    <div class="content-inner">
                    <h2><?php echo the_title(); ?></h2>
                         <?php echo the_content(); ?>
                                                 <?php echo get_post_meta(get_the_ID(), '_Overview', true); ?>
                                                 <hr />
<?php $attachment = get_post_meta(get_the_ID(), '_publication', true); 
if(!empty($attachment)) {?>
     <a class="btn btn-primary" href="<?php echo wp_get_attachment_url( $attachment ); ?>" target="_blank">Read Briefing
</a> <?php } ?>
                         <?php
			//wp_link_pages( array(
			//	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateley-plc' ),
			//	'after'  => '</div>',
			//) );
		?>
                    </div>
               </div>
               <div class="vc_col-md-4 col-no-pad sidebar breifing">
               
                                       <?php get_sidebar(); ?>

               </div>
          </div>
     </div>
     
     <!-- .entry-content -->
     
     <footer class="entry-footer container">
          <?php //gateley_plc_entry_footer(); ?>
     </footer>
     <!-- .entry-footer -->
</article>
<!-- #post-## -->
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
