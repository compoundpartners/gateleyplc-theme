<?php function page_pagination() {

global $wp_query;

$big = 999999999; // need an unlikely integer
 $pagination;
$pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
	   'prev_next' => false,
	     'before_page_number' => '<span class="sr-only">Page: </span>',
        'type'  => 'array',
	   'show_all' => true
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        $pagination .= '<div class="pagination-wrap"><ul class="pagination">';
        foreach ( $pages as $page ) {
		   $output = $page;
                $pagination .= "<li>".$output."</li>";
        }
       $pagination .= '</ul></div>';
        }
	   return $pagination;
}
?>