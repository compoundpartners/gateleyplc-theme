<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */
?>

<article id="person-thumb-<?php the_ID(); ?>" class=" vc_col-md-4 vc_col-sm-6 people ">
     <a class="media ajax-popup-link matchHeight" href="<?php echo home_url(); ?>/popup/?person=<?php echo get_the_ID(); ?>">
     
 

     <div class="media-left"><?php echo get_the_post_thumbnail($post->ID, "thumbnail", array('class' => 'media-object invisible'))?>
     </div>
     <div class="media-body ">
          <header class="entry-header">
               <?php echo "<h3 class='entry-title'>".get_the_title()."</h3>"; ?>
          </header>
          <!-- .entry-header -->
          
          <div class="entry-summary">
               <?php 
		if ('people' == get_post_type() ) {
echo '<h5>'.get_post_meta($post->ID, '_jobRole', true).'</h5>';
$dep= get_post_meta($post->ID, '_personDepartment', true);
if(!empty($dep)) {
echo ' <strong>Department:</strong> '.get_post_meta($post->ID, '_personDepartment', true);
}
echo '<ul class="contact-list">';

$terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                             echo ' <li>
                                   <strong>Location:</strong> ';
               

	 $looping = 1;
	 $countingterms = count($terms);
     foreach ( $terms as $term ) {
        echo  $term." ";
	  
	 // if( $countingterms  > 1) { $output .= ', '; }
	  $looping++;
        
     }

 echo "</li>";
  }
				   
						 if( get_post_meta($post->ID, '_personNumber', true)) {
                             echo ' <li><strong>Tel:</strong>';
                                   echo get_post_meta($post->ID, '_personNumber', true) .'</li>';
                              }  echo  '</ul>';
}?>
          </div>
          <!-- .entry-summary -->
     </div>
     </a>
</article>
<?php /*
echo'<div id="person-'.get_the_ID().'" class="white-popup-block mfp-hide animated">';

 
      			get_template_part( 'assets/template-parts/popup/content', 'popup-people');

echo '</div>';
*/
?>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium', false );
$url = $thumb['0'];
$GLOBALS['styles'] .= "#person-thumb-".get_the_ID()." .media-left{ background:url(".$url."); background-size:cover; background-position:center center;}"; ?>
