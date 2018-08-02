<?php
/* ======== ======== ======== ======== ======== ======== */
/* Twitter									  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/twitter-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/tweets-module.php';

/* ======== ======== ======== ======== ======== ======== */
/* Blog Feed									  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/rss-blog-feed-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/network-blog-module.php';

/* ======== ======== ======== ======== ======== ======== */
/* Spotlight Feed								  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/spotlight-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Search Form    								  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/searchform-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* SubPage Grid    								  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/subpage-grid-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Latest News Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/latest-news-grid-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Publications Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/publications-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Publications Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/financialevents-module.php';
/* ======== ======== ======== ======== ======== ======== */

/* Carousel Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/carousel-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/carousel-image-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/carousel-testimonial-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Carousel Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/breadcrumb-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* PageHeader Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/page-header-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Page Block Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/pageblock.php';
/* ======== ======== ======== ======== ======== ======== */
/* Page Block Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/serviceblock-module.php';

/* ======== ======== ======== ======== ======== ======== */
/* Link Block Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/linkblockbuilder-module.php';
/* ======== ======== ======== ======== ======== ======== */
/* Page Block Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/network-sites-module.php';

/* Contact Slider						  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/contact-slider-module.php';


/* Timeline					  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/timeline-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/timelineitem-module.php';


/* Circle Nav					  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/circle-navigation-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/circlenavitem-module.php';


/* Contact Slider						  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/sitemap-module.php';

/* Accessibility					  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/accessibility-module.php';



/* Accessibility					  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/paginated-news-module.php';


/* Accessibility					  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/paginated-corporate-deals-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/paginated-talking-matters-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/paginated-talking-trainees-module.php';
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/paginated-housebuilder-markets-module.php';


/* ======== ======== ======== ======== ======== ======== */
/* Clearfix									  */
/* ======== ======== ======== ======== ======== ======== */
function clearfix_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"id" => 'id',
), $atts));
if ($class == 'addtop') { $classname = "add-top"; } ;
return '<div class="clear clr clearfix"></div>';
}
add_shortcode('clearfix', 'clearfix_shortcode');


// COLLAPSE
function collapse_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"ID" => 'ID',
), $atts));

return '<section class="accordion" id="'. esc_attr($ID) .'">  '.do_shortcode("$content").'
</section>';
}
add_shortcode('collapse', 'collapse_shortcode');

function collapse_group_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"ID" => 'ID',
"title" => 'title',
"number" => 'number',
), $atts));

return '<div class="accordion-group">
<div class="accordion-heading">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#'. esc_attr($ID) .'" href="#'. esc_attr($number) .'">
'. esc_attr($title) .'<b class="icon icon-plus pull-right"> </b></a>
</div>
<div id="'. esc_attr($number) .'" class="accordion-body collapse">
<div class="accordion-inner">

'.$content.'
</div>
</div>
</div>';

}
add_shortcode('collapsegroup', 'collapse_group_shortcode');

// BUTTON

function button_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"link" => 'link',
"datatoggle" => 'datatoggle',
), $atts));

return '<a class="btn" role="button" href="'. esc_attr($link) .'" data-toggle="'. esc_attr($datatoggle) .'">  '.$content.'
</a>';

}
add_shortcode('button', 'button_shortcode');

// TABS
function tab_nav_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"link" => 'link',
"active" => '',

), $atts));

return '<ul class="nav nav-tabs  ">'.do_shortcode("$content").'</ul>';

}
add_shortcode('tab_nav', 'tab_nav_shortcode');

function tab_inner_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"link" => 'link',
"active" => '',

), $atts));

return '<li class="'.$active.'"><a href="'.$link.'" data-toggle="tab">'.$content.'</a></li>';

}
add_shortcode('tab_inner', 'tab_inner_shortcode');

// TABS CONTENT

function tab_content_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"link" => 'link',
), $atts));

return '<div class="tab-content">'.do_shortcode("$content").'</div>';

}
add_shortcode('tab_content', 'tab_content_shortcode');

function tab_pane_shortcode($atts, $content = null) {
extract(shortcode_atts(array(
"id" => 'id',
"active" => '',
), $atts));

return '<div class="tab-pane '.$active.'" id="'.$id.'">'.$content.'</div>';

}
add_shortcode('tab_pane', 'tab_pane_shortcode');
// Pageblock

