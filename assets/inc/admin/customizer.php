<?php
/**
 * Registers options with the Theme Customizer
 *
 * @param      object    $wp_customize    The WordPress Theme Customizer
 * @package    gateley_plc
 * @since      0.2.0
 * @version    0.2.0
 */
function gateley_plc_register_theme_customizer( $wp_customize ) {
	
/************************************ 
***** REGISTER 
***** SECTIONS 
************************************/	
	
	$wp_customize->add_section(
    'gateley_plc_display_options',
    array(
        'title'     => 'Display Options',
        'priority'  => 1
    )
);


$wp_customize->add_section(
    'capitas_display_options',
    array(
        'title'     => 'Additional Display Options',
        'priority'  => 2
    )
);

$wp_customize->add_section(
    'wires_display_options',
    array(
        'title'     => 'Wires Display Options',
        'priority'  => 4
    )
);


$wp_customize->add_section(
    'gateley_plc_social_media',
    array(
        'title'     => 'Gateley Plc Social Media Options',
        'priority'  => 3
    )
);


$wp_customize->add_section(
    'hbj_gateley_social_media',
    array(
        'title'     => 'HBJ Gateley Social Media Options',
        'priority'  => 3
    )
);


$wp_customize->add_section(
    'gateley_plc_footer_options',
    array(
        'title'     => 'Footer Options',
        'priority'  => 10
    )
);



/************************************ 
***** REGISTER 
***** SETTINGS 
************************************/	



/* Display Settings */

$wp_customize->add_setting(
    'gateley_plc_display_header',
    array(
        'default'    =>  'true',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_display_header',
    array(
        'section'   => 'gateley_plc_display_options',
        'label'     => 'Display Header?',
        'type'      => 'checkbox'
    )
);

$wp_customize->add_setting(
    'gateley_plc_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'gateley_plc_logo_image',
        array(
            'label'    => 'IE6 Logo Image',
            'settings' => 'gateley_plc_logo',
            'section'  => 'gateley_plc_display_options'
        )
    )
);
$wp_customize->add_setting(
    'gateley_plc_ie6_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'gateley_plc_ie6_logo_image',
        array(
            'label'    => 'Logo Image',
            'settings' => 'gateley_plc_ie6_logo',
            'section'  => 'gateley_plc_display_options'
        )
    )
);


$wp_customize->add_setting(
    'hbj_gateley_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'hbj_gateley_logo_image',
        array(
            'label'    => 'Logo Image',
            'settings' => 'hbj_gateley_logo',
            'section'  => 'gateley_plc_display_options'
        )
    )
);

$wp_customize->add_setting(
    'gateley_plc_menu_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'gateley_plc_menu_logo_image',
        array(
            'label'    => 'Logo Image For Menu',
            'settings' => 'gateley_plc_menu_logo',
            'section'  => 'gateley_plc_display_options'
        )
    )
);
$wp_customize->add_setting(
	    'gateley_menu_logo_class',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_menu_logo_class',
	    array(
		   'section'   => 'gateley_plc_display_options',
		   'label'     => 'Logo Class',
		   //'type'      => 'text'
	    )
	);
	
	
	$wp_customize->add_setting(
	    'gateley_menu_logo_link',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_menu_logo_link',
	    array(
		   'section'   => 'gateley_plc_display_options',
		   'label'     => 'Logo in Menu Link',
		   //'type'      => 'text'
	    )
	);



$wp_customize->add_setting(
    'gateley_hbj_menu_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'gateley_hbj_menu_logo_image',
        array(
            'label'    => 'Second Logo in Menu Link',
            'settings' => 'gateley_hbj_menu_logo',
            'section'  => 'gateley_plc_display_options'
        )
    )
);
	
	$wp_customize->add_setting(
	    'gateley_hbj_menu_logo_class',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_hbj_menu_logo_class',
	    array(
		   'section'   => 'gateley_plc_display_options',
		   'label'     => 'Second Logo Class',
		   //'type'      => 'text'
	    )
	);
	
	$wp_customize->add_setting(
	    'gateley_hbj_menu_logo_link',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_hbj_menu_logo_link',
	    array(
		   'section'   => 'gateley_plc_display_options',
		   'label'     => 'Second Logo in Menu Link',
		   //'type'      => 'text'
	    )
	);

/* Capitas Logo */


$wp_customize->add_setting(
	    'gateley_capitas_show_menu_logo',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_capitas_show_menu_logo',
	    array(
		   'section'   => 'capitas_display_options',
		   'label'     => 'Capitas Logo Class',
		   'type'      => 'checkbox'
	    )
	);
$wp_customize->add_setting(
    'gateley_capitas_menu_logo',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'gateley_capitas_menu_logo_image',
        array(
            'label'    => 'Capitas Logo in Menu',
            'settings' => 'gateley_capitas_menu_logo',
            'section'  => 'capitas_display_options'
        )
    )
);
	
	$wp_customize->add_setting(
	    'gateley_capitas_menu_logo_class',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_capitas_menu_logo_class',
	    array(
		   'section'   => 'capitas_display_options',
		   'label'     => 'Capitas Logo Class',
		   //'type'      => 'text'
	    )
	);
	
	$wp_customize->add_setting(
	    'gateley_capitas_menu_logo_link',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_capitas_menu_logo_link',
	    array(
		   'section'   => 'capitas_display_options',
		   'label'     => 'Capitas Logo in Menu Link',
		   //'type'      => 'text'
	    )
	);


	$wp_customize->add_setting(
	    'gateley_capitas_menu_logo_text',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_capitas_menu_logo_text',
	    array(
		   'section'   => 'capitas_display_options',
		   'label'     => 'Capitas Text in Menu',
		   //'type'      => 'text'
	    )
	);


