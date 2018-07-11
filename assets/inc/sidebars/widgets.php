<?php 
require get_template_directory() . '/assets/inc/sidebars/widgets/catlist.php';
require get_template_directory() . '/assets/inc/sidebars/widgets/authors.php';
require get_template_directory() . '/assets/inc/sidebars/widgets/offices.php';

/*=============================================================================================================================================================================================
Widgets
=============================================================================================================================================================================================*/
class SocialNavation extends WP_Widget
{
  function SocialNavation()
  {
    $widget_ops = array('classname' => 'Social Naviation', 'description' => 'Show Social naviation' );
    $this->WP_Widget('SocialNavigation', 'Social Naviation', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    if (isset($instance['content'])) { $content = $instance['content']; } else {$content = '';}
    if (isset($instance['title'])) { $title = $instance['title']; } else {$title = '';}
	$homelink = ( !empty( $instance['homelink'] ) ) ? $instance['homelink'] : '';

?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>">Title:
<input name="<?php echo $this->get_field_name('title'); ?>"  id="<?php echo $this->get_field_id('title'); ?>" class="widefat" value="<?php if (!empty($title)) echo $title; ?>">
</label>
</p>


<p><?php     
    if (isset($instance['layout'])) { $layout = $instance['layout']; } else {$layout = '';} ?>
    
<label for="<?php echo $this->get_field_id('layout'); ?>">Which Category?

<select name="<?php echo $this->get_field_name('layout'); ?>" id="<?php echo $this->get_field_id('layout'); ?>" class="widefat">
<option  value="stacked" <?php if ($instance['layout'] == 'stacked') {?>selected<?php } ?>>Stacked</option>

<option value="inline" <?php if ($instance['layout'] == 'inline') {?>selected<?php } ?>>Inline</option>
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

  <p>
        <label for="<?php echo $this->get_field_id('homelink'); ?>">Site Feed - Updating...</label>

<select name="<?php echo $this->get_field_name('homelink'); ?>" id="<?php echo $this->get_field_id('homelink'); ?>" >
<option value="0">Select a site</option>
<?php   $keys    = wp_get_sites($args);
    foreach ($keys as $key) {
?>
      <option value="<?php echo $key['blog_id']; ?>" <?php if ($instance['homelink'] == $key['blog_id']) {?>selected<?php } ?>><?php echo $key['domain']; ?></option>

      <?php
    }
?>
</select>
<?php // $instance['homelink']; ?>
</p>


<?php
  }
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['content'] = $new_instance['content'];
    $instance['whichsocial'] = $new_instance['whichsocial'];
    $instance['layout'] = $new_instance['layout'];
    $instance['title'] = $new_instance['title'];

    return $instance;
  }
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 echo $before_widget;
    $content = empty($instance['content']) ? ' ' : apply_filters('widget_title', $instance['content']);
        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

      $whichsocial = empty($instance['whichsocial']) ? ' ' : apply_filters('widget_title', $instance['whichsocial']);
 
      $layout = empty($instance['layout']) ? ' ' : apply_filters('widget_title', $instance['layout']);
	 
	 
	 
