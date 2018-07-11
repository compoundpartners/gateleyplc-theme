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
