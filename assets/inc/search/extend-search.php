<?php function gateley_change_search_url_rewrite() {
		global $wp_rewrite;
			if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
				return;
			}
			$search_base = $wp_rewrite->search_base;
			if (is_search() && !is_admin() && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
				wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
				exit();
			}
}
add_action( 'template_redirect', 'gateley_change_search_url_rewrite' );

// search all taxonomies, based on: http://projects.jesseheap.com/all-projects/wordpress-plugin-tag-search-in-wordpress-23
/*
function gateley_search_where($where){ 
    global $wpdb, $wp_query;
    if (is_search()) {
        $search_terms = get_query_var( 'search_terms' );

        $where .= " OR (";
        $i = 0;
        foreach ($search_terms as $search_term) {
            $i++;
            if ($i>1) $where .= " OR";     // --- make this OR if you prefer not requiring all search terms to match taxonomies
            $where .= " (t.name LIKE '%".$search_term."%')";
        }
        $where .= " AND {$wpdb->posts}.post_status = 'publish')";
    }
  return $where;
}

function gateley_search_join($join){
  global $wpdb;
  if (is_search())
    $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
  return $join;
}

function gateley_search_groupby($groupby){
  global $wpdb;

  // we need to group on post ID
  $groupby_id = "{$wpdb->posts}.ID";
  if(!is_search() || strpos($groupby, $groupby_id) !== false) return $groupby;

  // groupby was empty, use ours
  if(!strlen(trim($groupby))) return $groupby_id;

  // wasn't empty, append ours
  return $groupby.", ".$groupby_id;
}

add_filter('posts_where','gateley_search_where');
add_filter('posts_join', 'gateley_search_join');
add_filter('posts_groupby', 'gateley_search_groupby');*/