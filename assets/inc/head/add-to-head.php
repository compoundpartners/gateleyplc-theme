<?php function gateley_add_to_header() {	
	echo '<meta property="og:type" content="website" />'."\n";
	echo '<meta property="og:title" content="'.get_bloginfo("name").' | '.get_bloginfo("description").'" />'."\n";
	echo '<meta property="og:url" content="'.get_the_permalink().'" />'."\n";
	echo '<meta property="og:site_name" content="'.get_bloginfo("name").'" />'."\n";
	echo '<meta name="twitter:card" content="summary"/>'."\n";
	echo '<meta name="twitter:title" content="'.get_bloginfo("name").' | '.get_bloginfo("description").'"/>'."\n";
	echo '<meta name="twitter:domain" content="'.get_bloginfo("name").'"/>'."\n";	
	if(!empty(get_option('analytics'))) {
	echo get_option('analytics');
	}
	
 }
add_action('wp_head', 'gateley_add_to_header', 100);


/*
** Clean Up
** <head>
*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_action( 'wp_head',      'rest_output_link_wp_head');
if (function_exists('visual_composer')) {
	add_action('init', 'myoverride', 100);

function myoverride() {
 remove_action('wp_head', array(visual_composer(), 'addMetaData'));//
}
}
/* extend Body Class */

add_filter( 'body_class', 'my_new_names' );
function my_new_names( $classes ) {
	global $options;
	// add 'class-name' to the $classes array
	$sitename= strtolower(get_bloginfo('name'));
		$sitename = str_replace("-", "", $sitename);
		$sitename = str_replace(" ", "-", $sitename);
		
		
		
	$classes[] = $sitename;
	$classes[] = get_option('themetype');
	// return the $classes array
	return $classes;
}



?>