/* Capitas Logo */


$wp_customize->add_setting(
	    'gateley_wires_show_menu_logo',
	    array(
		   'default'    =>  '',
		   'transport'  =>  'postMessage'
	    )
	);
	
	
	
	$wp_customize->add_control(
	    'gateley_wires_show_menu_logo',
	    array(
		   'section'   => 'wires_display_options',
		   'label'     => 'Show Wires Logo',
		   'type'      => 'checkbox'
	    )
	);




/* Social media Settings */

$wp_customize->add_setting(
    'gateley_plc_social_media_blogs',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_blogs',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Blogs Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'gateley_plc_social_media_linkedin',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_linkedin',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc LinkedIn Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'gateley_plc_social_media_twitter',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_twitter',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Twitter Link',
        //'type'      => 'text'
    )
);

$wp_customize->add_setting(
    'gateley_plc_social_media_facebook',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_facebook',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Facebook Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'gateley_plc_social_media_vimeo',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_vimeo',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Vimeo Link',
        //'type'      => 'text'
    )
);



$wp_customize->add_setting(
    'gateley_plc_social_media_youtube',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_youtube',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc YouTube Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'gateley_plc_social_media_google',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_google',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Google+ Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'gateley_plc_social_media_instagram',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'gateley_plc_social_media_instagram',
    array(
        'section'   => 'gateley_plc_social_media',
        'label'     => 'Gateley Plc Instagram Link',
        //'type'      => 'text'
    )
);

/* HBJ Social media Settings */

$wp_customize->add_setting(
    'hbj_gateley_social_media_blogs',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_blogs',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley Blogs Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'hbj_gateley_social_media_linkedin',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_linkedin',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley LinkedIn Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'hbj_gateley_social_media_twitter',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_twitter',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley Twitter Link',
        //'type'      => 'text'
    )
);

$wp_customize->add_setting(
    'hbj_gateley_social_media_facebook',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_facebook',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley Facebook Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'hbj_gateley_social_media_vimeo',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_vimeo',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley Vimeo Link',
        //'type'      => 'text'
    )
);



$wp_customize->add_setting(
    'hbj_gateley_social_media_youtube',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_youtube',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley YouTube Link',
        //'type'      => 'text'
    )
);


$wp_customize->add_setting(
    'hbj_gateley_social_media_google',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_social_media_google',
    array(
        'section'   => 'hbj_gateley_social_media',
        'label'     => 'HBJ Gateley Google+ Link',
        //'type'      => 'text'
    )
);

$wp_customize->add_setting(
    'hbj_gateley_plc_social_media_instagram',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'hbj_gateley_plc_social_media_instagram',
    array(
        'section'   => 'hbj_gateley_plc_social_media',
        'label'     => 'HBJ Gateley Instagram Link',
        //'type'      => 'text'
    )
);


/* Footer Settings */

$wp_customize->add_setting(
    'copyright_text',
    array(
        'default'    =>  ' ',
        'transport'  =>  'postMessage'
    )
);



$wp_customize->add_control(
    'copyright_text',
    array(
        'section'   => 'gateley_plc_footer_options',
        'label'     => 'Footer Copyright Information',
        //'type'      => 'text'
    )
);

$wp_customize->add_setting(
    'footer_cols_count',
    array(
        'default'    =>  '',
        'transport'  =>  'postMessage'
    )
);

$wp_customize->add_control( 'footer_cols', array(
    'type'        => 'range',
    'priority'    => 10,
    'section'     => 'gateley_plc_footer_options',
    'settings' => 'footer_cols_count',
    'label'       => 'Footer Columns Count',
    'description' => get_theme_mod("footer_cols_count"),
    'input_attrs' => array(
        'min'   => 1,
	   
	   
	   
	   
        'max'   => 6,
        'step'  => 1,
        'class' => 'test-class test',
        'style' => 'color: #0a0',
    ),
) );

/* Colour Settings */


	$wp_customize->add_setting(
		'gateley_plc_link_color',
		array(
			'default'     => '#000000',
			'transport'   => 'postMessage'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
			    'label'      => __( 'Link Color', 'gateley_plc' ),
			    'section'    => 'colors',
			    'settings'   => 'gateley_plc_link_color'
			)
		)
	);
} // end gateley_plc_register_theme_customizer
add_action( 'customize_register', 'gateley_plc_register_theme_customizer' );
function gateley_plc_customizer_css() {
?>
	 <style type="text/css">
	     a { color: <?php echo get_theme_mod( 'gateley_plc_link_color' ); ?>; }
	 </style>
<?php
}
//add_action( 'wp_head', 'gateley_plc_customizer_css' );
/**
 * Registers the Theme Customizer Preview with WordPress.
 *
 * @package    gateley_plc
 * @since      0.3.0
 * @version    0.3.0
 */
function gateley_plc_customizer_live_preview() {
	wp_enqueue_script(
		'gateley_plc-theme-customizer',
		get_template_directory_uri() . 'assets/js/customizer.js',
		array( 'jquery', 'customize-preview' ),
		'0.3.0',
		true
	);
} // end gateley_plc_customizer_live_preview
add_action( 'customize_preview_init', 'gateley_plc_customizer_live_preview' );