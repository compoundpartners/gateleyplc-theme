<?php

  add_action('init', 'corporate_deals_register');

  function corporate_deals_register() {

     $labels = array(
  		'name' => _x('Corporate Deals', 'post type general name'),
  		'singular_name' => _x('Corporate Deals', 'post type singular name'),
      'add_new_item' => __('Add New Briefing'),
  		'edit_item' => __('Edit briefing'),
  		'new_item' => __('New briefing'),
  		'view_item' => __('View briefing'),
  		'search_items' => __('Search Corporate Deals'),
  		'not_found' =>  __('Nothing found'),
  		'not_found_in_trash' => __('Nothing found in Trash'),
  		'parent_item_colon' => ''
  	);

  	$args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => false,
      'show_ui' => true,
      'capability_type' => 'post',
      'taxonomies'  => array( 'category' ),
      'hierarchical' => false,
      'publicly_queriable' => false,
      'show_ui' => true,
      'show_in_nav_menus'  => false,
      'exclude_from_search' => false,
      'menu_icon' => 'dashicons-welcome-add-page',  // Icon Path
      'menu_position' => 5,
      'show_in_menu'  =>	'blogs_menu',
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions' ),
    );

    register_post_type( 'corporate-deals' , $args );
  }
