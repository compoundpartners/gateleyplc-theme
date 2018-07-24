<?php

  add_action('init', 'talking_trainees_register');

  function talking_trainees_register() {

     $labels = array(
  		'name' => _x('Talking Trainees', 'post type general name'),
  		'singular_name' => _x('Talking Trainees', 'post type singular name'),
      'add_new_item' => __('Add New Briefing'),
  		'edit_item' => __('Edit briefing'),
  		'new_item' => __('New briefing'),
  		'view_item' => __('View briefing'),
  		'search_items' => __('Search Talking Trainees'),
  		'not_found' =>  __('Nothing found'),
  		'not_found_in_trash' => __('Nothing found in Trash'),
  		'parent_item_colon' => ''
  	);

  	$args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'rewrite' => true,
      'publicly_queriable' => false,
      'show_ui' => true,
      'show_in_nav_menus'  => false,
      'exclude_from_search' => true,
      'menu_icon' => 'dashicons-welcome-add-page',  // Icon Path
      'menu_position' => 5,
      'show_in_menu'  =>	'blogs_menu',
      //'supports' => array('title', 'thumbnail', 'page-attributes', 'custom-fields')
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions' ),
    );

    register_post_type( 'talking-trainees' , $args );
  }
