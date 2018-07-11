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
                    <h1 class="entry-title">Careers</h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>
     <!-- .entry-header -->
     
     <div class="entry-content container">
          <div class="vc_row row-no-pad equalheights white-bg">
               <div class="vc_col-md-8 col-no-pad">
                    <div class="content-inner">
                         <?php echo the_content(); ?>
                         <?php
			//wp_link_pages( array(
			//	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateley-plc' ),
			//	'after'  => '</div>',
			//) );
		?>
                    </div>
               </div>
               <div class="vc_col-md-4 col-no-pad sidebar"><aside class="pl30 pr30">
               
                   <ul class="contact-list">
                              <li>
                                  <h4>Location.</h4>
                                   <?php
					$terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	 $looping = 1;
	 $countingterms = count($terms);
     foreach ( $terms as $term ) {
       echo $term;
	  
	  if( $countingterms  > 1) { echo ', '; }
	  $looping++;
        
     }
 }
				    ?>
                              </li>
                              
                              
                              </ul>
               <?php
			
			$people = wp_get_post_terms($post->ID, 'gateley_plc_people', array("fields" => "names"));

               $i = 0;
$args = array(
     'post_type' => 'people'
);
$id = 'spotlight-'.rand().'-slider';


global $post;
 $postterms = wp_get_post_terms( get_the_ID(), 'gateley_plc_people', array('orderby' => 'menu_order', 'order' => 'ASC', 'fields' => 'all')); 
if ( !empty( $postterms) ) {

$id = 'spotlight-'.rand().'-slider';

if(count($people) > 1) {
$amount = 2;	
} else {
$amount = 1;	
$addthisclass="single-slide";
	
}


if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
$GLOBALS['script'] .= "jQuery(function($) {
	
	var ".str_replace("-", "", $id)."Swiper = new Swiper('#".$id.".swiper-container', {
    speed: 400,
    slidesPerView: ".$amount."
});   
});";

$output .= ' <h4>Reports to</h4> ';
$output .= '<div class="swiper-container" id="'.$id.'">';
$output .= '<div class="swiper-wrapper">';

 $pages = array();
 foreach($postterms as $term) {
	$page =    get_page_by_title( html_entity_decode($term->name), OBJECT, 'people' );
	$output .= '<div class="swiper-slide slide-'.$i.'">';
		if ($count == 1) {
			$mediablock = 'media medialist media-person';
			$thumbnailclass = 'media-object ';
			$mediablockcaption = 'media-body';
			$mediaimgblock = 'media-left';

		} else {
			$mediablock = 'thumbnail spotlight';
			$thumbnailclass = 'img-responsive';
			$mediablockcaption = 'caption';
						$mediaimgblock = 'thumbnail-img';


		}
		$output .= '<a class="'.$mediablock .' matchHeightSlider" href="'.get_the_permalink($page->ID).'" >';
		  $output .= '<div class="'.$mediaimgblock.'">';
		$output .= get_the_post_thumbnail($page->ID, 'thumbnail', array('class' => $thumbnailclass));
				  $output .= '</div>';

  $output .= '<div class="'.$mediablockcaption.'">';
  $output .= '<h4 class="media-heading">'.get_the_title($page->ID).'</h4><hr />';
  //$output .= strip_shortcodes(get_the_content());
$output .= truncate(strip_tags(  get_post_meta($page->ID, '_Overview', true) ),50);
  
  
  $output .= '</div>';
  $output .= '</a>';	
	  $output .= '</div>';
$i++;

 }
	$output .= "</div></div>";

} else {
	// no posts found
 

}

//$output .= '</div>';

echo $output;
	wp_reset_query();
	
           $args = array('post_type' => 'careers',     'post__not_in' => array(get_the_ID()),);    
        $the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) {    	?>    <h4>Other Vacancies</h4> 
                <?php 
			 $output;
			 
			 
// The Query

while ($the_query->have_posts() ) : $the_query->the_post();
echo '<a class="media" href="'.get_the_permalink(get_the_ID()).'">';

echo "<div class='media-left'>";	
echo get_the_post_thumbnail(get_the_ID(), 'thumbnail');
echo "</div>";	
echo "<div class='media-body'>";	
echo "<h5>". get_the_title()."</h5>";
echo "</div>";	
echo "</a>";

endwhile;
}?>
                </aside></div>
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