	 if (!empty($title)) {echo "<h4 class=\"widget-title\">".$title."</h4>";
		}
 if ($layout !== 'stacked') {


	 
	 
    if (!empty($content)) echo "<div class='social-content ".$layout."'>".$content."</div>";
 }
    if ($whichsocial == 'GateleyPlc') {
	  	  echo "<ul class='menu social-menu ".$layout."'>";
	  if (!empty(get_theme_mod("gateley_plc_social_media_blogs"))) {
		  echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_blogs").'" target="_blank"><em class="icon icon-rss"><span class="sr-only">RSS  icon</span></em> Blogs </a></li>';
	  };
	  
	    if (!empty(get_theme_mod("gateley_plc_social_media_linkedin"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_linkedin").'" target="_blank"><em class="icon icon-social-linkedin"><span class="sr-only">Linkedin  icon</span></em> LinkedIn </a></li>';
		    
	  };
	  
	      if (!empty(get_theme_mod("gateley_plc_social_media_twitter"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_twitter").'" target="_blank"><em class="icon icon-social-twitter"><span class="sr-only">Twitter  icon</span></em> Twitter </a></li>';
	  };
	  
	  	if ($layout !== 'stacked') {   echo "</ul>";}


 if (!empty(get_theme_mod("gateley_plc_social_media_facebook") ) || !empty(get_theme_mod("gateley_plc_social_media_instagram")) || !empty(get_theme_mod("gateley_plc_social_media_youtube"))|| !empty(get_theme_mod("gateley_plc_social_media_vimeo"))) { 
	 echo " <ul class='menu social-menu ".$layout."'>"; 
	      if (!empty(get_theme_mod("gateley_plc_social_media_facebook"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_facebook").'" target="_blank"><em class="icon icon-social-facebook"><span class="sr-only">Facebook  icon</span></em> Facebook </a></li>';
	  };
	  
	      if (!empty(get_theme_mod("gateley_plc_social_media_vimeo"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_vimeo").'" target="_blank"><em class="icon icon-social-vimeo"><span class="sr-only">Vimmeo  icon</span></em> Vimeo </a></li>';
	  };
	   if (!empty(get_theme_mod("gateley_plc_social_media_youtube"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_youtube").'" target="_blank"><em class="icon icon-social-youtube"><span class="sr-only">Youtube  icon</span></em> YouTube </a></li>';
	  };
	   if (!empty(get_theme_mod("gateley_plc_social_media_instagram"))) {
		    echo '<li><a href="'.get_theme_mod("gateley_plc_social_media_instagram").'" target="_blank"><em class="icon icon-social-instagram"><span class="sr-only">Instagram icon</span></em> Instagram </a></li>';
	  };
	  
	  	  echo "</ul>";
 }
	  
	  
    } elseif ($whichsocial == 'HBJGateley') {
	    	  echo "<ul class='menu social-menu ".$layout."'>";
	  if (!empty(get_theme_mod("hbj_gateley_social_media_blogs"))) {
		  echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_blogs").'" target="_blank"><em class="icon icon-rss"></em> Blogs </a></li>';
	  };
	  
	    if (!empty(get_theme_mod("hbj_gateley_social_media_linkedin"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_linkedin").'" target="_blank"><em class="icon icon-social-linkedin"></em> LinkedIn </a></li>';
		    
	  };
	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_twitter"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_twitter").'" target="_blank"><em class="icon icon-social-twitter"></em> Twitter </a></li>';
	  };
	  
	  	if ($layout !== 'stacked') {   echo "</ul><ul class='menu social-menu ".$layout."'>"; }

	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_facebook"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_facebook").'" target="_blank"><em class="icon icon-social-facebook"></em> Facebook </a></li>';
	  };
	  
	      if (!empty(get_theme_mod("hbj_gateley_social_media_vimeo"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_vimeo").'" target="_blank"><em class="icon icon-social-vimeo"></em> Vimeo </a></li>';
	  };
	   if (!empty(get_theme_mod("hbj_gateley_social_media_youtube"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_social_media_youtube").'" target="_blank"><em class="icon icon-social-youtube"></em> YouTube </a></li>';
	  };
	  
	     if (!empty(get_theme_mod("hbj_gateley_plc_social_media_instagram"))) {
		    echo '<li><a href="'.get_theme_mod("hbj_gateley_plc_social_media_instagram").'" target="_blank"><em class="icon icon-social-instagram"></em> Instagram </a></li>';
	  };
	  	  echo "</ul>";

    }
echo $after_widget;
echo "\n";
  }
}
add_action( 'widgets_init', create_function('', 'return register_widget("SocialNavation");') );
?>