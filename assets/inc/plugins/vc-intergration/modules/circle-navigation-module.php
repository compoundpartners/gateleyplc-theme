<?php 
// Carousel
function circlenav_shortcode($atts, $content) { 

global $post; 
extract(shortcode_atts(array( 
"title" => 'title',
"barbottom" => '{$barbottom}',
"el_id" => 'circlenav-'.rand(),
'css' => '',
'pages' => '{$pages}'
), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
  
;
$output = '';
$output .= '<section class="circlenav '.esc_attr( $css_class ).'" id="'.$el_id.'">';

 $output .= '<div class="clear nosvg-hide" style="position: relative;
	padding-bottom: 100%;
	height: 0;">

<svg style="transform-origin: 50% 50% 0px; transform: translate3d(0px, 0px, 0px); -moz-user-select: none;	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-2 -2 504 504" id="menu" class="svg">';

$output .='<g id="symbolsContainer">   ';
$arr=explode(",",$pages);
$i = 1;
foreach($arr as $page) {
$output .= '<symbol viewBox="0 0 100% 40" id="icon-'. $i.'" class="svg-text svg-text-'. $i.'" style="overflow:visible"><!--Replace the contents of this symbol with the content of your icon--><rect height="100%" width="100%" stroke-width="0" stroke="#111" fill="none"></rect><text font-size="1em" text-anchor="middle"  y="50%" x="50%" fill="#fff"> <tspan x="0" dy="1.2em">'.preg_replace('~((\w+\s){2})~', '$1</tspan><tspan x="0" dy="1.2em">', get_the_title($page)).' </tspan></text></symbol>';
$i++;
}

$output .='
</g>

<g id="itemsContainer"> ';



$links = 1;
foreach($arr as $page) {
	if ($links == 1) {
		$transform = 'matrix(0,-1,1,0,0,500)';
		
		$rotate = 'rotate(90 357.96551513671875 156.03448486328125)';
	} elseif ($links == 2) {
		$transform = 'matrix(1,0,0,1,0,0)';
		$rotate = 'rotate(0 357.96551513671875 156.03448486328125)';


	}elseif ($links == 3) {
		$transform = 'matrix(-1,0,0,-1,500,500)';
		$rotate = 'rotate(180 346.96551513671875 140.03448486328125)';

	}elseif ($links == 4) {
		$transform = 'matrix(0,1,-1,0,500.00000000000006,0)';
				$rotate = 'rotate(-90 356.96551513671875 136.03448486328125)';


	}
$output .= ' <a data-svg-origin="250 250" transform="'.$transform.'"   xlink:target="_parent" xlink:title="" xlink:href="'.get_the_permalink($page).'" tabindex="0" role="link" id="item-'.$links.'" class="item circle-nav-item-'.$links.'"><path fill="url(#image-'.$links.')" d="M250,250 l250,0 A250,250 0 0,0 250.00000000000003,0 z" class="sector" stroke-width="0" stroke="#111" ></path><use transform="'.$rotate.'" y="114.03448486328125" x="345.96551513671875" style="overflow:visible;" height="40" width="40" xlink:href="#icon-'.$links.'"></use></a>';




$links++;
}
 
//$output .= $content['a'];
$patcount = 1;
 $output .='<defs>';
foreach($arr as $page) {
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $page), 'large' );
	if ($patcount == 1) {
		$rotate = 'rotate(90 363.96551513671875 225.03448486328125)';
				$Y="-50";

	} elseif ($patcount == 2) {
		$rotate = 'rotate(0 365.96551513671875 225.03448486328125)';
		$Y="-100";


	}elseif ($patcount == 3) {
		$rotate = 'rotate(180 365.96551513671875 225.03448486328125)';
						$Y="0";


	}elseif ($patcount == 4) {
				$rotate = 'rotate(-90 365.96551513671875 225.03448486328125)';
								$Y="0";



	}
	 if (has_post_thumbnail( $page ) ): 
 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page), 'large' );

if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
	
$GLOBALS['styles'] .= '.circle-nav-item-'.$patcount. ':hover .sector {fill:url(#image-hover-'.$patcount.');}';
endif;


$output .='

    
    <pattern id="image-hover-'.$patcount.'" patternUnits="userSpaceOnUse" height="100%" width="100%" patternTransform="'.$rotate.'">
      <image x="0" y="'.$Y.'" height="100%" width="100%" xlink:href="'.$image[0].'"></image>
	    <rect width="200%" height="200%" fill-opacity="0.9" style="fill:#89d4d4;fill-opacity:0.9" />
    </pattern>
  
  
  ';
  
  $output .='

    
    <pattern id="image-'.$patcount.'" patternUnits="userSpaceOnUse" height="100%" width="100%" patternTransform="'.$rotate.'">
      <image x="0" y="'.$Y.'" height="100%" width="100%" xlink:href="'.$image[0].'"></image>
	    <rect width="200%" height="200%" fill-opacity="0.8" style="fill:#3d1a54;fill-opacity:0.8" />
    </pattern>
  
  
  ';
  
 
  $patcount++;
}
 $output .='</defs>';



 $output .= '
</g>
<g id="trigger" class="trigger menu-trigger" role="button">
<circle cx="250" cy="250" r="80"></circle>
 <text  text-anchor="middle" x="250" y="220" fill="#fff" font-size="1.2em" font-family="verdana"><tspan x="50%" dy="1.2em">'.preg_replace('~((\w+\s){1})~', '$1</tspan><tspan x="50%" dy="1.2em">', $title).' </tspan></text>
</g>
</svg>
</div>
';

	
$output .= '<div class="svg-fallback">'.do_shortcode($content).'</div>';

$output .= '</section>';

return $output;
}
add_shortcode('circlenav', 'circlenav_shortcode'); 