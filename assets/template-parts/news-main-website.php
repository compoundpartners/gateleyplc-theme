<main id="main" class="site-main">
     <div class="vc_row wpb_row vc_row-fluid row-no-pad mb30 equalheights">
          <div class="content-inner wpb_column vc_column_container vc_col-sm-8">
          <?php 
if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

query_posts('posts_per_page=3&paged=' . $paged); 
?>
               <?php wp_reset_query(); while ( have_posts() ) : the_post(); ?>
               <?php if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}";	 ?>
               <?php $output .='<div class="media media-'.get_post_type().' '.get_post_type().' white medialist  media-'.get_the_ID().' ">';


$link = get_the_permalink();	
$output .='<a  href="'.$link.'"  class="media-left '.$linkclass.'">';
if (has_post_thumbnail()) {
$output .=get_the_post_thumbnail($post->ID, "thumbnail", array('class' => 'media-object invisible'));

	
}
else {
	$output .="<img class='media-object invisible' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
$GLOBALS['styles'] .= ".media-".get_post_type().".media-".get_the_ID()." .media-left{ background:url(".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png); background-size:cover;  background-position:center center;}";

	}
$output .='</a>';
$output .='<div class="media-body matchHeight">';
$output .='<a  href="'.$link.'" class="'.$linkclass.'" >';
$output .= '<h4 class="media-heading">'.get_the_title().'</h4>';

$output .= truncate( strip_tags(get_post_meta(get_the_ID(), '_Overview', true)) ,120);

$output .='</a>';

$output .= '<div class="post-meta mt5"><em class="icon icon-share"></em>Share <em class="icon icon-eye"></em>'.(my_get_post_views()).'<em class="icon icon-comment"></em>'.get_comments_number()." Comment<small>(s)</small></div>";
$output .='</div>';
$output .='</div>';
$output .='<hr>';



				// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
               <?php endwhile; // End of the loop.
     echo $output;
    echo page_pagination(); ?>
          </div>
          <div class="col-no-pad sidebar sidebar-grey wpb_column vc_column_container vc_col-sm-4">
               <div class=" vc_custom_1448471924477 pl30">
                    <h4> News &amp; Events Navigation</h4>
                    <div class="clear clearfix grid-5656f10add66b ">
                         <div class="{$columns} vc_col-xs-12 {$tabletcolumns}  list-item">
                              <a href="http://gateleyplc.com/news-events/latest-news/" class="media list ">
                              <div class="media-left">
                                   <div class="media-object placeholder-block placeholder-small"><em class="icon icon-photo"></em></div>
                              </div>
                              <div class="media-body">
                                   <h5>Latest News</h5>
                              </div>
                              </a>
                         </div>
                         <div class="{$columns} vc_col-xs-12 {$tabletcolumns}  list-item">
                              <a href="http://gateleyplc.com/news-events/upcoming-events/" class="media list ">
                              <div class="media-left">
                                   <div class="media-object placeholder-block placeholder-small"><em class="icon icon-photo"></em></div>
                              </div>
                              <div class="media-body">
                                   <h5>Upcoming Events</h5>
                              </div>
                              </a>
                         </div>
                         <div class="{$columns} vc_col-xs-12 {$tabletcolumns}  list-item">
                              <a href="http://gateleyplc.com/news-events/blogs/" class="media list ">
                              <div class="media-left">
                                   <div class="media-object placeholder-block placeholder-small"><em class="icon icon-photo"></em></div>
                              </div>
                              <div class="media-body">
                                   <h5>Blogs</h5>
                              </div>
                              </a>
                         </div>
                         <div class="{$columns} vc_col-xs-12 {$tabletcolumns}  list-item">
                              <a href="http://gateleyplc.com/news-events/video-audio/" class="media list ">
                              <div class="media-left">
                                   <div class="media-object placeholder-block placeholder-small"><em class="icon icon-photo"></em></div>
                              </div>
                              <div class="media-body">
                                   <h5>Video &amp; Audio</h5>
                              </div>
                              </a>
                         </div>
                         <div class="{$columns} vc_col-xs-12 {$tabletcolumns}  list-item">
                              <a href="http://gateleyplc.com/news-events/briefings/" class="media list ">
                              <div class="media-left">
                                   <div class="media-object placeholder-block placeholder-small"><em class="icon icon-photo"></em></div>
                              </div>
                              <div class="media-body">
                                   <h5>Briefings</h5>
                              </div>
                              </a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</main>
<!-- #main -->