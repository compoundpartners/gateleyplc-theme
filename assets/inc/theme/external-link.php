<?php function gateley_post_type_link( $link, $post = 0 ){
	global $post;
    if ( $post->post_type == 'careers' ){
	   $linkfield = get_post_meta($post->ID, '_externalLink', true);
	    if(!empty($linkfield)) {
		   return $linkfield;
	    } else {
		  return $link;

	    }
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'gateley_post_type_link', 1, 3);?>