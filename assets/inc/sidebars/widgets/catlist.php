<?php /*=============================================================================================================================================================================================
Widgets
=============================================================================================================================================================================================*/
class CategoryList extends WP_Widget
{
  function CategoryList()
  {
    $widget_ops = array('classname' => 'Category List', 'description' => 'List of categories' );
    $this->WP_Widget('CategoryList', 'Category List', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    if (isset($instance['content'])) { $content = $instance['content']; } else {$content = '';}

?>
<p><?php     
    if (isset($instance['whichCat'])) { $whichCat = $instance['whichCat']; } else {$whichCat = '';} ?>
   
<label for="<?php echo $this->get_field_id('whichCat'); ?>">Which Category:

<select name="<?php echo $this->get_field_name('whichCat'); ?>" id="<?php echo $this->get_field_id('whichCat'); ?>" class="widefat">

 <?php $theoptions = array('[0]' => array('value' => 'gateley_plc_sector', 'title' => 'Sector'), '[1]' => array('value' =>'gateley_plc_service',  'title' => 'Service'), '[2]' => array('value' =>'gateley_plc_us_location',  'title' => 'Locations'));
foreach($theoptions as $opts) {?>
<option  value="<?php echo $opts['value']; ?>" <?php if ($instance['whichCat'] == $opts['value']) {?>selected<?php } ?>>
		<?php echo $opts['title']; ?></option>
<?php
}
?>
</select>
<?php // echo $instance['whichsocial']; ?>
</p>

<p>
<label for="<?php echo $this->get_field_id('content'); ?>">Content:
<textarea name="<?php echo $this->get_field_name('content'); ?>"  id="<?php echo $this->get_field_id('content'); ?>" class="widefat"><?php echo $content; ?></textarea>
</label>
</p>

<p><?php     
    if (isset($instance['whichsocial'])) { $whichsocial = $instance['whichsocial']; } else {$whichsocial = '';} ?>
    
<label for="<?php echo $this->get_field_id('whichsocial'); ?>">Which Social Navigation:

<select name="<?php echo $this->get_field_name('whichsocial'); ?>" id="<?php echo $this->get_field_id('whichsocial'); ?>" class="widefat">
<option value="">None</option>
<option value="GateleyPlc" <?php if ($instance['whichsocial'] == 'GateleyPlc') {?>selected<?php } ?>>Gateley Plc</option>
<option  value="HBJGateley" <?php if ($instance['whichsocial'] == 'HBJGateley') {?>selected<?php } ?>> HBJ Gateley</option>
</select>
<?php // echo $instance['whichsocial']; ?>
</p>


<?php
  }
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['content'] = $new_instance['content'];
    $instance['whichsocial'] = $new_instance['whichsocial'];
    $instance['layout'] = $new_instance['layout'];

    return $instance;
  }
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 echo $before_widget;
    $content = empty($instance['content']) ? ' ' : apply_filters('widget_title', $instance['content']);
      $whichsocial = empty($instance['whichsocial']) ? ' ' : apply_filters('widget_title', $instance['whichsocial']);
 
      $layout = empty($instance['layout']) ? ' ' : apply_filters('widget_title', $instance['layout']);
 if ($layout !== 'stacked') {
    if (!empty($content)) echo "<div class='social-content ".$layout."'>".$content."</div>";
 }
    if ($whichsocial == 'GateleyPlc') {
	  	  echo "<ul class='menu social-menu ".$layout."'>";
	  if (!empty(get_theme_mod("gateley_plc_social_media_blogs"))) {
		  echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_blogs").'"><em class="icon icon-rss"></em> Blogs </a></li>';
	  };
	  
	    if (!empty(get_theme_mod("gateley_plc_social_media_linkedin"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_linkedin").'"><em class="icon icon-social-linkedin"></em> LinkedIn </a></li>';
		    
	  };
	  
	      if (!empty(get_theme_mod("gateley_plc_social_media_twitter"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_twitter").'"><em class="icon icon-social-twitter"></em> Twitter </a></li>';
	  };
	  
	  	if ($layout !== 'stacked') {   echo "</ul><ul class='menu social-menu ".$layout."'>"; }

	  
	      if (!empty(get_theme_mod("gateley_plc_social_media_facebook"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_facebook").'"><em class="icon icon-social-facebook"></em> Facebook </a></li>';
	  };
	  
	      if (!empty(get_theme_mod("gateley_plc_social_media_vimeo"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_vimeo").'"><em class="icon icon-social-vimeo"></em> Vimeo </a></li>';
	  };
	   if (!empty(get_theme_mod("gateley_plc_social_media_youtube"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_youtube").'"><em class="icon icon-social-youtube"></em> YouTube </a></li>';
	  };
	  
	  	  echo "</ul>";

	  
    } elseif ($whichsocial == 'HBJGateley') {
	    	  echo "<ul class='menu social-menu ".$layout."'>";
	  if (!empty(get_theme_mod("hbj_gateley_social_media_blogs"))) {
		  echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_blogs").'"><em class="icon icon-rss"></em> Blogs </a></li>';
	  };
	  
	    if (!empty(get_theme_mod("hbj_gateley_social_media_linkedin"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_linkedin").'"><em class="icon icon-social-linkedin"></em> LinkedIn </a></li>';
		    
	  };
	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_twitter"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_twitter").'"><em class="icon icon-social-twitter"></em> Twitter </a></li>';
	  };
	  
	  	if ($layout !== 'stacked') {   echo "</ul><ul class='menu social-menu ".$layout."'>"; }

	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_facebook"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_facebook").'"><em class="icon icon-social-facebook"></em> Facebook </a></li>';
	  };
	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_vimeo"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_vimeo").'"><em class="icon icon-social-vimeo"></em> Vimeo </a></li>';
	  };
	   if (!empty(get_theme_mod("hbj_gateley_social_media_youtube"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_youtube").'"><em class="icon icon-social-youtube"></em> YouTube </a></li>';
	  };
	  
	  	  echo "</ul>";

    }
echo $after_widget;
echo "\n";
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("CategoryList");') );