function pagetitle_func( $atts ) {

extract( shortcode_atts( array(
'pagetitle' => '{$pagetitle}'
), $atts ) );

$output = $pagetitle;

return "<h2>".$output."</h2>";
}
add_shortcode( 'pagetitle', 'pagetitle_func' );

//  Custom Field

function customfield_func( $atts ) {

extract( shortcode_atts( array(
'customfieldkey' => '{$customfieldkey}'
), $atts ) );

return get_post_meta($post->ID, $customfieldkey, true) . "<br/><br/>";
}
add_shortcode( 'customfield', 'customfield_func' );
/* ======== ======== ======== ======== ======== ======== */
/* Page Block Module							  */
/* ======== ======== ======== ======== ======== ======== */
require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/factblock.php';



/* ======== ======== ======== ======== ======== ======== */
/* Sector block								  */
/* ======== ======== ======== ======== ======== ======== */

function sectorblock_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'blockimage' => '{$blockimage}'
), $atts ) );
$args = array(
'post_type' => 'sectors',
'p' => $pageid,
);
$output;
global $post;
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
while ( $loop->have_posts() ) : $loop->the_post();
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';
	}
	$colour =get_post_meta(get_the_ID(), '_pagecolour', true);
	if (!empty($colour)){
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " .caption{ background:".$colour."; background:".hex2rgba($colour, 0.8)."}";
$GLOBALS['styles'] .= ".thumbnail.thumbnail-".get_the_ID(). " a:hover .caption{ background:".$colour."; background:".hex2rgba($colour, 0.5)."}";
	} else {
	$addclass=  'no-col-set';
	}



$output .= '<div class="thumbnail-'.get_the_ID().' thumbnail thumbnail-overlay '.$addclass.'">';
$output .= '<a href="'.get_the_permalink().'">';
if (!empty(wp_get_attachment_image( $blockimage, 'shortcode-slide' ))) {
$output .= wp_get_attachment_image( $blockimage, 'shortcode-slide' );
} else {
$output .= get_the_post_thumbnail($post->ID, "page-block-thumb");
}
$output .= '<div class="caption">';
$output .= '<h3>';
$output .= get_the_title();
$output .= '</h3>';
//$output .= wpb_js_remove_wpautop(get_post_meta($post->ID, "_cepageintro", true), true);
$output .= '</div>';
$output .= '</a>';
$output .= '</div>';


endwhile;
}
return $output;
}
add_shortcode( 'sectorblock', 'sectorblock_func' );


// Pageblock

function postblock_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}'
), $atts ) );

$args = array(
'p' => $pageid,
);
$output;
global $post;
$loop = new WP_Query( $args );
if ( $loop->have_posts() ) {
while ( $loop->have_posts() ) : $loop->the_post();
$output .= '<div class="pageblock-'.get_the_ID().' pageblock">';
$output .= '<a href="'.get_the_permalink().'">';
$output .= '<div class="cover"></div>';


$output .= '<div class="pageblock-img">';
$output .= get_the_post_thumbnail($post->ID, "page-block-thumb", array('class' => 'invisible'));
$output .= '</div>';
$output .= '<div class="caption">';
$output .= '<h2>';
$output .= get_the_title();
$output .= '</h2>';
$output .= wpb_js_remove_wpautop(get_post_meta($post->ID, "_cepageintro", true), true);
$output .= '</div>';
$output .= '</a>';
$output .= '</div>';

endwhile;
}
return $output;
}
add_shortcode( 'postblock', 'postblock_func' );

// Case Studies

function casestudies_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}'
), $atts ) );


