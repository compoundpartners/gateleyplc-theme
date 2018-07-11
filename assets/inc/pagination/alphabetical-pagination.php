<?php // Add new taxonomy, NOT hierarchical (like tags)
function gateley_create_glossary_taxonomy(){
    if(!taxonomy_exists('glossary')){
	    
	      $labels = array(
    'name'              => _x( 'Glossary', 'taxonomy general name' ),
    'singular_name'     => _x( 'Glossary', 'taxonomy singular name' ),
    'search_items'      =>  __( 'Search Glossary' ),
    'menu_name'         => __( 'Glossary' ),
  );
  
  
	   register_taxonomy( 'glossary', array('people'), array(
    'hierarchical' => true,
    'labels'       => $labels,
    'show_ui'      => true,
    'query_var'    => true,
    'rewrite'      => array( 'slug' => 'glossary' ),
  ));
   
     }
}
add_action('init','gateley_create_glossary_taxonomy');
/*

function gateley_pagination_ajax(){
	global $post;
    wp_enqueue_script( 'gateley_pagination_ajax', get_template_directory_uri()."/assets/js/ajax-pagination.js", array( 'jquery' ), '1.0' );
}

add_action( 'wp_head', 'my_js_vars', 1000 );

function my_js_vars() {

?>
    <script type="text/javascript">
    var ajaxurl =  '<?php admin_url('admin-ajax.php'); ?>'
    </script>
    <?php
    /*
       NOTE: 
       Make sure not to leave a comma after the last item 
       in the JS array, else IE(Internet Explorer) will choke on the JS.
    
}


function gateley_pagination_loop_cb(){
$args = array(
	'post_type' => 'people',
	'tax_query' => array(
		array(
			'taxonomy' => 'glossary',
			'field'    => 'slug',
			'terms'    => $_GET['glossary'],
		),
	),
);
$my_query = new WP_Query( $args );

    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); 
      echo $_GET['glossary'];
      			get_template_part( 'assets/template-parts/content', 'search-people');

      
      
      endwhile;
    }
 die();
}

add_action( 'template_redirect', 'gateley_pagination_ajax' );
add_action( 'wp_ajax_gateley_pagination_loop', 'gateley_pagination_loop_cb' );
add_action( 'wp_ajax_nopriv_gateley_pagination_loop', 'gateley_pagination_loop_cb' );*/