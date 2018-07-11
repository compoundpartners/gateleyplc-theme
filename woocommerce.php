<?php

get_header();

$eventpage = get_option('eventpage');
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($eventpage), 'header-image-cropped' );
$url = $thumb['0'];
?>
 <header class="page-header vertical-height-no-overlay <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?> mb30">          
 <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container"> <?php wp_reset_query(); ?>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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

 <div class="content-inner"> <?php woocommerce_content(); ?></div>

    
    </main>
     <!-- #main -->
</div>

<!-- #primary -->
<?php
get_footer();
?>