$output;
global $post;
$ws = 1;
$args = array(
'post_type'=>'case_studies',
'order'=>'ASC',
'orderby'=>'menu_order',
'posts_per_page' => -1
);
$slug = the_slug();
query_posts($args);
$count=0;
if ( have_posts() ) {
$terms = get_terms("case-study-category", array('hide_empty' => true));
$output .= '<ul id="filter" class="nav nav-pills mb10">';

$output .= '<li class="active"><a  href="#" data-group="all">All</a></li>';

foreach ( $terms as $term ) {
$filters = strip_tags($term->name);
$filters = str_replace("&amp;", "", $filters);
$filters = str_replace(" ", "-", $filters);
$filters = strtolower($filters);


$output .= '<li><a href="#" data-group="'.$filters.'">'.$term->name.'</a></li>'; }
$output .= '</ul><div class="clearfix"></div>';

$output .= "<div class='row filter-grid'>";

while ( have_posts() ) : the_post();
$filters = get_the_term_list( $post->ID, 'case-study-category', '', ', ' );
$filters = strip_tags($filters);
$filters = str_replace("&amp;", "", $filters);
$filters = str_replace(" ", "-", $filters);
$filters = strtolower($filters);
$filters = '"'.$filters.'"';
$output .= "<div class='col-md-4 col-sm-4 col-xs-12 grid_brick'
data-groups='[\"all\", ".$filters." ]'><div class='pageblock-".get_the_ID()." pageblock casestudy-block'>";
$output .= '<div class="cover"></div>';

$output .= '<a href="'.get_the_permalink().'">';
$output .= '<div class="pageblock-img">';
$output .= get_the_post_thumbnail($post->ID, "page-block-thumb", array('class' => 'invisible'));
$output .= '</div>';
$output .= '<div class="caption">';
$output .= '<h2>';
$output .= strip_tags(get_the_title());
$output .= '</h2>';
$output .= wpb_js_remove_wpautop(get_post_meta($post->ID, "_cepageintro", true), true);
$output .= '</div>';
$output .= '</a>';
$output .= '</div></div>';

endwhile;
$output .= "<div class='col-xs-1 shuffle_sizer'></div></div>";
wp_reset_query();
} ?>
<?php
return $output;
}
add_shortcode( 'casestudies', 'casestudies_func' );




function testimonials_shortcode($atts) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
), $atts));
wp_reset_query();global $post;
$output;
$output .= "<div class='row shortcode'>";
$ws = 1;
$args2 = array( 'post_type' => 'testimonials', 'testimonials-category' => 'services-testimonials', 'order' => 'ASC', 'orderby' => 'menu_order', 'post_per_page'=>-1);
query_posts( $args2 ); while (have_posts()) : the_post();
$homepagetestimonial =  get_post_meta($post->ID, "_showtestimonialonhomepage", true);
$hidefromgrid =  get_post_meta($post->ID, "_hidefromgrid", true);

$output .= '<figure class="col-md-4 col-sm-6 testimonial-block">';
$output .= '<blockquote id="testimonial-'.get_the_ID().'">
<p class="ellipsis"><span><em class="icon icon-quote large"><span class="sr-only">Quotation</span></em>';
$output .= get_the_content();
$output .= ' </span></p>
</blockquote>

<figcaption class="mb-attribution">';
if ( has_post_thumbnail()) {
//$output .= '<div class="mb-thumb">'.the_post_thumbnail('sideimagegrid', array('class'	=> " testimonial-img  float-right ", "thumbnail")).
'</div>';
$output .= '<p class="mb-author">'. get_post_meta($post->ID, "_testimonials_author", true).'</p>
<cite >';
$testimoniallink = get_post_meta($post->ID, "_testimonials_link", true);
if (!empty($testimoniallink)) {
$output .= '<a href="'.$testimoniallink.'">';
}
$output .=  get_post_meta($post->ID, "_testimonials_author_company", true);

if (!empty($testimoniallink)) { $output .= '</a>'; }
$output .= '</cite>
</figcaption>
</figure>';
}
$ws++;
endwhile;
wp_reset_query();

$output .= "</div>";

return $output;

}
add_shortcode('testimonials', 'testimonials_shortcode');

function testimonialintro_shortcode($atts) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
"forcasestudy" => "{$forcasestudy}"

), $atts));
wp_reset_query();global $post;
$output;
$ws = 1;
$args2 = array( 'post_type' => 'testimonials', 'for-case-study' => $forcasestudy);
query_posts( $args2 ); while (have_posts()) : the_post();
$homepagetestimonial =  get_post_meta($post->ID, "_showtestimonialonhomepage", true);
$output .= '<figure class="shortcode introtext intro-testimonial">';
$output .= '<blockquote id="testimonial-'.get_the_ID().'">
<p><span><em class="icon icon-quotes large extra-large"><span class="sr-only">Quotation</span></em>';
$output .= get_the_content();
$output .= ' </span></p>
</blockquote>

