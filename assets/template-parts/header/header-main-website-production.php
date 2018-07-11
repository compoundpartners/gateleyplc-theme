<header id="masthead" class="site-header navbar gateley-menu navbar-fixed-top"  >
     <div class=" container">
     <?php $cols =get_option('menucols');
	if  (!empty($cols)) {
     $columnclass = 12 / $cols;
	} else {
	$columnclass = 12;
	}
	?>
          <div class="navbar-header">
         <?php
	    global $post;if (isset($post->ID)) {$terms = wp_get_post_terms($post->ID, 'gateley_plc_or_hbj_gateley', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) && in_array("HBJ Gateley",  $terms) && !in_array("Gateley Plc",  $terms) && !empty(get_theme_mod("hbj_gateley_logo"))) {
	 $addclass= "hbj-gateley";
 } }?>
               <a href="<?php echo home_url(); ?>" class="navbar-brand <?php echo $addclass; ?>">
              <?php global $post;
 /*if ( ! empty( $terms ) && ! is_wp_error( $terms ) && in_array("HBJ Gateley",  $terms) && !in_array("Gateley Plc",  $terms) && !empty(get_theme_mod("hbj_gateley_logo"))) {
	 $addclass= "hbj-gateley";
           echo "<img src='".get_theme_mod("hbj_gateley_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='gateley-offset'/>";

 } else {*/
      if(preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){
if(!empty(get_theme_mod("gateley_plc_ie6_logo"))) {
           echo "<img src='".get_theme_mod("gateley_plc_ie6_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='gateley-offset'/>"; }
	 } else {
 if(!empty(get_theme_mod("gateley_plc_logo"))) {
           echo "<img src='".get_theme_mod("gateley_plc_logo")."' alt='".get_bloginfo( 'name' ) . " | ".get_bloginfo( 'description' )."' class='gateley-offset'/>"; }
	 }
/* }*/
 ?>


               </a>
          </div>





               <ul class="nav navbar-nav navbar-right">

 <?php if (get_option('disclaimer') == '1' && $_COOKIE['first_disclaimer'] !== '1' || $_COOKIE['second_disclaimer'] !== '1' && get_option('disclaimer') == '1' ) { echo "<p class='navbar-text'>Please complete the disclaimer below</p>";
				} else {?>
                    <!-- Main Menu -->
                    <li class="dropdown gateley-menu-fw" id="gateleymega">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-menu menu-icon"></i> <span class="sep">|</span> Menu</a>
                         <ul class="dropdown-menu">
                              <li class="container">
                                    <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
                                   <div class="vc_row">
                                   <?php } ?>
                                        <?php dynamic_sidebar( 'mega-menu-cols' ); ?>
                                     <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
								</div>
                                   <div class="vc_row"><?php } ?>
                          <?php          if(get_current_blog_id() == 1) {
	 	 $alt2text = 'Entrust';
			 $alttext = 'Gateley Plc';

			  $localt2text = '<small>Professional Trustee Company</small>';
			 $localttext = 'England';


		}

	  else {
			 $alt2text = 'Gateley Plc';
			 		 	 	 $alttext = 'HBJ Gateley';
							  $localt2text = 'England  <small>- for more information on Gateley Plc click here</small>';
			 $localttext = 'Scotland';
  } ?>
                                        <div class=" <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
 vc_col-sm-<?php echo $columnclass; ?> vc_col-xs-12 <?php } else { ?> columns-12<?php } ?> ">
 <div class="pull-left">
                                         <?php if(!empty(get_theme_mod("gateley_plc_menu_logo"))) {
									 	 if(!empty(get_theme_mod("gateley_menu_logo_class"))) { $logoclass = get_theme_mod("gateley_menu_logo_class"); } else { $logoclass = '';}
 if(!empty(get_theme_mod("gateley_menu_logo_link"))) {
	 echo "<h5><a href='".get_theme_mod("gateley_menu_logo_link")."'>";
 }
           echo "<img src='".get_theme_mod("gateley_plc_menu_logo")."' alt='". $alttext . " Logo' class='menu-logo ".$logoclass."'/><span class='location-text'>". $localttext."</span>";
		  if(!empty(get_theme_mod("gateley_menu_logo_link"))) {
	 echo "</a></h5>";
 }
		 }  ?>


                                             <?php dynamic_sidebar( 'mega-menu-split-gateley' ); ?>
                                            </div>
                                        </div>
                                        <?php if(get_theme_mod("gateley_capitas_show_menu_logo") == 1) { ?>
                                        <div class="<?php if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
 vc_col-sm-4 vc_col-xs-12 <?php } else { ?> columns-12<?php } ?><?php if(empty($cols)) { ?>mt10 <?php }?>">
                                        <?php if(!empty(get_theme_mod("gateley_capitas_menu_logo"))) {
							if(!empty(get_theme_mod("gateley_capitas_menu_logo_class"))) { $logoclass2 = get_theme_mod("gateley_capitas_menu_logo_class"); } else { $logoclass2= '';}
if(!empty(get_theme_mod("gateley_capitas_menu_logo_link"))) {
	 echo "<h5><a href='".get_theme_mod("gateley_capitas_menu_logo_link")."'>";
 }


           echo "<img src='".get_theme_mod("gateley_capitas_menu_logo")."' alt='". $alt2text . " Logo' class='  menu-logo menu-logo__foot ".$logoclass2."'/><span class='location-text'><small>". get_theme_mod("gateley_capitas_menu_logo_text")."</small></span>"; }
             if(!empty(get_theme_mod("gateley_capitas_menu_logo_link"))) {
	 echo "</a></h5>";
 }
      ?>                                        <?php dynamic_sidebar( 'mega-menu-split-capitas' ); ?>
                                        </div>
                                        <?php } ?>

                                             <?php if(get_theme_mod("gateley_wires_show_menu_logo") == 1) { ?>

                                        <div class="<?php if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
 vc_col-sm-4 vc_col-xs-12 <?php } else { ?> columns-12<?php } ?><?php if(empty($cols)) { ?>mt10 <?php }?>">
                                        <?php if(!empty(get_theme_mod("gateley_capitas_menu_logo"))) {
	 echo "<h5><a href='https://www.gateleyhamer.com'>";



           echo "<img src='".get_template_directory_uri()."/assets/img/gateley-hamer.png' alt='Gateley Hamer Logo' class='  menu-logo menu-logo__foot ".$logoclass2."'/><span class='location-text'><small>Specialist Property Consultancy</small></span>"; }
	 echo "</a></h5>";

      ?>                                        <?php dynamic_sidebar( 'mega-menu-split-wires' ); ?>
                                        </div>
                                        <?php } ?>


                                          <div class="<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
 vc_col-sm-4 vc_col-xs-12 <?php } else { ?> columns-12<?php } ?><?php if(empty($cols)) { ?>mt10 <?php }?>">
                                        <?php if(!empty(get_theme_mod("gateley_hbj_menu_logo"))) {
							if(!empty(get_theme_mod("gateley_hbj_menu_logo_class"))) { $logoclass2 = get_theme_mod("gateley_hbj_menu_logo_class"); } else { $logoclass2= '';}
if(!empty(get_theme_mod("gateley_hbj_menu_logo_link"))) {
	 echo "<h5><a href='".get_theme_mod("gateley_hbj_menu_logo_link")."'>";
 }


           echo "<img src='".get_theme_mod("gateley_hbj_menu_logo")."' alt='". $alt2text . " Logo' class='  menu-logo menu-logo__foot ".$logoclass2."'/><span class='location-text'>". $localt2text."</span>"; }
             if(!empty(get_theme_mod("gateley_hbj_menu_logo_link"))) {
	 echo "</a></h5>";
 }
      ?>                                        <?php dynamic_sidebar( 'mega-menu-split-hbj' ); ?>
                                        </div>
                                                                        <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
