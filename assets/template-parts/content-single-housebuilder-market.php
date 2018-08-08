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
$themeswithcer = get_option('themetype');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <header class="page-header vertical-height<?php if(empty($url)) { echo '-no-overlay'; }else { echo ' has-post-thumbnail';}?>">
     
          <div class="cover <?php if(empty($url) || $themeswithcer == 'blog') { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title width50"> <?php echo the_title(); ?></h1>
                    <div class="entry-meta text-white">
			<?php gateley_plc_posted_on(); ?> 
		</div><!-- .entry-meta -->
                    <?php // echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>     
     
     <div class="entry-content container">
     <?php 
	switch ($themeswithcer) {
    case "blog":
?>
	<div class="vc_row equalheights white">
     <main id="main" class="site-main vc_col-md-8 col-no-pad">
 <div class="content-inner">
 <div class="blog-post">
                         <?php echo the_content(); ?>
                         </div>
                              <footer class="entry-footer">
                              <hr />
          <?php gateley_plc_entry_footer(); ?>
          	<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gateley_plc_posted_on(); ?> 
		</div><!-- .entry-meta -->
		<?php endif; ?>
        
  <?php $output .= '<hr /><div class="post-meta mt10"><div class="dropdown">
  <button class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"></em> Share
  </button>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';
$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';

$thelinkedintitle = str_replace('.', '\.', $thelinkedintitle);
$output.= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thelinkedintitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>
';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$output .= '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';
 
  $output .= '</ul>
</div>';
$output .= '</a><em class="icon icon-eye"></em>'.(my_get_post_views());
if(get_option('themetype') == 'blog') {
$output .='<em class="icon icon-comment"></em>'.get_comments_number()." Comment<small>(s)</small>";
}
$output .="</div>";
  
  echo  $output ; ?>
    </footer>
                 </div>
            <?php if($themeswithcer == 'blog') { 
          // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
            }?>
            
                 </main>       
        <div class="vc_col-md-4 col-no-pad">
               <div class="sidebar sidebar-grey">
                    <?php get_sidebar(); ?>
                 </div>   
          </div>
     </div>
<?php
        break;
    default:
		 echo the_content();
	break;
}
     ?>
       </div>
</article>

<?php if (!empty(get_option('blog_disclaimer'))) {
	?>
    <div class="container"><div class="vc_row"> <div class="well well-bordered mt20">
     <?php echo get_option('blog_disclaimer'); ?>
     </div>
     </div>
     </div>
     <?php
} ?>
<?php if ($themeswithcer == 'blog') { ?>
    <div class="feeds-container mt30">
<div class="container">
 <?php dynamic_sidebar( 'Feeds' ); ?> </div>
</div>
<?php } ?>
<?php 
switch ($themeswithcer) {
    case "blog":


        break;
    default:
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
if (get_option('newspage') !== '' && $themeswithcer == 'main' || get_option('newspage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('newspage')), 'full' );
$url = $thumb['0'];	
} else {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}
$GLOBALS['styles'] .= "#post-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";
break;
}

?>

