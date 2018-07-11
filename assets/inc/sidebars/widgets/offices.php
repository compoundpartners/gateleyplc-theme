<?php /*=============================================================================================================================================================================================
Widgets
=============================================================================================================================================================================================*/
class Gateley_Offices_List_Widget extends WP_Widget {

  function Gateley_Offices_List_Widget()
  {
    $widget_ops = array('classname' => 'gateley-office-list', 'description' => 'A simple office display widget' );
    $this->WP_Widget('gateley-author-list', 'Gateley Offices List', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );

	// Field Values
	$title = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
	$count = ( !empty( $instance['count'] ) ) ? $instance['count'] : 1;
	$homelink = ( !empty( $instance['homelink'] ) ) ? $instance['homelink'] : '';

	// Field Options
	$orderby_options = array(
		'ID' => 'ID',
		'email' => 'Email',
		'post_count' => 'Post Count'
	);

	$order_options = array(
		'desc' => 'Descending',
		'asc' => 'Ascending'
	);
	
	

/*?>
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
<?php  $instance['homelink']; ?>
</p> */?>
  
   <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>">Title: </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_name( 'count' ); ?>">Blog: </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
    </p>
    
  
<?php
  }
  function update($new_instance, $old_instance)
  {
   $instance = $old_instance;

    $instance['title'] = $new_instance['title'];
    $instance['count'] = $new_instance['count'];
	    $instance['homelink'] = $new_instance['homelink'];

    return $instance;
  }
  function widget($args, $instance)
  {
  $original_blog_id = get_current_blog_id();
	if(empty($instance['count']) || $instance['count'] == 5) {
	$blog_id = 1;
	} else {
	$blog_id = $instance['count'];	
	}
	$themetype = get_option('themetype');
	if ($themetype == 'blog' || $themetype == 'main' &&  get_option('disclaimer') == '1') {
	switch_to_blog( $blog_id  );
	}
	echo $args['before_widget'];

	if( !empty( $instance['title'] ) ) {
		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
	}
	
	?>
  <div class="mb20 clear clearfix">
  <form action="">
  <label for="officeswitcher" class="sr-only">Select an office near you</label>
  <!--onchange="document.location.href=this.options[this.selectedIndex].value;"  -->
     <select name="officeswitcher" id="officeswitcher" class="form-control select-block">
     <option class="transparent" value="select">Select an office near you </option>
    
     <?php  $currentid = get_the_ID();  wp_reset_query();
   

 $args    = array(
        'post_type' => 'office',
        'posts_per_page' => -1,
	   'order' => 'ASC'
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
		  //if($post->ID !== $currentid) {
echo '<option value="'.get_the_permalink().'">'.get_the_title().'</option>';   
		  //}
		  endwhile;
    }  wp_reset_query();
    
    

?>
     </select>
        <input onclick="gotourl(document.getElementById('officeswitcher'))" value="Go to office" type="button" class="btn btn-primary pull-right">
        </form> 
 
<?php
		switch_to_blog( $original_blog_id );	
		echo '   </div>';
				echo '   </div>';

	echo $args['after_widget'];
	
  }
}
add_action( 'widgets_init', function(){
     register_widget( 'Gateley_Offices_List_Widget' );
});
