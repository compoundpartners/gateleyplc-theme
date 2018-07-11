<?php /**
 * Enqueue scripts and styles.
 */

function gateley_plc_scripts() {


				$theme = wp_get_theme( $stylesheet, $theme_root );
				$themename = $theme['Name'];
				$themename = strtolower($themename);
				$themename = str_replace(' ', '-', $themename);

if(file_exists(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css")) {
	$thefile = get_template_directory_uri().'/assets/css/'.$themename.'-'.get_current_blog_id().'.css';
	wp_enqueue_style('static-style-app', $thefile, false, '1.0.0', 'all');
} else {
		$themeswithcer = get_option('themetype');
	switch ($themeswithcer) {
		case "investor":
			  wp_enqueue_style( 'gateley-plc-compressed-style', get_template_directory_uri().'/assets/css/gateley.investor.css.php' );
			break;
		case "blog":
				wp_enqueue_style( 'gateley-plc-compressed-style', get_template_directory_uri().'/assets/css/gateley.blog.css.php' );
			break;
		default:
			wp_enqueue_style( 'gateley-plc-compressed-style', get_template_directory_uri().'/assets/css/gateley.css.php' );

		if ( is_page_template( 'self-population.php' ) ) {	wp_enqueue_script('tiny_mce');}
	}
}

// - fullcalendar -
wp_enqueue_script('fullcalendar',  get_template_directory_uri().'/assets/js/fullcalendar.min.js', array('jquery'));

// - set path to json feed -
$jsonevents = get_bloginfo('template_url') . '/assets/inc/json-feed.php';

// - tell JS to use this variable instead of a static value -
wp_localize_script( 'fullcalendar', 'themeforce', array(
    'events' => $jsonevents,
    ));




if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
}
wp_deregister_style('se-link-styles');
wp_dequeue_style('se-link-styles');

if(wp_style_is( 'js_composer_front', $list = 'enqueued') ) {} else{wp_enqueue_style( 'js_composer_front', get_template_directory_uri().'/assets/css/grid.css' );  }
wp_deregister_script('jquery');
wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, '1.10.2');
wp_enqueue_script('jquery');
wp_enqueue_script( 'gateley-plc-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );
				if(file_exists(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js")) {
						$thejsfile = get_template_directory_uri().'/assets/js/'.$themename.'-'.get_current_blog_id().'.js';
						wp_enqueue_script('static-scripts-app', $thejsfile, false, '1.0.0', 'all', true);

				} else {
					wp_enqueue_script( 'gateley-plc-js', get_template_directory_uri() . '/assets/js/gateley.js.php', array('jquery'), '1.0.0', true  );
				}
}
add_action( 'wp_enqueue_scripts', 'gateley_plc_scripts',999);

/**
 * Optimize WooCommerce Scripts
 * Remove WooCommerce Generator tag, styles, and scripts from non WooCommerce pages.
 */
add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 999 );

function child_manage_woocommerce_styles() {
	//remove generator meta tag
	remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );

	//first check that woo exists to prevent fatal errors
	if ( function_exists( 'is_woocommerce' ) ) {
		//dequeue scripts and styles
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {




			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_script( 'woocommerce-add-to-cart' );


			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			wp_dequeue_script( 'wc-cart-fragments' );
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
	wp_dequeue_style( 'tribe-events-full-calendar-style' );
				wp_dequeue_style( 'event-tickets-plus-tickets' );

	global $post;
	$tmp = get_page_template_slug( $post->ID); // provide page/post ID
	    if ( 'events-page.php' == $tmp || is_archive('tribe_events') || is_single('tribe_events') ) {
						wp_enqueue_style( 'tribe-events-full-calendar-style' );
		}
}

function wpex_remove_script_version( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'wpex_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'wpex_remove_script_version', 15, 1 );