</div><?php } ?>
                              </li>
                         </ul>
                    </li>
                    <?php } ?>
                  <?php  if(get_option('showsocialmenu') !== 'no') { ?>
                 <!-- Social Menu-->
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-share menu-icon"></i> <span class="sep hidden-xs">|</span> <span class="hidden-xs">Social</span></a>
                         <ul class="dropdown-menu">

                              <li class="container">
                              <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
                                   <div class="vc_row">
                                   <?php } ?>
                                       <div class="<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
vc_col-sm-5 vc_col-xs-12 <?php } else { ?> columns-5<?php } ?>">
									<h5>
 Stay connected using our social channels</h5>
                                        </div>
                                       <div class="<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
vc_col-sm-7 vc_col-xs-12 <?php } else { ?> columns-5<?php } ?>">
                                        <?php dynamic_sidebar( 'social-mega-menu-cols' ); ?>
                                          </div>
                                                                        <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>

                                   </div>
<?php } ?>
                              </li>
                         </ul>
                    </li>
                    <?php } ?>
                   <?php  if(get_option('showsearchmenu') !== 'no') { ?>

                    <!-- Search Menu-->
                    <li class="dropdown gateley-menu-fw">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="icon-search menu-icon"></i> <span class="sep hidden-xs">|</span> <span class="hidden-xs">Search</span></a>
                         <ul class="dropdown-menu">
                              <li class="container">
<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
                                   <div class="vc_row">
                                   <?php } ?>                                        <div class="<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
vc_col-sm-3 vc_col-xs-12 <?php } else { ?> columns-5<?php } ?>">
									<h5>Use this form to search for people, pages, events and our latest news.</h5>
                                        </div>
                                        <div class="<?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
vc_col-sm-9 vc_col-xs-12 <?php } else { ?> columns-5<?php } ?>">
                                             <?php get_search_form( ) ?>
                                        </div>
                                  <?php   if(!preg_match('/(?i)msie [5-7]/',$_SERVER['HTTP_USER_AGENT'])){ ?>
 </div> <?php } ?>
                              </li>
                         </ul>
                    </li>
                   <?php } ?>


 <?php  if(get_option('showctabutton') == 'yes') { ?>
<?php
				      global $switched;
					 switch_to_blog(1);
					//echo "<a href='' class='btn btn-primary navbar-btn' target='_blank'>Main Website</a>";
					if($_COOKIE['first_disclaimer'] == '1' && $_COOKIE['second_disclaimer'] == '1') {
						$mobileclasses ='visible-md visible-lg pull-left';
					} else {
						$mobileclasses = '';
					}
					 echo '<li class="gateley-menu-fw"><a href="'. network_site_url().'" ><i class="icon-home menu-icon"></i>  <span class="sep '.$mobileclasses.'">|</span><span class="'.$mobileclasses.'">Main Website</span></a></li>';

    					restore_current_blog();?>


                   <?php } ?>

               </ul>
          </div>
</header>
