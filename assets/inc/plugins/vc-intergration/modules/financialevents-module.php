<?php // Latest News

function financialevents_func($atts) {
    extract(shortcode_atts(array(
        'pageid' => '{$pageid}',
        'title' => '{$title}',
        'showcontent' => '{$showcontent}',
        'newsurl' => '{$newsurl}',
        'postmeta' => '{$postmeta}'
    ), $atts));

    $output;
    wp_reset_query();

    global $post;

    $ws = 1;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type'=>'financialevents',
        'order' => 'ASC',
        'orderby' => 'meta_value',
        'meta_key' => 'event_date',
        'posts_per_page' => 16,
        'paged' => $paged
    );

    $slug = the_slug();
    query_posts($args);

    global $wp_query;
    $postcount = $wp_query->found_posts;

    $count=0;

    if(have_posts()) {
        $output .= "<div class='vc_row clearfix'>";

        while (have_posts()) : the_post();
            global $post;

            $date = get_field('event_date');

            $output .= '<div class="vc_col-md-12">';
            $output .= '<div class="financial-event">';
            $output .= '<p class="financial-event__date">' . $date . '</p>';
            $output .= '<h4 class="media-heading">' . get_the_title() . '</h4>';

            if($showcontent == 'yes') {
                $output .= '<p>' . truncate(get_post_meta($post->ID, '_Overview', true), 80) . '</p>';
            }

            $output .= '</div>'; // .financial-event
            $output .= '</div>'; // .vc_col-md-12
        endwhile;

        $output .= 	'</div>';
        $output .= '<div class="vc_row clearfix"><div class="white-bar">' . page_pagination() . '</div></div>';

        wp_reset_query();
    }

    return $output;
}

add_shortcode('financialevents', 'financialevents_func');