<figcaption class="mb-attribution">';
if ( has_post_thumbnail()) {
//$output .= '<div class="mb-thumb">'.the_post_thumbnail('sideimagegrid', array('class'	=> " testimonial-img  float-right ", "thumbnail")).
'</div>';
}
$output .= '<p class="mb-author">'. get_post_meta($post->ID, "_testimonials_author", true).'</p>
<cite >';
$testimoniallink = get_post_meta($post->ID, "_testimonials_link", true);
if (!empty($testimoniallink)) {
$output .= '<a href="'.$testimoniallink.'">';
}
$output .=  get_post_meta($post->ID, "_testimonials_author_company", true);

if (!empty($testimoniallink)) { $output .= '</a>'; }
$output .= '</cite>
</figcaption>
</figure>';
$ws++;
endwhile;
wp_reset_query();

return $output;

}
add_shortcode('testimonialintro', 'testimonialintro_shortcode');

// Clients
function clients_shortcode($atts) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
), $atts));
wp_reset_query();global $post;
$output;
$terms = get_terms("clients-category", array('hide_empty' => true));
$output .= '<ul id="filter" class="nav nav-pills mb10">';
$output .= '<li class="active"><a  href="#" data-group="all">All</a></li>';
foreach ( $terms as $term ) {
$filters = strip_tags($term->name);
$filters = str_replace("&amp;", "", $filters);
$filters = str_replace(" ", "-", $filters);
$filters = strtolower($filters);
$output .= '<li><a href="#" data-group="'.$filters.'">'.$term->name.'</a></li>'; }
$output .= '</ul><div class="clearfix"></div>';
$output .= "<div class='row filter-grid'>";
query_posts(array('post_type' => 'clients',  'order' => 'ASC', 'orderby'=>'title', 'posts_per_page'=> -1)); ?>
<?php while (have_posts()) : the_post();
$filters = get_the_term_list( $post->ID, 'clients-category', '', ', ' );

$filters = strip_tags($filters);
$filters = str_replace("&amp;", "", $filters);
$filters = str_replace(" ", "-", $filters);
$filters = strtolower($filters);
$filters = '"'.$filters.'"';
$clienturl = get_post_meta($post->ID, "_clienturl", true);
$output .=  "<div class='col-md-2 col-sm-3 col-xs-6 col-sm-6 grid_brick mb20' data-groups='[\"all\", ".$filters." ]'>";
if ($clienturl !== 'none') { $output .= '<a href="'.$clienturl.'">';
} $output .= get_the_post_thumbnail($post->ID, "page-block-thumb", array('class' => 'img-thumbnail'));
$output .='<h2 class="sr-only">';
$output .= get_the_title();
$output .= '</h2>';
if ($clienturl !== 'none') { $output .= '</a>'; }
$output .= '</div>';
$filters ="";
endwhile;
$output .= "<div class='col-xs-1 shuffle_sizer'></div></div>";

$output .= "</div>";
wp_reset_query();
return $output;
}
add_shortcode('clients', 'clients_shortcode');



// MODAL

function modal_shortcode($atts, $content) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
"title" => '{$modal_title}',

), $atts));

return '<div  id="'. $el_id .'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="'. $el_id .'" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="'. $el_id .'">'. esc_attr($title) .'</h3>
</div>

<div class="modal-body">
'.do_shortcode($content).'
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
</div>';

}
add_shortcode('modal', 'modal_shortcode');


function home_url_shortcode($atts, $content) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
"title" => '{$modal_title}',

), $atts));

return home_url();

}
add_shortcode('home_url', 'home_url_shortcode');

function social_share_shortcode($atts, $content) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
"dropupdown" => '{$dropupdown}',

), $atts));
 $output;
 if($dropupdown == 'up') {
$theclass= 'dropup'	;
 } else {
	 $theclass= 'dropdown'	;

 }
 $output .= '<hr /><div class="post-meta mt10"><div class="'.$theclass.'">
  <button class="btn btn-link dropdown-toggle" type="button" id="ShareMenu-'.$count.'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
  <em class="icon icon-share"><span class="sr-only">Share</span></em> Share
  </button>
  <ul class="dropdown-menu social-dropdown-menu" aria-labelledby="ShareMenu-'.$count.'">';
   global $post; $orignaltitle = get_the_title();
$prefix = get_bloginfo('name') . ' - ';
$thetitle =  $prefix.$orignaltitle;
$hashtags = $thetitle;
$output .= '<li class="email">';
$output .= '<a href="mailto:?subject='.str_replace(' ', '%20', $thetitle).'&amp;body='. str_replace(' ', '%20', $thetitle).':%0D'.get_the_permalink().'">
 <span class="icon-mail"> </span> <span class="sr-only">email</span> </a> </li>';
