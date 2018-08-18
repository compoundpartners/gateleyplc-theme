<?php

  add_action( 'init', 'my_new_default_post_type', 1 );

  function my_new_default_post_type() {

      register_post_type( 'post', array(
          'labels' => array(
              'name_admin_bar' => _x( 'Post', 'add new on admin bar' ),
          ),
          'public'  => true,
          '_builtin' => false,
          '_edit_link' => 'post.php?post=%d',
          'capability_type' => 'post',
          'map_meta_cap' => true,
          'hierarchical' => false,
  	   		'rewrite'		=> array('slug' => 'latest-news','with_front' => false),
          'query_var' => true,
          'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
      ) );

  }

?>
