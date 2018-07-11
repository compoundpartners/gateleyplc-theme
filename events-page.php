<?php
/**
 * Template Name: Events Template
 *
 * @package WordPress
 * @package gateley-plc 
 */

get_header();

$eventpage = get_option('eventpage');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($eventpage), 'header-image-cropped' );
$url = $thumb['0'];
?>
 <header class="page-header vertical-height-no-overlay <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?> mb30">          
 <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container"> <?php wp_reset_query(); ?>
	<?php if(is_single()) { the_title( '<h1 class="entry-title">', '</h1>' );  } else { 
	?><h1 class="entry-title">Upcoming Events</h1>
    <?php
	}?>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header> 
     <?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}


$GLOBALS['styles'] .= ".single-tribe_events.postid-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";
global $post;
$color = get_post_meta($post->ID, '_pagecolour', true);
$colour = $color;

?>
<div id="primary" class="content-area container">
<main id="main" class="site-main">
<div class="vc_row wpb_row vc_row-fluid row-no-pad mb30 equalheights <?php if(!is_single()) { echo "whitebg"; } ?>">
  <div class=" pb0 mb0 wpb_column vc_column_container vc_col-sm-8">
 <div class="content-inner pb0"> <?php echo 		get_template_part( 'assets/template-parts/content/page', 'main-website' ); 
 ?></div>
  
    </div>
  <div class="col-no-pad sidebar wpb_column vc_column_container vc_col-sm-4">
          <?php dynamic_sidebar( 'Events Sidebar' ); ?>
          <?php if(is_single()) {
			 ?>
             <p class="tribe-events-back"><a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html__( 'All %s', 'the-events-calendar' ), $events_label_plural ); ?></a></p>
            <?php }?>

  </div>
</div>
    
    </main>
     <!-- #main -->
</div>

<!-- #primary -->
<?php
get_footer();
?>