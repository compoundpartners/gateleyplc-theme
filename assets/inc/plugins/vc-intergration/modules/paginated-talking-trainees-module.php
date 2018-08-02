<?php // Latest News

function paginatedtalkingtrainees_func( $atts ) {

  extract( shortcode_atts( array(
    'pageid' => '{$pageid}',
    'title' => '{$title}',
    'showcontent' => '{$showcontent}',
    'newsurl' => '{$newsurl}',
    'postmeta' => '{$postmeta}'
  ), $atts ) );

  $output;

  global $post;

  $ws = 1;

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
    'post_type'=>'talking-trainees',
    //'order'=>'ASC',
    'posts_per_page' => 16,
    'paged' => $paged,
  );

  $slug = the_slug();

  query_posts($args);

  // global $wp_query;

  // $postcount = $wp_query->found_posts;

  $count=0;

  if(have_posts()) {

    $divider = 'yes';
    $featuredimg = 'date';
    $truncate = 250;

    while (have_posts()) : the_post();

      global $post;

      $thetitle = get_the_title($post->ID);

      require get_template_directory() . '/assets/inc/plugins/vc-intergration/modules/shortcode-templates/media-list.php';

      $output .="<hr>";

      $count++;

    endwhile;

    $output .= 	"<div class='vc_row clearfix'><div class='white-bar'>".page_pagination()."</div></div>";

    wp_reset_query();
  }

  return $output;

}

add_shortcode( 'paginatedtalkingtrainees', 'paginatedtalkingtrainees_func' );
