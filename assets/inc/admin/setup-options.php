<?php
// create custom plugin settings menu
add_action('admin_menu', 'gateley_theme_create_menu');

function gateley_theme_create_menu() {

	//create new top-level menu
	add_menu_page('Gateley Theme Settings', 'Gateley Theme Settings', 'administrator', __FILE__, 'gateley_settings_page' , 'dashicons-admin-generic' );

	//call register settings function
	add_action( 'admin_init', 'register_gateley_settings' );
}


function register_gateley_settings() {
	//register our settings
	register_setting( 'gateley-theme-settings-group', 'widgetname' );
	register_setting( 'gateley-theme-settings-group', 'disclaimer' );
	register_setting( 'gateley-theme-settings-group', 'themetype' );
		register_setting( 'gateley-theme-settings-group', 'mainwebsitelink' );
		register_setting( 'gateley-theme-settings-group', 'newspage' );
		register_setting( 'gateley-theme-settings-group', 'eventpage' );
		register_setting( 'gateley-theme-settings-group', 'officepage' );
		register_setting( 'gateley-theme-settings-group', 'cookie_text' );
				register_setting( 'gateley-theme-settings-group', 'thisissite' );

		register_setting( 'gateley-theme-settings-group', 'sitesplitgateley' );
		register_setting( 'gateley-theme-settings-group', 'sitesplithbjgateley' );
		register_setting( 'gateley-theme-settings-group', 'showsocialmenu' );
		register_setting( 'gateley-theme-settings-group', 'showsearchmenu' );
		register_setting( 'gateley-theme-settings-group', 'logowidth' );
		register_setting( 'gateley-theme-settings-group', 'showctabutton' );
		register_setting( 'gateley-theme-settings-group', 'customcss' );
		register_setting( 'gateley-theme-settings-group', 'menucols' );
		register_setting( 'gateley-theme-settings-group', 'peoplepage' );
		register_setting( 'gateley-theme-settings-group', 'lockdown' );

		register_setting( 'gateley-theme-settings-group', 'hidenpb' );
		register_setting( 'gateley-theme-settings-group', 'blog_disclaimer' );
		
		register_setting( 'gateley-theme-settings-group', 'analytics' );
		register_setting( 'gateley-theme-settings-group', 'allpage' );
		register_setting( 'gateley-theme-settings-group', 'allpagexhome' );

		register_setting( 'gateley-theme-settings-group', 'showhomepageadvert' );
		register_setting( 'gateley-theme-settings-group', 'homepageadvertbackground' );
		register_setting( 'gateley-theme-settings-group', 'homepageadvertcontent' );
		register_setting( 'gateley-theme-settings-group', 'homepageadverthashtag' );
		register_setting( 'gateley-theme-settings-group', 'homepageadvertlink' );



		

}

