<?php function my_get_post_views($post_id=0)
{
	$count = 0;
	$post_id = !$post_id ? get_the_ID() : $post_id;
		$meta_count_key = 'my_views_count';
		$count = get_post_meta($post_id, $meta_count_key, true);
		if ($count == '') {
			delete_post_meta($post_id, $meta_count_key);
			add_post_meta($post_id, $meta_count_key, '0');
			return "0 View";
		}

		return $count.' Views';

	
}


function my_set_post_views($post_id = 0)
{
	$post_id = !$post_id ? get_the_ID() : $post_id;
	if (!$post_id) {
		return;
	}

	$meta_count_key = 'my_views_count';
	$count = get_post_meta($post_id, $meta_count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $meta_count_key);
		add_post_meta($post_id, $meta_count_key, '0');
	}
	else {
		$count++;
		update_post_meta($post_id, $meta_count_key, $count);
	}
}

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
