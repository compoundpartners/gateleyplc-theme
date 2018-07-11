<?php // Add specific CSS class by filter
add_filter( 'body_class', 'gateley_class_names' );
function gateley_class_names( $classes ) {
	// add 'class-name' to the $classes array
	if (get_post_meta(get_the_ID(), '_hasSlider', true) == 1) {
	$classes[] = 'has-hero-slider';
	}
	 if (get_option('disclaimer') == '1') {
	$classes[] = 'show visible';

	}
		 if (get_option('disclaimer') == '1') {

	if($_COOKIE['first_disclaimer'] !== '1' && $_COOKIE['second_disclaimer'] !== '1') { 
	$classes[] = 'disclaimer1';

	} elseif($_COOKIE['first_disclaimer'] == '1' && $_COOKIE['second_disclaimer'] !== '1') { 
	$classes[] = 'disclaimer2';

	}
	} else {
		
	}
	// return the $classes array
	return $classes;
}

function mv_browser_body_class($classes) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if($is_lynx) $classes[] = 'lynx';
        elseif($is_gecko) $classes[] = 'gecko';
        elseif($is_opera) $classes[] = 'opera';
        elseif($is_NS4) $classes[] = 'ns4';
        elseif($is_safari) $classes[] = 'safari';
        elseif($is_chrome) $classes[] = 'chrome';
        elseif($is_IE) {
                $classes[] = 'ie';
                if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
                $classes[] = 'ie'.$browser_version[1];
        } else $classes[] = 'unknown';
        if($is_iphone) $classes[] = 'iphone';
        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
           } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
           }
		
        return $classes;
}
add_filter('body_class','mv_browser_body_class');

add_filter( 'body_class', 'gateley_access_class_names' );
function gateley_access_class_names( $classes ) {
	// add 'class-name' to the $classes array
	if (isset($_COOKIE['gateley_al'])) {
		if($_COOKIE['gateley_al'] == 'AAA') {
			$classes[] = 'accessAAA';
		}elseif ($_COOKIE['gateley_al'] == 'AA') {
			$classes[] = 'accessAA';
		}else {
			$classes[] = 'accessA';
		}
	} 
	if($_GET['gateley_al']) {
					if($_GET['gateley_al'] == 'AAA') {
			$classes[] = 'accessAAA';
		}elseif ($_GET['gateley_al'] == 'AA') {
			$classes[] = 'accessAA';
		}else {
			$classes[] = 'accessA';
		}
	}
	// return the $classes array
	return $classes;
}

