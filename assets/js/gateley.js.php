<?php  
 $absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
 $wp_load = $absolute_path[0] . 'wp-load.php';
 require_once($wp_load);
header('Content-type: text/javascript');
  header('Cache-control: must-revalidate');

ob_start();
    include('static/modernizr.js');
    
    
    if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT']))
{
    // if IE<=8
    include('static/fallback-app.js');
        if(preg_match('/(?i)msie [5-6]/',$_SERVER['HTTP_USER_AGENT'])) {
			?>
               jQuery('.dropdown-toggle').click(function() { 
               
               jQuery(this).parent().addClass('open');
               jQuery(this).find('dropdown-menu').show();
              // alert('Clicked');
             
               });
               <?php
		}
    exit;
}
else
{
    include('static/app.js');
   }
	

		 echo 'jQuery(window).load(function() {  jQuery("body").addClass("loaded"); });';
		 
		    
ob_end_flush();