<?php
// create custom plugin settings menu
add_action('admin_menu', 'static_css_file_generator', 100);

function static_css_file_generator() {

	//create new top-level menu
//	add_menu_page('Static CSS File Generator', 'Static CSS File Generator', 'administrator', __FILE__, 'static_css_file_generator_page' , 'dashicons-admin-generic' );
    add_submenu_page('options-general.php', 'Static File Generator', 'Static File Generator', 'edit_posts', basename(__FILE__), 'static_css_file_generator_page');

}




function static_css_file_generator_page() {
?>
<div class="wrap">

<div class="acf-columns-2">
<form method="post" action="" class="acf-column-1">

<div class="acf-box">
<div class="inner">
<h3>CSS FILE</h3><br>
<?php 
$themeswithcer = get_option('themetype');
switch ($themeswithcer) {
    case "investor":
		  			$location = get_template_directory_uri().'/assets/css/gateley.investor.css.php'; 
        break;
    case "blog":
			$location = get_template_directory_uri().'/assets/css/gateley.blog.css.php'; 
        break;
    default:
    	$location = get_template_directory_uri().'/assets/css/gateley.css.php'; 

}

$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);

?>
   <?php 	if(file_exists(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css")) {?>

Current Live Version - Minified to improve load time
<textarea class="widefat" name="cssfile" disabled  rows="15"><?php echo file_get_contents(get_template_directory_uri().'/assets/css/'.$themename.'-'.get_current_blog_id().".css"); ?></textarea>
    <?php } else{ ?>
Current Dynamic Version - Heavy on load time
<textarea class="widefat" name="cssfile" disabled  rows="15"><?php echo file_get_contents($location); ?></textarea>
<?php }?>
<a href="<?php echo get_template_directory_uri().'/assets/css/'.$themename.'-'.get_current_blog_id().".css"; ?>">View file <?php echo get_template_directory_uri().'/assets/css/'.$themename.'-'.get_current_blog_id().".css"; ?></a>

<?php // var_dump($_POST); ?>

<?php if($_POST['submit'] == "Create CSS File" || $_POST['submit'] == "Update CSS File") {
$directory = wp_upload_dir();

$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);

$myfile = fopen(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css", "w") or die("Unable to open file!");
$txt = '/* DO NOT EDIT - THIS IS A STATIC FILE - TO MAKE EDITS USE THIS FILE: /assets/css/gateley.css.php */
';
$minifiedtxt = file_get_contents($location);
$txt .= $minifiedtxt;
fwrite($myfile, $txt);
fclose($myfile);
?> 
<?php } ?>	

   </div>
<div class="footer">
   <?php 	if(file_exists(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css")) {?>
    <?php submit_button('Update CSS File'); ?>
    <?php } else{ ?>
        <?php submit_button('Create CSS File'); ?>

    <?php } ?>
   </div>
</div>

 
</form>


<div class="acf-column-2">
	<div class="acf-box">
		
			<form method="post" action="">
            <div class="inner"><h3>DELETE CSS FILE</h3><br>
<?php //var_dump($_POST); ?>
<input type="hidden" value="deletecss" name="deletecss">
<?php if($_POST['deletecss'] && file_exists(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css")) {
$directory = wp_upload_dir();
$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);
unlink(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css")
?> 
<?php } ?>	
</div>
<div class="footer">
		      <?php submit_button('Delete CSS File'); ?>
		</div>

</form>
		
		
	</div>
</div>
<div class="acf-clear"></div>
</div>
<br>


<div class="acf-clear clear clearfix">
<div class="acf-columns-2">


<form method="post" action="" class="acf-column-1">

<div class="acf-box">
<div class="inner">
<h3>JS FILE</h3>
<?php $jslocation = get_template_directory_uri().'/assets/js/gateley.js.php'; 
$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);
?>
   <?php 	if(file_exists(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js")) {?>
Current Live Version - Minified to improve load time
 <textarea class="widefat" name="jsfile" disabled  rows="15"><?php echo file_get_contents(get_template_directory_uri()."/assets/js/".$themename.'-'.get_current_blog_id().".js"); ?></textarea>

 <?php } else{ ?>
 Dymanic Version - Heavy On Load Time
 <textarea class="widefat" name="jsfile" disabled  rows="15"><?php echo file_get_contents($jslocation); ?></textarea>

    <?php } ?>




<?php //var_dump($_POST); ?>

<?php if($_POST['submit'] == "Create JS File" || $_POST['submit'] == "Update JS File") {
$directory = wp_upload_dir();

$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);

$myjsfile = fopen(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js", "w") or die("Unable to open file!");
$jstxt = file_get_contents($jslocation);
    $jSqueeze = new JSqueeze();
	$txt = '/* DO NOT EDIT - THIS IS A STATIC FILE - TO MAKE EDITS USE THIS FILE: /assets/js/gateley.js.php */
';
    $code = $txt.$jSqueeze->squeeze($jstxt, true, false);


fwrite($myjsfile, $code);
fclose($myjsfile);
?> 
<?php } ?>	
</div>
<div class="footer">
   <?php 	if(file_exists(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js")) {?>
    <?php submit_button('Update JS File'); ?>
    <?php } else{ ?>
        <?php submit_button('Create JS File'); ?>
    <?php } ?>
</div>

</div>


</form>


<div class="acf-column-2">
	<div class="acf-box ">
		
			<form method="post" action="">
            <div class="inner"><h3>DELETE JS FILE</h3><br>
<?php //var_dump($_POST); ?>
<input type="hidden" value="deletejs" name="deletejs">
<?php if($_POST['deletejs'] && file_exists(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js")) {
$directory = wp_upload_dir();
$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);
unlink(get_template_directory()."/assets/js/".$themename.'-'.get_current_blog_id().".js")
?> 
<?php } ?>	
		</div>

<div class="footer">
		    <?php submit_button('Delete JS File'); ?>
		</div>

</form>
		
	</div>
</div>
<div class="acf-clear"></div>
</div>


</div>

</div>
<style>.clear:before, .clear:after{content:"";display:block;width:100%; clear:both;}</style>
<?php } ?>
<?php
function autoupdatecss( $post_id ) {

	// If this is just a revision, don't send the email.
	if ( wp_is_post_revision( $post_id ) )
		return;

	$directory = wp_upload_dir();
 $location = get_template_directory_uri().'/assets/css/gateley.css.php';
$theme = wp_get_theme( $stylesheet, $theme_root ); 
$themename = $theme['Name']; 
$themename = strtolower($themename);
$themename = str_replace(' ', '-', $themename);


$myfile = fopen(get_template_directory()."/assets/css/".$themename.'-'.get_current_blog_id().".css", "w") or die("Unable to open file!");
$txt = '/* DO NOT EDIT - THIS IS A STATIC FILE - TO MAKE EDITS USE THIS FILE: /assets/css/gateley.css.php */
';
$minifiedtxt = file_get_contents($location);
$txt .= $minifiedtxt;
fwrite($myfile, $txt);
fclose($myfile);

}
add_action( 'save_post', 'autoupdatecss' ); 

add_action('get_header', 'minify_start', 10000);

function minify_start()  {

    ob_start( 'minify_html' );

}?>