<?php // Carousel Items
function circle_nav_item_shortcode($atts) {  
extract(shortcode_atts(array( 
"sym" => "",
"a" => "",
"datecaption" => "{$datecaption}",
"el_id" => 'carousel-testimonial-item-'.$post->ID.'-'.rand(),
"slidetextcol" => '{$slidetextcol}',
"caption_company" => '{$caption_company}'
), $atts));
wp_reset_query();global $post;
$output = array();

$output[$sym] = '<symbol viewBox="0 0 40 40" id="icon-1" class="icon icon-"><!--Replace the contents of this symbol with the content of your icon--><rect height="100%" width="100%" stroke-width="1" stroke="#111" fill="none"></rect><text font-size="1.2em" text-anchor="middle" dy=".3em" y="50%" x="50%" fill="#222">1</text></symbol>';

$output[$a] = ' <a data-svg-origin="250 250" transform="matrix(1,0,0,1,0,0)" xlink:target="_parent" xlink:title="" xlink:href="" tabindex="0" role="link" id="item-1" class="item"><path d="M250,250 l250,0 A250,250 0 0,0 250.00000000000003,0 z" class="sector" stroke-width="1" stroke="#111" fill="none"></path><use transform="rotate(45 365.96551513671875 134.03448486328125)" y="114.03448486328125" x="345.96551513671875" height="40" width="40" xlink:href="#icon-1"></use></a>';


return $output;

}
add_shortcode('circle_nav_item', 'circle_nav_item_shortcode');