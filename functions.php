<?php
/**
 * gateley-plc functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package gateley-plc
 */
function wpse_69549_admin_debug( $user_login, $user )
{
    if ( in_array( 'administrator', $user->roles ) ) {
        setcookie( 'wp_debug', 'on', time() + 86400, '/', get_site_option( 'siteurl' ) );
    }
}
add_action( 'wp_login', 'wpse_69549_admin_debug', 10, 2 );


if ( ! function_exists( 'gateley_plc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gateley_plc_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on gateley-plc, use a find and replace
	 * to change 'gateley-plc' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'gateley-plc', get_template_directory() . '/assets/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // gateley_plc_setup
add_action( 'after_setup_theme', 'gateley_plc_setup' );

require get_template_directory() . '/assets/inc/functions-all.php';

/**
 ** THEME SETUP!
**/ 
$themeswithcer = get_option('themetype');
switch ($themeswithcer) {
    case "main":
		require get_template_directory() . '/assets/inc/functions-main.php';
    break;
    case "investor":
    		require get_template_directory() . '/assets/inc/functions-investor.php';
    break;
    case "blog":
		require get_template_directory() . '/assets/inc/functions-blog.php';

    break;
}

remove_action( 'wp_head', 'addNoScript', 20000 );

/**
 * Disable the WPSEO v3.1+ Primary Category feature.
 */
add_filter( 'wpseo_primary_term_taxonomies', '__return_empty_array' );

