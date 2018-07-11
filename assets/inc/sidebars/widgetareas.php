<?php
/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
function gateley_count_widgets( $sidebar_id ) {
	// If loading from front page, consult $_wp_sidebars_widgets rather than options
	// to see if wp_convert_widget_settings() has made manipulations in memory.
	global $_wp_sidebars_widgets;
	if ( empty( $_wp_sidebars_widgets ) ) :
		$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
	endif;
	
	$sidebars_widgets_count = $_wp_sidebars_widgets;
	
	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){
		$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
		if ( $widget_count % 6 == 0 || $widget_count > 6 ) :
			// Four widgets per row if there are exactly four or more than six
			$widget_classes .= ' vc_col-md-2 vc_col-sm-2 vc_col-xs-12';
		elseif ( $widget_count >= 5) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= ' vc_col-md-4 vc_col-sm-4 vc_col-xs-12';
		elseif ( $widget_count >= 4 ) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= ' vc_col-md-3 vc_col-sm-3 vc_col-xs-12';
		elseif ( $widget_count >= 3 ) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= ' vc_col-md-4 vc_col-sm-4 vc_col-xs-12';
		elseif ( 2 == $widget_count ) : // Otherwise show two widgets per row
			$widget_classes .= ' vc_col-md-6 vc_col-sm-6 vc_col-xs-12';
		endif; 
			} else {
				if ( $widget_count % 6 == 0 || $widget_count > 6 ) :
			// Four widgets per row if there are exactly four or more than six
			$widget_classes .= ' columns-2 ';
		elseif ( $widget_count >= 5) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= ' columns-4 ';
		elseif ( $widget_count >= 4 ) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= 'columns-3';
		elseif ( $widget_count >= 3 ) :
			// Three widgets per row if there's three or more widgets 
			$widget_classes .= 'columns-4';
		elseif ( 2 == $widget_count ) : // Otherwise show two widgets per row
			$widget_classes .= ' columns-6';
		endif; 
			}
			return $widget_classes;

	endif;
}
 
function gateley_plc_widgets_init() {


     if(preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){
		$element = 'div';
	} else {
		$element = 'nav';
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'gateley-plc' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Mega Menu Columns', 'gateley-plc' ),
		'id'            => 'mega-menu-cols',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s '.gateley_count_widgets( 'mega-menu-cols' ) .'">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Mega Menu Split 1', 'gateley-plc' ),
		'id'            => 'mega-menu-split-gateley',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Mega Menu Split 2', 'gateley-plc' ),
		'id'            => 'mega-menu-split-hbj',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Mega Menu Columns', 'gateley-plc' ),
		'id'            => 'social-mega-menu-cols',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s '.gateley_count_widgets( 'social-mega-menu-cols' ) .'">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
	
		register_sidebar( array(
		'name'          => __( 'Social Menu Split - Gateley Plc', 'gateley-plc' ),
		'id'            => 'social-split-gateley',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s pull-left">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
		register_sidebar( array(
		'name'          => __( 'Social Menu Split - HBJ Gateley', 'gateley-plc' ),
		'id'            => 'social-split-hbj',
		'description'   => '',
		'before_widget' => '          '.'<'.$element.' id="%1$s" class="%2$s pull-left">',
		'after_widget'  => '          '.'</'.$element.'>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );



for ($x = 1; $x <= get_theme_mod("footer_cols_count"); $x++) {
	register_sidebar( array(
		'name'          => __( 'Footer Sidebar - '. $x, 'gateley-plc' ),
		'id'            => 'footer-sidebar-'.$x,
		'description'   => '',
		'before_widget' => '          '.'<div id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}

	register_sidebar( array(
		'name'          => __( 'Search Page', 'gateley-plc' ),
		'id'            => 'search-page',
		'description'   => '',
		'before_widget' => '          '.'<aside id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</aside>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Feeds - ', 'gateley-plc' ),
		'id'            => 'feeds',
		'description'   => '',
		'before_widget' => '          '.'<aside id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</aside>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Events Sidebar', 'gateley-plc' ),
		'id'            => 'events-sidebar',
		'description'   => '',
		'before_widget' => '          '.'<aside id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</aside>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
	
	
	
	
	global $options;
		$data  = get_option('widgetname');
	if (isset($data) && ! empty($data )) { 
	$i = 2; foreach($data[0] as $v ) {
		$id = strtolower($v["'name'"]).'-widget';
		$id = str_replace(" ", "-", $id );
	register_sidebar( array(
		'name'          => __( $v["'name'"], 'gateley-plc' ),
		'id'            => $id,
		'description'   => '',
		'before_widget' => '          '.'<div id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</div>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );$i++; }}; 

register_sidebar( array(
		'name'          => __( 'Vacancies Sidebar', 'gateley-plc' ),
		'id'            => 'vacancies-sidebar',
		'description'   => '',
		'before_widget' => '          '.'<aside id="%1$s" class="%2$s">',
		'after_widget'  => '          '.'</aside>',
		'before_title'  => '<h4 class="widget-title sr-only">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'gateley_plc_widgets_init', 10, 2 );