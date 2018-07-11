<?php // Carousel Items
function timelineitem_shortcode($atts) {  
extract(shortcode_atts(array( 
"caption_tag" => "{$caption_tag}",
"caption" => "{$caption}",
"datecaption" => "{$datecaption}",
"el_id" => 'carousel-testimonial-item-'.$post->ID.'-'.rand(),
"slidetextcol" => '{$slidetextcol}',
"caption_company" => '{$caption_company}'
), $atts));
wp_reset_query();global $post;
$output;

$output .='<article class="timeline-item">
		<a class="timeline-item-img" href="#non">
'.$datecaption.'		</a>
			
		<div class="timeline-item-body">
			<div class="text">
			  <p>'.$caption.'</p>
			</div>
		</div>
	</article>';
	
return $output;

}
add_shortcode('timelineitem', 'timelineitem_shortcode');