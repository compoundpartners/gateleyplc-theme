<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

?>

<article id="post-<?php the_ID(); ?>" class="media">
<div class="media-left">
<?php if (has_post_thumbnail()){ the_post_thumbnail( 'thumbnail', array('class' => 'img-responsive media-object')); } else {
echo "<div class='date-block media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
   echo  "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  
}
    ?>
</div>
<div class="media-body">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta mb10">
			<?php gateley_plc_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo truncate(get_the_excerpt(), 100);  ?> <a href="<?php the_permalink(); ?>" class="readmore-link">Read More</a>
	</div><!-- .entry-summary -->
     
     
	<?php echo '<div class="post-meta mt10 clearfix"><div class="dropdown">
  <button class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"></em> Share
  </button>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
echo  '<li class="email">';
echo  '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
echo  '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';
echo  '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thetitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>
';
echo  '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
echo  '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
echo  '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';
 
  echo  '</ul>
</div>';

echo  '</a><em class="icon icon-eye"></em>'.(my_get_post_views()).'<em class="icon icon-comment"></em>'.get_comments_number()." Comment<small>(s)</small></div>";
?>
<!--.entry-footer <footer class="entry-footer clearfix mt10">
		<?php gateley_plc_entry_footer(); ?>
	</footer> 
</div>
-->

	
</article><!-- #post-## -->

