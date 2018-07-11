<header id="masthead" class="site-header navbar gateley-menu navbar-fixed-top"  >
     <div class=" container">
          <div class="navbar-header">
         <?php
	    global $post;if (isset($post->ID)) {$terms = wp_get_post_terms($post->ID, 'gateley_plc_or_hbj_gateley', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) && in_array("HBJ Gateley",  $terms) && !in_array("Gateley Plc",  $terms) && !empty(get_theme_mod("hbj_gateley_logo"))) {
	 $addclass= "hbj-gateley";
 } }?>
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
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="icon-menu menu-icon"></em> <span class="sep">|</span> Menu</a>
                         <ul class="dropdown-menu">
                              <li class="container">
                                   <div class="row ">
                                        <?php dynamic_sidebar( 'mega-menu-cols' ); ?>
                                   </div>
                                   <div class="row">
                          <?php          if(get_current_blog_id() == 1) {
	 	 $alt2text = 'HBJ Gateley';
			 $alttext = 'Gateley Plc';

			  $localt2text = 'Scotland';
			 $localttext = 'England';


		}

	  else {
			 $alt2text = 'Gateley Plc';
			 		 	 	 $alttext = 'HBJ Gateley';
							  $localt2text = 'England';
			 $localttext = 'Scotland';
  } ?>
                                        <div class=" <?php if(get_current_blog_id() == 1) {
 ?> vc_col-sm-12 vc_col-xs-12<?php } else { ?>  vc_col-sm-6 vc_col-xs-12<?php } ?>">
                                         <?php if(!empty(get_theme_mod("gateley_plc_menu_logo"))) {
									 	 if(!empty(get_theme_mod("gateley_menu_logo_class"))) { $logoclass = get_theme_mod("gateley_menu_logo_class"); } else { $logoclass = '';}
 if(!empty(get_theme_mod("gateley_menu_logo_link"))) {
	 echo "<h5><a href='".get_theme_mod("gateley_menu_logo_link")."'>";
 }
           echo "<img src='".get_theme_mod("gateley_plc_menu_logo")."' alt='". $alttext . " Logo' class='mb10 menu-logo ".$logoclass."'/><span class='location-text'>". $localttext."</span>";
		  if(!empty(get_theme_mod("gateley_menu_logo_link"))) {
	 echo "</a></h5>";
 }
		 }  ?>


                                             <?php dynamic_sidebar( 'mega-menu-split-gateley' ); ?>
                                        </div>
                                        <div class=" <?php if(get_current_blog_id() == 1) {
 ?> vc_col-sm-12 vc_col-xs-12 mt20<?php } else { ?>  vc_col-sm-6 vc_col-xs-12<?php } ?>">
                                        <?php if(!empty(get_theme_mod("gateley_hbj_menu_logo"))) {
							if(!empty(get_theme_mod("gateley_hbj_menu_logo_class"))) { $logoclass2 = get_theme_mod("gateley_hbj_menu_logo_class"); } else { $logoclass2= '';}
if(!empty(get_theme_mod("gateley_hbj_menu_logo_link"))) {
	 echo "<h5><a href='".get_theme_mod("gateley_hbj_menu_logo_link")."'>";
 }


           echo "<img src='".get_theme_mod("gateley_hbj_menu_logo")."' alt='". $alt2text . " Logo' class='mb10 menu-logo ".$logoclass2."'/><span class='location-text'>". $localt2text."</span>"; }
             if(!empty(get_theme_mod("gateley_hbj_menu_logo_link"))) {
	 echo "</a></h5>";
 }
      ?>                                        <?php dynamic_sidebar( 'mega-menu-split-hbj' ); ?>
                                        </div>
                                   </div>
                              </li>
                         </ul>
                    </li>
                 <!-- Social Menu-->
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="icon-share menu-icon"></em> <span class="sep hidden-xs">|</span> <span class="hidden-xs">Social</span></a>
                         <ul class="dropdown-menu">
                              <li class="container">
                                   <div class="row">
                                        <div class="vc_col-sm-6 vc_col-xs-12">
                                                              <?php if(!empty(get_theme_mod("gateley_plc_menu_logo"))) {
           echo "<img src='".get_theme_mod("gateley_plc_menu_logo")."' alt='".get_bloginfo( 'name' ) . " Social Menu Logo' class='mb10 menu-logo gateley-offset pull-left'/>"; }  ?>
                                             <?php dynamic_sidebar( 'social-split-gateley' ); ?>
                                        </div>
                                        <hr class="visible-xs">
                                        <div class="vc_col-sm-6 vc_col-xs-12">
                                                               <?php if(!empty(get_theme_mod("gateley_hbj_menu_logo"))) {
           echo "<img src='".get_theme_mod("gateley_hbj_menu_logo")."' alt='".get_bloginfo( 'name' ) . " | Social Menu Logo' class='mb10 menu-logo pull-left'/>"; }  ?>
                                             <?php dynamic_sidebar( 'social-split-hbj' ); ?>
                                        </div>
                                   </div>
                              </li>
                         </ul>
                    </li>
                    <!-- Search Menu-->
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><em class="icon-search menu-icon"></em> <span class="sep hidden-xs">|</span> <span class="hidden-xs">Search</span></a>
                         <ul class="dropdown-menu">
                              <li class="container">
                                   <div class="row">
                                        <div class="vc_col-sm-3 vc_col-xs-12">
									<h5>Use this form to search for people, pages, events and our latest news.</h5>
                                        </div>
                                        <div class="vc_col-sm-9 vc_col-xs-12">
                                             <?php get_search_form( ) ?>
                                        </div>
                                   </div>
                              </li>
                         </ul>
                    </li>

               </ul>
          </div>
</header>
