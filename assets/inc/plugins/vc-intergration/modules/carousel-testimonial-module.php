<?php // Carousel Items
function testimonialcarouselitem_shortcode($atts) {  
extract(shortcode_atts(array( 
"caption_tag" => "{$caption_tag}",
"caption_testimonial" => "{$caption_testimonial}",
"slidecol" => '{$slidecol}',
"el_id" => 'carousel-testimonial-item-'.$post->ID.'-'.rand(),
"slidetextcol" => '{$slidetextcol}',
"caption_company" => '{$caption_company}'
), $atts));
wp_reset_query();global $post;
$output;

$output .='<figure class=" swiper-slide item '.$activeslide . ' ' . $ws.'">';
$output .='<blockquote>
<div class="icon-block"><em class="icon icon-quote-left large"><span class="sr-only">Quotes</span></em></div>
<div class="blockquote-content">
'.str_replace(array('”', '“'), "", $caption_testimonial).'”
</div></blockquote>

<figcaption class="attribution">';
$output .= '<p class="author">'. $caption_tag.'</p>
<cite>';
$testimoniallink = get_post_meta($post->ID, "_testimonials_link", true);
if (!empty($testimoniallink)) {
$output .= '<a href="'.$testimoniallink.'">';
}
$output .=  '<cite>'.get_post_meta($post->ID, "_testimonials_author_company", true).'</cite>';

if (!empty($testimoniallink)) { $output .= '</a>'; }
$output .= '</cite>
</figcaption>
</figure>';
$ws++;

return $output;

}
add_shortcode('testimonialcarouselitem', 'testimonialcarouselitem_shortcode');