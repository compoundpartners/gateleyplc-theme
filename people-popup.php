<?php
/**
 * Template Name: Popup Page
 *
 * @package WordPress
 * @package gateley-plc 
 */
 include( 'wp-load.php' ); // loads WordPress Environment
 if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{ } else {
  wp_redirect( get_the_permalink($_GET['person']) ); exit;
}
if(!isset($_GET['pt'])) {

if(isset($_GET['person'])) {
	$id = $_GET['person'];	
$args = array(
    'p' => $id,
    'post_type' =>  'people'
);
$custom_query = new WP_query( $args );

if( $custom_query->have_posts() ) {
   $custom_query->the_post();
        
echo'<div id="person-'.get_the_ID().'" class="white-popup-block ">';
	      			get_template_part( 'assets/template-parts/popup/content', 'popup-people');



echo '</div>';

   wp_reset_postdata();
}
wp_reset_query();
}
} else {
if(isset($_GET['id'])) {
	$id = $_GET['id'];	
	$pt = $_GET['pt'];	

$args = array(
    'p' => $id,
    'post_type' =>  $pt
);
$custom_query = new WP_query( $args );

if( $custom_query->have_posts() ) {
   $custom_query->the_post();
        
echo'<div id="person-'.get_the_ID().'" class="white-popup-block ">';
	      			get_template_part( 'assets/template-parts/popup/content', 'popup-career');



echo '</div>';

   wp_reset_postdata();
}
wp_reset_query();
}
}