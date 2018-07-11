<?php add_filter('wp_generate_tag_cloud', 'gateley_tag_cloud',10,3);
		
		function gateley_tag_cloud($tag_string){
		   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
		}
		
			// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'gateley-plc' ),
		) );

		    
		/**
		 * Load Jetpack compatibility file.
		 */
		require get_template_directory() . '/assets/inc/jetpack.php';
		
		require get_template_directory() . '/assets//inc/custom-header.php';?>