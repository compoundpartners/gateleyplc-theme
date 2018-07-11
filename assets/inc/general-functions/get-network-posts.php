<?php 
function as_latest_posts($amount,$exclude) {

	$as_latest_posts = array();
	$as_latest_ps = array();

	$args = array(
		//'offset' 	=> 1
	);

	$blogs = wp_get_sites( $args );
$exclude = array($exclude);	
foreach($exclude as $ex) {
if (($key = array_search($ex, $blogs)) !== false) {
    unset($array[$key]);
}
}

	// Get the 5 latest posts from each blog
	foreach( $blogs as $blog ) {

		switch_to_blog( $blog['blog_id'] );

			$args = array(
				'post_type' 		=> 'post',
				'no_found_rows' 	=> true,
				'posts_per_page' 	=> $amount
			);

			$as_posts = new WP_Query( $args );

			if( $as_posts->have_posts() ) {
				$info = array();
				while( $as_posts->have_posts() ) {
					$as_posts->the_post();

						global $post;
						$info['id'] = $post->ID;
						$info['title'] = $post->post_title;
						$info['date'] = $post->post_date;
						$info['permalink'] = get_the_permalink($post->ID);
						$as_latest_posts[] = $info;
						$as_latest_ps[] = $post;
				}
			}

			wp_reset_postdata();
		restore_current_blog();
	}

	// Get all the posts returned and sort them based on post date
	$sortPosts = array();

	foreach( $as_latest_ps as $latest_post ) {
	    foreach( $latest_post as $key=>$value ){

	        if(!isset($sortPosts[$key])){
	            $sortPosts[$key] = array();
	        }
	        $sortPosts[$key][] = $value;

	    }
	}

	$orderby = 'post_date';
	if(is_array($as_latest_posts) && is_array($sortPosts)){ 
	array_multisort( $sortPosts[$orderby], SORT_DESC, $as_latest_posts );
	}
	// Limit the results to the first 5 from the array
	$as_latest_posts = array_slice( $as_latest_posts, 0,$amount );

	return $as_latest_posts;

}
?>