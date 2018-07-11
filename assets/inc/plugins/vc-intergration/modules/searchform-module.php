<?php 
/* ======== ======== ======== ======== ======== ======== */
/* Search Form  								  */	
/* ======== ======== ======== ======== ======== ======== */

function searchform_func( $atts ) {
extract( shortcode_atts( array(
'searchtitle' => '{$searchtitle}',
'searchcontent' => '{$searchcontent}'
), $atts ) );

$output;
$output .='<div class="widget-searchform">';

if ($searchtitle !== ' ') {$output .='<h4>'.$searchtitle.'</h4>'.$searchcontent; }
$idnumber = get_the_ID() . "-" . rand();
$output .= '<form action="'.home_url().'" class="searchform searchform-inpage form-inline" id="searchform" method="get">
	 <div class="form-group"><label for="s-'.$idnumber.'" class="screen-reader-text">Search for:</label>
	<input type="text" class="form-control input-lg" placeholder="Search" id="s-'.$idnumber.'" name="s" value="">
	</div> <button class="btn 
	btn-link" type="submit"><em class="icon-search"><span class="sr-only">Search</span></em> </button>
	</form></div>  ';
return $output;
}
add_shortcode( 'searchform', 'searchform_func' );