function gateley_settings_page() {
?>
<div class="wrap">
<form method="post" action="options.php">

<div class="postbox">
<div class="inside">
<h3>Theme Settings</h3>
<hr>

  <table class="form-table">
  
   	   <tr valign="top">
        <th scope="row">
        Theme Type</th>
        <td>      
        <select name="themetype">
             <option value="main" <?php if(esc_attr( get_option('themetype') ) == 'main') { echo 'selected'; } ?>>Main Website</option>
             <option value="investor" <?php if(esc_attr( get_option('themetype') ) == 'investor') { echo 'selected'; } ?>>Investor Website</option>
             <option value="blog" <?php if(esc_attr( get_option('themetype') ) == 'blog') { echo 'selected'; } ?>>Blog Website(s)</option>
        </select>
        
         </td>
        </tr>
        
        
         <tr valign="top">
        <th scope="row">
        This Site Is</th>
        <td>      
        <select name="thisissite">
        <?php
         $hbjorplc = get_terms('gateley_plc_or_hbj_gateley');
         foreach ($hbjorplc as $whichsite) {?>
             <option value="<?php echo $whichsite->slug; ?>" <?php if(esc_attr( get_option('thisissite') ) == $whichsite->slug) { echo 'selected'; } ?>><?php echo $whichsite->name; ?></option>
         <?php } ?>
        </select>
        
         </td>
        </tr>
        
        
        
        
         <tr valign="top">
        <th scope="row">
        Show Disclaimer</th>
        <td>        <input name="disclaimer" type="checkbox" value="1" <?php if(esc_attr( get_option('disclaimer') ) == '1') { echo 'checked'; } ?>> </td>
        </tr>
        
          <th scope="row">
        Link to Main Website</th>
        <td><input type="text" name="mainwebsitelink" value="<?php echo esc_attr( get_option('mainwebsitelink') ); ?>" class="widefat" /></td>
        </tr>
      	   <tr valign="top">
        <th scope="row">
        Gateley Website</th>
        <td>      
        <select name="sitesplitgateley">
        <?php $thesites =  wp_get_sites();
        foreach( $thesites as $site) {?>
             <option value="<?php echo $site['blog_id']; ?>" <?php if(esc_attr( get_option('sitesplitgateley') ) ==  $site['blog_id']) { echo 'selected'; } ?>><?php echo $site['domain']; ?></option>
		<?php }?>


 
             
        </select>
        
         </td>
        </tr>
          <tr valign="top">
        <th scope="row">
        HBJ Gateley Website</th>
        <td>      
        <select name="sitesplithbjgateley">
        <?php $thesites =  wp_get_sites();
        foreach( $thesites as $site) {?>
             <option value="<?php echo $site['blog_id']; ?>" <?php if(esc_attr( get_option('sitesplithbjgateley') ) ==  $site['blog_id']) { echo 'selected'; } ?>><?php echo $site['domain']; ?></option>
		<?php }?>


 
             
        </select>
        
         </td>
        </tr>
        
        
    </table>
    
    
    
   


</div>
</div> 
<div class="postbox">
<div class="inside">
<h3>Style Options</h3>
<hr>

  <table class="form-table">

<tr valign="top">
        <th scope="row">
       Show Search Menu</th>
        <td>      
        <select name="showsearchmenu">
             <option value="yes" <?php if(esc_attr( get_option('showsearchmenu') ) == 'yes') { echo 'selected'; } ?>>Yes</option>
             <option value="no" <?php if(esc_attr( get_option('showsearchmenu') ) == 'no') { echo 'selected'; } ?>>No</option>
        </select>
        
         </td>
        </tr>
    
<tr valign="top">
        <th scope="row">
       Show Social Menu</th>
        <td>      
        <select name="showsocialmenu">
             <option value="yes" <?php if(esc_attr( get_option('showsocialmenu') ) == 'yes') { echo 'selected'; } ?>>Yes</option>
             <option value="no" <?php if(esc_attr( get_option('showsocialmenu') ) == 'no') { echo 'selected'; } ?>>No</option>
        </select>
        
         </td>
        </tr>
<tr valign="top">
        <th scope="row">
       Show CTA Button</th>
        <td>      
        <select name="showctabutton">
             <option value="yes" <?php if(esc_attr( get_option('showctabutton') ) == 'yes') { echo 'selected'; } ?>>Yes</option>
             <option value="no" <?php if(esc_attr( get_option('showctabutton') ) == 'no') { echo 'selected'; } ?>>No</option>
        </select>
        
         </td>
        </tr>
        
<tr valign="top">
        <th scope="row">
       Logo Max Width</th>
        <td>      
        <input name="logowidth" value="<?php echo get_option('logowidth'); ?>" type="text">
         </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">
       Menu number of columns</th>
        <td>      
        <input name="menucols" value="<?php echo get_option('menucols'); ?>" type="text">
         </td>
        </tr>
        
        
        <tr valign="top">
        <th scope="row">
      Custom CSS</th>
        <td>      
        <textarea name="customcss" class="widefat"><?php echo get_option('customcss'); ?></textarea>
         </td>
        </tr>
        </table>
</div>
</div>


<div class="postbox">
<div class="inside">
<h3>Single News Items</h3>
<hr>

  <table class="form-table">
  
   	   <tr valign="top">
        <th scope="row">
        News Items Parent</th>
        <td>      
        <select name="newspage">
             <option value=" " <?php if(esc_attr( get_option('newspage') ) == ' ') { echo 'selected'; } ?>>None</option>
             
            <?php wp_reset_query();
    $args    = array(
        'post_type' => 'page',
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
		  if(esc_attr( get_option('newspage') ) == get_the_ID()) { $selected = 'selected'; } else { $selected = '';}
		  echo '<option value="'.get_the_ID().'" '. $selected.'>'.get_the_title().'</option>';
        endwhile;
    }
	   ?>
        
        
        </select>
        
         </td>
        </tr>
        
         <tr valign="top">
        <th scope="row">
       Event Items Parent</th>
        <td>      
        <select name="eventpage">
             <option value=" " <?php if(esc_attr( get_option('eventpage') ) == ' ') { echo 'selected'; } ?>>None</option>
             
            <?php wp_reset_query();
    $args    = array(
        'post_type' => 'page',
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
		  if(esc_attr( get_option('eventpage') ) == get_the_ID()) { $selected = 'selected'; } else { $selected = '';}
		  echo '<option value="'.get_the_ID().'" '. $selected.'>'.get_the_title().'</option>';
        endwhile;
    }
	   ?>
        
        
        </select>
        
         </td>
        </tr>
        
        
           
         <tr valign="top">
        <th scope="row">
       Office Items Parent</th>
        <td>      
        <select name="officepage">
             <option value=" " <?php if(esc_attr( get_option('officepage') ) == ' ') { echo 'selected'; } ?>>None</option>
             
            <?php wp_reset_query();
    $args    = array(
        'post_type' => 'page',
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
		  if(esc_attr( get_option('officepage') ) == get_the_ID()) { $selected = 'selected'; } else { $selected = '';}
		  echo '<option value="'.get_the_ID().'" '. $selected.'>'.get_the_title().'</option>';
        endwhile;
    }
	   ?>
        
        
        </select>
        
         </td>
        </tr>
        <tr valign="top">
        <th scope="row">
     People Items Parent</th>
        <td>      
        <select name="peoplepage">
             <option value=" " <?php if(esc_attr( get_option('peoplepage') ) == ' ') { echo 'selected'; } ?>>None</option>
             
            <?php wp_reset_query();
    $args    = array(
        'post_type' => 'page',
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
		  if(esc_attr( get_option('peoplepage') ) == get_the_ID()) { $selected = 'selected'; } else { $selected = '';}
		  echo '<option value="'.get_the_ID().'" '. $selected.'>'.get_the_title().'</option>';
        endwhile;
    }
	   ?>
        
        
        </select>
        
         </td>
        </tr>
    </table>
    


</div>
</div> 
<div class="postbox">
<div class="inside">
<h3>Cookie Policy</h3>
<hr>


    <?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
    <table class="form-table">
          <tr valign="top">
        <th scope="row">Text.</th>
        <td>
       <?php wp_editor( get_option('cookie_text') , 'cookie_text' ); ?>
        </td>
        </tr>

    
    </table>
    


</div>
</div>


<div class="postbox">
<div class="inside">
<h3>Sidebars</h3>
<hr>


    <?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top" >
        <th scope="row"> Name</th>

               <?php  $data  = get_option('widgetname');?>

        <td class="form-group">
        <div id='Widgets'>
        <div class=" NewWidget">
        <input type="text" id="widgetname[0][1]['name']"  name="widgetname[0][1]['name']" value="" class="widefat"/>
        </div>
                <a class="addWidget btn btn-default" href="#Widgets">Add New </a>
                
	<?php if (!empty($data)) { 
	$i = 2;
	//var_dump($data[0]);
     foreach($data[0] as $v ) {
//echo var_dump($v);
if (!empty( $v["'name'"])) {?>
     <div class=" NewWidget" id="widget<?php echo $i; ?>"><hr>
        <input type="text" value="<?php echo $v["'name'"]; ?>" name="widgetname[0][<?php echo $i; ?>]['name']" id="widgetname[0][<?php echo $i; ?>]['name']" class="widefat">
        <a href="#Widgets" class="removeWidget">Remove </a></div>
        </div>
        
        <?php $i++; 
}
}} ?>
        </td>

        </tr>
        <script>
	   
jQuery(function($){
    var template = $('#Widgets .NewWidget:first').clone(),
        attendeesCount = 1;

    var addAttendee = function(){
        attendeesCount++;
        var attendee = template.clone().find(':input').each(function(){
            var newId = this.id.replace('[1]','['+attendeesCount+']');
            $(this).prev().attr('for', newId); // update label for (assume prev sib is label)
            this.name = this.id = newId; // update id and name (assume the same)
        }).end() // back to .attendee
        .attr('id', 'widget' + attendeesCount).prepend('<hr/>').append('<a class="removeWidget" href="#Widgets">Remove </a>') 
	   // update attendee id
        .appendTo('#Widgets'); // add to container
	    $('.removeWidget').on('click',remove);
    };

    $('.addWidget').click(addAttendee); // attach event
    
    var remove = function(){
	 $(this).parent().remove();// attach event
}
    $('.removeWidget').on('click',remove); // attach event


});
	   </script>
    
    </table>
    


</div>
</div>


<div class="postbox">
<div class="inside">
<h3> Lockdown Site</h3>
<hr>


    <?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
    <table class="form-table">
       
   <tr valign="top">
        <th scope="row">
        Lockdown Site</th>
        <td>        <input name="lockdown" type="checkbox" value="1" <?php if(esc_attr( get_option('lockdown') ) == '1') { echo 'checked'; } ?>> </td>
        </tr>
        

    
    </table>
    


</div>
</div>




<div class="postbox">
<div class="inside">
<h3> Profile Setup</h3>
<hr>


    <?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
    <table class="form-table">
       
   <tr valign="top">
        <th scope="row">
      Hide News, Publications & Blogs</th>
        <td>        <input name="hidenpb" type="checkbox" value="1" <?php if(esc_attr( get_option('hidenpb') ) == '1') { echo 'checked'; } ?>> </td>
        </tr>
        

    
    </table>
    


</div>
</div>
<?php
if(get_option('themetype') == 'blog') {
?>

<div class="postbox">
<div class="inside">
<h3>Blog Disclaimer</h3>
<hr>


    <?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
    <table class="form-table">
          <tr valign="top">
        <th scope="row">Disclaimer.</th>
        <td>
       <?php wp_editor( get_option('blog_disclaimer') , 'blog_disclaimer' ); ?>
        </td>
        </tr>

    
    </table>
    


</div>
</div>


<?php

}
?>

<div class="postbox">
<div class="inside">
<h3>Statistics</h3>
<hr>
<?php settings_fields( 'gateley-theme-settings-group' ); ?>
    <?php do_settings_sections( 'gateley-theme-settings-group' ); ?>
  <table class="form-table">
        <tr valign="top">
        <th scope="row">
     Google Analytics</th>
        <td>      
        <textarea name="analytics" class="widefat"><?php echo get_option('analytics'); ?></textarea>
         </td>
        </tr>
        </table>
</div>
</div>
<div class="postbox">
<div class="inside">
<h3>Add to all Pages </h3>
<hr>

  <table class="form-table">


        
        
        <tr valign="top">
        <th scope="row">
     Add to all Pages - EXCEPT HOMEPAGE</th>
        <td>      
        <textarea name="allpagexhome" class="widefat"><?php echo get_option('allpagexhome'); ?></textarea>
         </td>
        </tr>
        
          <tr valign="top">
        <th scope="row">
     Add to all Pages </th>
        <td>      
        <textarea name="allpage" class="widefat"><?php echo get_option('allpage'); ?></textarea>
         </td>
        </tr>
        </table>
</div>
</div>

<div class="postbox">
<div class="inside">
<h3>Campaign Settings </h3>
<hr>
  <table class="form-table">

        
          <tr valign="top">
        <th scope="row">
     Show Homepage Advert? </th>
        <td>      
                  <input name="showhomepageadvert" type="checkbox" value="1" <?php if(esc_attr( get_option('showhomepageadvert') ) == '1') { echo 'checked'; } ?>> 

         </td>
        </tr>
          <tr valign="top">
        <th scope="row">
     Homepage Advert Background </th>
        <td>      
                  <input name="homepageadvertbackground" type="text" value="<?php echo get_option('homepageadvertbackground') ?>" > 

         </td>
        </tr>
             <tr valign="top">
        <th scope="row">
     Homepage Advert Content </th>
        <td>      
               <?php wp_editor( get_option('homepageadvertcontent') , 'homepageadvertcontent' ); ?>

         </td>
        </tr>
        
 <tr valign="top">
        <th scope="row">
     Homepage Advert Background </th>
        <td>      
                  <input name="homepageadverthashtag" type="text" value="<?php echo get_option('homepageadverthashtag') ?>" > 

         </td>
        </tr>
           
 <tr valign="top">
        <th scope="row">
     Homepage Advert Background </th>
        <td>      
                  <input name="homepageadvertlink" type="text" value="<?php echo get_option('homepageadvertlink') ?>" > 

         </td>
        </tr>
        </table>
</div>
</div>

    <?php submit_button(); ?>
</form>

</div>



<?php } ?>
