<?php $output .='<div class="media media-'.get_post_type().' '.get_post_type().' white '.$displaytype.'  media-'.get_the_ID().' ">';
if($popuplink =='yes') {	

$link = "#person-".get_the_ID(); $linkclass= "open-popup-link";
} else {
$link = get_the_permalink();	
}

$output .='<div class="media-body matchHeight no-image">';
$output .='<a  href="'.$link.'" class="'.$linkclass.'" >';
$output .= '<h4 class="media-heading">'.$thetitle.'</h4>';
if ('people' == get_post_type() ) {
 $output .='<h5>'.get_post_meta($post->ID, '_jobRole', true).'</h5></a>';

 $output .='<ul class="contact-list">
                              <li>
                                   <strong>Location.</strong> ';
					$terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	 $looping = 1;
	 $countingterms = count($terms);
     foreach ( $terms as $term ) {
        $output .= $term;
	  
	  if( $countingterms  > 1) { $output .=', '; }
	  $looping++;
        
     }
 }
          $output .='</li>';
                       
						 if( get_post_meta($post->ID, '_personNumber', true)) {
                              $output .=' <li><strong>Telephone.</strong>';
                                   $output .= get_post_meta($post->ID, '_personNumber', true) .'</li>';
                              } 
						 if(get_post_meta($post->ID, '_personEmail', true)) {
                              $output .= '<li>';
                                  $output .= ' <strong>Email.</strong> ';
                                   $output .= '<a href="mailto:'. get_post_meta($post->ID, '_personEmail', true).'">'.get_the_title().'</a>';
                              $output .= '  </li>';
                              } 
						 $output .= '</ul>';
}

if($showcontent == 'yes') {
$output .= truncate( strip_tags(get_post_meta(get_the_ID(), '_Overview', true)) ,70);

}
$output .='</a>';

$output .='</div>';
$output .='</div>';
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
	
	$colour = get_post_meta($post->ID, '_pagecolour', true);
	if (!empty($colour)){
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
	} else {
	$addclass=  'no-col-set';	
	}
	?>