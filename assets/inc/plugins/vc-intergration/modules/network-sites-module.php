<?php // SubPage Gride
function networksites_func( $atts ) {
wp_reset_query();
extract( shortcode_atts( array(
'title' => '{$title}',
'posttypes' => '{$posttypes}',
'pageid' => '{$pageid}',
'displaytype' => '{$displaytype}',
'taxquery' => '{$taxquery}',
'popuplink' => '{$popuplink}',
'columns' => '{$columns}',
'tabletcolumns' => '{$tabletcolumns}',
'showtitle' => '{$showtitle}',
'showlink' => '{$showlink}',
'thelink' => '{$thelink}',
'headercontainer' => '{$headercontainer}',
'amountofposts' => '{$amountofposts}',
'showcontent' => '{$showcontent}',
'sibsorchild' => '{$sibsorchild}',
'excludesites' => '{$excludesites}'

), $atts ) );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

$args = array(
'page_id' => $pageid,
);
$output;
$original_blog_id = get_current_blog_id(); // get current blog
$bids = wp_get_sites(); // all the blog_id's to loop through


foreach($bids as $bid):
if (in_array($bid["blog_id"], array($excludesites) )) { 
} else {
       switch_to_blog($bid); //switched to blog with blog_id $bid
       // ... your code for each blog ...
	  $bloginfo = get_blog_details($bid);
	 $array = json_decode(json_encode($bloginfo), true);
	 //$output .= $array["blogname"];
	//echo $bid["blog_id"];
	 //echo $excludesites;
}
endforeach ; 
switch_to_blog( $original_blog_id ); 





global $post;
$isSubpage = $post->post_parent;
if (!empty($isSubpage)){ 
$parent = $post->post_parent;
} else {
$parent = $post->ID;
}
$args = array();
$args['post_type'] = array($posttypes);

if(is_numeric($amountofposts) && $amountofposts !== -1) {
	$args['posts_per_page'] = $amountofposts;

} else {
	$args['posts_per_page'] = -1;
	
}

if ($posttypes == 'page') {
	if($sibsorchild == 'child') {
		$args['post_parent'] = get_the_ID();
	} else{
		global $post;
	$args['post_parent'] = $post->post_parent;	
	}



if(!empty($postnotin)){
	$postnotin = array($postnotin);
			$args['post__not_in'] = array($postnotin);

}
}
if($taxquery == 'yes') {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'gateley_plc_sector',
			'field'    => 'name',
			'terms'    => get_the_title(),
		),
	);
}
if(get_post_type() == 'event') {

$args['order']= 'ASC';
$args['orderby'] = 'meta_value';
$args['meta_key'] = '_event_start_date';
	
}


//var_dump($args);
//$output .=$displaytype;
// The Query
//$output .= $networkquery . ' '. $whichsite;
if($networkquery == 'yes') {
$original_blog_id = get_current_blog_id(); 
switch_to_blog($whichsite);	

}
$the_query = new WP_Query( $args );

 $count = $the_query->post_count; 
 
 if ($columns == 'default' || $columns == '') {
if ($count % 3 == 0 || 'people' !== get_post_type()) {
$classes = 'vc_col-md-4 vc_col-sm-4 vc_col-xs-12';	
} else{
$classes = 'vc_col-md-3 vc_col-sm-3 vc_col-xs-12';	
} 
}elseif($columns == 'vc_col-md-12') {
	$classes = '';
} elseif($columns == 'no-column') {
	$classes = '';
} else {
	$classes = $columns . ' vc_col-xs-12 ' . $tabletcolumns;
}

if ( $the_query->have_posts() ) {
	global $post;
setup_postdata( get_the_ID() );
$output .= "<div class='".esc_attr( $css_class )."'>";
	if ($showtitle == 'yes') {
if ($headercontainer == 'yes') {
	$output .="<div class='title-header'>"; }
		$output .="<h4>".$title."</h4>";
$thelink = vc_build_link( $thelink );
if ($showlink == 'yes') {$output .="<a href='".$thelink['url']."' class='btn pull-right'>";
if (!empty($thelink['title'])) {
$output .=$thelink['title'];
} else {
$output .="View All";
}
$output .="</a>";
//var_dump($thelink);
 }
if ($headercontainer == 'yes') {	$output .="</div>"; }
}
	if($columngrid == 'yes') {  $row = ' vc_row '; }
$output .="<div class='clear clearfix ".$el_id." ".$row."'>";	


//$output .="<div class='vc_row mt30'>";
while ($the_query->have_posts() ) : $the_query->the_post();			
	if($popuplink =='yes') {	
	$containerclass= 'popup-container';
	}
if(!empty($title)) {
}
$output .='<div class="'.$classes .' '.$containerclass.'">';
if($popuplink =='yes') {	

if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	
$GLOBALS['script'] .="
	$(document).ready(function() {
		$('.open-popup-link').magnificPopup({
			  type:'inline',
			  midClick: true
		});
	});";
}
if($masonry =='yes') {
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
$GLOBALS['script'] .="
	$(document).ready(function() {
		$('.".$el_id."').isotope();
	});";
}
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
	
if ('people' == get_post_type() || $displaytype == "medialist" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list.php';
	
} elseif($displaytype == "medialistnoimage" ) {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list-no-image.php';

	
} elseif($displaytype == "list") { 

	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/list.php';


}else {
	require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/overlay-grid.php';
		
}
$output .="</div>";
if($popuplink =='yes') {	
$output .='<div id="'.get_post_type().'-'.get_the_ID().'" class="white-popup-block mfp-hide animated">';
get_template_part( 'assets/template-parts/popup/content', 'popup-'.get_post_type());
$output .='</div>';
}
endwhile;
$output .= "</div>";

$output .='</div>';
wp_reset_postdata();
}
wp_reset_postdata();
if($networkquery == 'yes') {
switch_to_blog( $original_blog_id );	
}
if($masonry =='yes') {
wp_enqueue_style( 'isotope-css' );
wp_enqueue_script( 'isotope' );
}
return $output;

}
add_shortcode( 'networksites', 'networksites_func' );