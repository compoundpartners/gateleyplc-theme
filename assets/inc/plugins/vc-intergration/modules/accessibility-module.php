<?php /* ======== ======== ======== ======== ======== ======== */
/*  Accessibility 								  */	
/* ======== ======== ======== ======== ======== ======== */
function  accessibility_shortcode($atts, $content = null) {  
extract(shortcode_atts(array( 
"id" => 'id',
), $atts));

$output;
$output .= '<div class="btn-group" role="group" aria-label="...">';
		if($_COOKIE['gateley_al'] == 'AAA') {
		$aaaselect = 'active';	
		} elseif($_COOKIE['gateley_al'] == 'AA') {
					$aaselect = 'active';	

		} else {
			$aselect = 'active';	
		}
$output .= '<button id="accessA" onClick="setCookie(\'gateley_al\', \'A\'); location.reload(); " class="btn btn-primary '.$aselect.'">Level A</button>';
$output .= '<button id="accessAA" onClick="setCookie(\'gateley_al\', \'AA\');  location.reload(); " class="btn btn-primary '.$aaselect.'">Level AA</button> ';
$output .= '<button id="accessAAA" onClick="setCookie(\'gateley_al\', \'AAA\');  location.reload(); " class="btn btn-primary '.$aaaselect.'">Level AAA</button> ';
$output .= '</div>';

return $output;
}
add_shortcode('accessibility', 'accessibility_shortcode'); 