<?php // Latest News 

function financialevents_func( $atts ) {

extract( shortcode_atts( array(
'pageid' => '{$pageid}',
'title' => '{$title}',
'showcontent' => '{$showcontent}',
'newsurl' => '{$newsurl}',
'postmeta' => '{$postmeta}'
), $atts ) );
$output;
wp_reset_query();
global $post;
$ws = 1;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
$args = array(
'post_type'=>'financialevents',
'order'=>'DESC',
'posts_per_page' => 16,
'paged' => $paged
//'orderby'=>'menu_order'
);
$slug = the_slug();
query_posts($args); 
  global $wp_query; 
	    $postcount = $wp_query->found_posts;   
$count=0;
if(have_posts()) { 

       
	    
$output .= "<div class='vc_row clearfix'>";

while (have_posts()) : the_post(); 
global $post;

if(($count+1) % 2 != 0){ 

if(($count) % 4 != 0){ 
$class= 'white-bar';

} else {
$class= 'grey-bar';
}

//$output .= "<div class='".$class."'>";
}

$output .= '<div class="vc_col-md-6">';
$attachment = get_post_meta(get_the_ID(), '_publication', true);

$output .= '<div class="media financialevents">';
$output .= '<div class="media-left">';


$output .="<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>'; 
 $output .= "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';  

  $output .= '</div>';
  $output .= '<div class="media-body">';
  

  $output .= '<h4 class="media-heading">'.get_the_title().'</h4>';
if($showcontent == 'yes') {
$output	.= truncate(get_post_meta($post->ID, '_Overview', true), 80);
}

  $output .= '</div>';
  $output .= '</div>';	

  $output .= '</div>';	

if ($count % 2 != 0) { 
$output .= "<hr>";
}


$count++;
endwhile;


  $output .= 	"</div><div class='vc_row clearfix'><div class='white-bar'>".page_pagination()."</div></div>"; 

wp_reset_query();
}
return $output;

}
add_shortcode( 'financialevents', 'financialevents_func' );
