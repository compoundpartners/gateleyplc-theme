<header id="masthead" class="site-header navbar gateley-menu navbar-fixed-top"  >
     <div class=" container">
          <div class="navbar-header">
                         <?php    $terms = wp_get_post_terms($post->ID, 'gateley_plc_or_hbj_gateley', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) && in_array("HBJ Gateley",  $terms) && !in_array("Gateley Plc",  $terms) && !empty(get_theme_mod("hbj_gateley_logo"))) {
	 $addclass= "hbj-gateley"; 
 } ?>
               <a href="<?php echo home_url(); ?>" class="navbar-brand <?php echo $addclass; ?>">
              <?php global $post;
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) && in_array("HBJ Gateley",  $terms) && !in_array("Gateley Plc",  $terms) && !empty(get_theme_mod("hbj_gateley_logo"))) {
	 $addclass= "hbj-gateley";
           echo "<img src='".get_theme_mod("hbj_gateley_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='gateley-offset'/>";
 
 } else {
 if(!empty(get_theme_mod("gateley_plc_logo"))) {
           echo "<img src='".get_theme_mod("gateley_plc_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='gateley-offset'/>"; } 
 }
 ?>
 
              
               </a>
          </div>
          




               <ul class="nav navbar-nav navbar-right">

 <?php if (get_option('disclaimer') == '1' && $_COOKIE['first_disclaimer'] !== '1' && $_COOKIE['second_disclaimer'] !== '1') { echo "<p class='navbar-text'>Please complete the disclaimer below</p>";
				} else {?>
                         

					

                    <!-- Main Menu -->
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="icon-menu menu-icon"></em> <span class="sep">|</span> Menu</a>
                         <ul class="dropdown-menu">
                              <li class="container">
                                   <div class="row mb30">
                                        <?php dynamic_sidebar( 'mega-menu-cols' ); ?>
                                   </div>
                                   <div class="row">
                                        <div class="vc_col-sm-6 vc_col-xs-12">
                                         <?php if(!empty(get_theme_mod("gateley_plc_menu_logo"))) {
           echo "<img src='".get_theme_mod("gateley_plc_menu_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='mb30 menu-logo gateley-offset'/>"; }  ?>
           
           
                                             <?php dynamic_sidebar( 'mega-menu-split-gateley' ); ?>
                                        </div>
                                        <div class="vc_col-sm-6 vc_col-xs-12">
                                        <?php if(!empty(get_theme_mod("gateley_hbj_menu_logo"))) {
           echo "<img src='".get_theme_mod("gateley_hbj_menu_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='mb30 menu-logo'/>"; }  ?>
           
                                             <?php dynamic_sidebar( 'mega-menu-split-hbj' ); ?>
                                        </div>
                                   </div>
                              </li>
                         </ul>
                    </li>
                      <?php } ?> 
                      <?php
				      global $switched;
					 switch_to_blog(0);
					echo "<a href='". network_site_url()."' class='btn btn-primary navbar-btn' target='_blank'>Main Website</a>";
    					restore_current_blog();?>
    
     
					                
               </ul>
          </div>
</header>