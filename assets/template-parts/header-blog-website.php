<header id="masthead" class="site-header navbar navbar-fixed-top" >
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
                    <!-- Main Menu -->
                    <li class="dropdown">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="icon-menu menu-icon"></em> <span class="sep">|</span> Talking Gateley</a>
                         <div class="dropdown-menu standard-dropdown" aria-labelledby="dropdown">
						
                       <?php        $defaults = array(
	'theme_location'  => 'primary',
	'menu'            => '',
	'container'       => false,
	'container_id'    => '',
	'menu_class'      => 'nav',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => false,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);

wp_nav_menu( $defaults );?>
						                         </div>
                    </li>
                
  <?php
				      global $switched;
					 switch_to_blog(0);
					echo "<a href='". network_site_url()."' class='btn btn-primary navbar-btn' target='_blank'>Main Website</a>";
    					restore_current_blog();?>
                  
               </ul>
          </div>
</header>