<?php /*=============================================================================================================================================================================================
Widgets
=============================================================================================================================================================================================*/
class Gateley_Author_List_Widget extends WP_Widget {

  function Gateley_Author_List_Widget()
  {
    $widget_ops = array('classname' => 'gateley-author-list', 'description' => 'A simple author display widget' );
    $this->WP_Widget('gateley-author-list', 'Gateley Author List', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    if (isset($instance['content'])) { $content = $instance['content']; } else {$content = '';}
    
	// Field Values
	$title = ( !empty( $instance['title'] ) ) ? $instance['title'] : '';
	$count = ( !empty( $instance['count'] ) ) ? $instance['count'] : 5;
	$orderby = ( !empty( $instance['orderby'] ) ) ? $instance['orderby'] : 'post_count';
	$order = ( !empty( $instance['order'] ) ) ? $instance['order'] : 'desc';

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

?>
    <p>
        <label for="<?php echo $this->get_field_name( 'title' ); ?>">Title: </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'count' ); ?>">Authors To Show: </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_name( 'orderby' ); ?>">Order By: </label>
        <select class='widefat'  id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
            <?php foreach( $orderby_options as $value => $name ) : ?>
                <option <?php selected( $orderby, $value ) ?> value='<?php echo $value ?>'><?php echo $name ?></option>
            <?php endforeach ?>
        </select>
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_name( 'order' ); ?>">Order By: </label>
        <select class='widefat'  id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
            <?php foreach( $orderby_options as $value => $name ) : ?>
                <option <?php selected( $order, $value ) ?> value='<?php echo $value ?>'><?php echo $name ?></option>
            <?php endforeach ?>
        </select>
    </p>
    



<?php
  }
  function update($new_instance, $old_instance)
  {
   $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['count'] = $new_instance['count'];
    $instance['orderby'] = $new_instance['orderby'];
    $instance['order'] = $new_instance['order'];

    return $instance;
  }
  function widget($args, $instance)
  {
   
	echo $args['before_widget'];

	if( !empty( $instance['title'] ) ) {
		echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $args['after_title'];
	}
	
$args = array(
	'blog_id'      => $GLOBALS['blog_id'],

	'who' => 'authors',
	'number' => $instance['count'],
	'orderby' => $instance['orderby'],
	'order' => $instance['order'],
		'exclude'      => array(1),
		'fields'       => 'all',
);
	
 $users = get_users( $args );

 
 if( !empty( $users ) ) {
	echo '<ul>';
	foreach( $users as $user ) {
		echo '<li>';
		$link = strtolower($user->display_name);
		$link = str_replace(' ', '', $link);
		echo '<a href="' . home_url() . '/author/
		'.$link.'">' . get_avatar( $user->ID, 64 ) . '</a>';
		echo '<a href="' . home_url() . '/author/'.$link.'">' . $user->display_name . '</a>';
		echo '</li>';
	}
	echo '</ul>';
}
else {
	echo 'No Users To Show';
}



	echo $args['after_widget'];
  }
}
add_action( 'widgets_init', function(){
     register_widget( 'Gateley_Author_List_Widget' );
});