$output .= '<li class="facebook"> <a href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-facebook"> </span> <span class="sr-only">facebook</span> </a> </li>';
$thelinkedintitle = str_replace('.', '\.', $thelinkedintitle);
$output .= '<li class="linkedin"> <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. get_the_permalink().'&amp;title='.str_replace(' ', '%20', $thelinkedintitle).'" class="popup" target="_blank"> <span class="icon-social-linkedin"></span> <span class="sr-only">linkedin</span> </a> </li>';
$output.= '<li class="twitter"> <a href="http://twitter.com/home?status='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" data-hashtags="'.$hashtags.'" class="popup" target="_blank"> <span class="icon-social-twitter"> </span> <span class="sr-only">twitter</span> </a> </li>';
$output .= '<li class="googleplus"> <a href="https://plus.google.com/share?url='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" class="popup" target="_blank"> <span class="icon-social-google-plus"> </span> <span class="sr-only">google+</span> </a> </li>';
$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
$output .= '<li class="pinterest">
	   <a href="http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;media='.$url.'&amp;description='.str_replace(' ', '%20', $thetitle).'%20'.get_the_permalink().'" target="_blank"> <span class="icon-social-pinterest"> </span> <span class="sr-only">pinterest</span> </a> </li>';

  $output .= '</ul>
</div>';
$output .= '</a>';
if(get_option('themetype') == 'blog') {
$output .='<em class="icon icon-eye"><span class="sr-only">Views</span></em>'.(my_get_post_views()).'<em class="icon icon-comment"><span class="sr-only">Comment</span></em>'.get_comments_number()." Comment<small>(s)</small>";
}
$output .="</div>";

 return  $output;
}
add_shortcode('social_share', 'social_share_shortcode');


function gigya_shortcode($atts, $content) {
extract(shortcode_atts(array(
"el_id" => '',
"src" => '',
"width" => '',
"height" => '',
"style" => ''
), $atts));
 $output;
 $pos = strpos($src, 'embed_player.swf');
if ($pos !== false) {
   $src = str_replace('https://', '', $src);
  $src = str_replace('.cloudfront.net/cdn/embed_player.swf', '', $src);
$src ='http://embeds.audioboom.com/boos/3901412-a-heavyweight-problem-removing-travellers-from-development-sites/embed/v4?eid='.$src;

} else {
	$src = $src;
}

$output .= '<iframe width="'.$width.'" height="400" style="'.$style.'" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="'.$src.'" title="Gateley Plc"></iframe>';

 return  $output;
}
add_shortcode('gigya', 'gigya_shortcode');

function iframe_shortcode($atts, $content) {
extract(shortcode_atts(array(
"el_id" => '{$el_id}',
"title" => '{$title}',
"src" => '{$src}',
"height" => '{$height}',
"width" => '{$width}',
"showfeedtitle" => '{$showfeedtitle}',
"showfeedcontent" => '{$showfeedcontent}',
"link" => '{$link}',
"disclaimer" => '{$disclaimer}',
"type" => "{$type}",
"css" => '{$css}'
), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

$output;
$output .= "<div class='".esc_attr( $css_class )." relative zindex100'>";

if($type == 'feedblock') {
if($showfeedtitle !== 'no') {
$output .= '<div class="investors-header">'.$title.'</div>';
}
$output .= '<div class="feed-wrapper no-pad iframe-wrapper">';
$output .= '<iframe src="'.$src.'" height="'.$height.'px" width="100%"></iframe>';
 if($showfeedcontent !== 'no') {
$thelink = vc_build_link( $link );
$link = $thelink['url'];
$output .= '<div class="feed-content-wrapper text-center">
<a href="'.$link.'" class="btn btn-primary btn-block">View Share Price Table</a>
<div class="mt10"><small class="clear">'.$disclaimer.'</small></div>
</div>';
 }

$output .= '</div>';
 } else {

 $output .='<div class="fluidMedia">';
  $output .=' <iframe src="'.$src.'"></iframe>';
 $output .='</div>';
 }
  $output .='</div>';

return $output;
}
add_shortcode('iframe', 'iframe_shortcode');
