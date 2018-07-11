<?php
/**
 * Template Name: New Job Roles
 *
 * @package WordPress
 * @package gateley-plc 
 */

get_header();
?>

<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-image-cropped' );
$url = $thumb['0'];
?>
 <header class="page-header vertical-height-no-overlay <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?> mb30">          
 <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title">            <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?></h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
          </div>
     </header> 
     <?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}


$GLOBALS['styles'] .= ".page-id-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";
global $post;
$color = get_post_meta($post->ID, '_pagecolour', true);
$colour = $color;

?>
<div class="container">
   <ul class="nav nav-pills nav-justified mb30">
  <li role="presentation" class="active" ><a href="#role" data-toggle="pill" aria-controls="role">Role </a></li>

  <li role="presentation"><a href="#team" data-toggle="pill" aria-controls="team">Team </a></li>
  <li role="presentation"><a href="#location" data-toggle="pill" aria-controls="location">Location</a></li>
</ul>
</div>



<div id="primary" class="content-area container">
<main id="main" class="site-main">
<div class="vc_row wpb_row vc_row-fluid row-no-pad mb30 equalheights white-bg white">
  <div class="pb0 mb0 wpb_column vc_column_container vc_col-sm-8">
    <div class="content-inner tab-content">
    <div role="tabpanel" class="tab-pane active" id="role">
       <?php  $tax       = 'gateley_plc_areas';
        $tax_terms = get_terms($tax, array(
            'order' => 'DESC'
        ));
        if ($tax_terms) {
                    foreach ($tax_terms as $tax_term) {
                    
                echo    "<h3>".$tax_term->name."</h3>"; ?>
   <table class="table table-condensed">
    <?php  $roles = get_terms('gateley_plc_roles');
	?>
    <tr>
    <td><strong>Role</strong></td>
    <td><strong>Team</strong></td>
    <td><strong>Location</strong></td>
    </tr>
   

        
	
	<?php
	    foreach ($roles as $role) {
			// WP_Query arguments
$args = array (
	'post_type'              => array( 'careers' ),
	'tax_query'          => array(
                'relation' => 'AND',
				array(
                    'taxonomy' => 'gateley_plc_roles',
                    'field' => 'slug',
                    'terms' => $role->slug
                ),
				array(
                    'taxonomy' => 'gateley_plc_areas',
                    'field' => 'slug',
                    'terms' => $tax_term->slug
                )
		)
);
// The Query
$query = new WP_Query( $args );

        if ($query ->have_posts()) {
echo "<tr>";
echo "<td class='active' colspan='3'>".$role->name."</td>";


echo "</tr>";


            while ($query ->have_posts()):
                $query ->the_post();
				
				$gateley_plc_roles = wp_get_post_terms($post->ID, 'gateley_plc_departments', array("fields" => "names"));
				$gateley_plc_us_location = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));

?>
                <tr><td><a href="<?php echo the_permalink(); ?>" target="_blank"><?php echo the_title(); ?></a></td><td><?php echo $gateley_plc_roles[0];?></td><td><?php echo $gateley_plc_us_location[0];?></td></tr>
                <?php
			 endwhile;

		} /*else {
			echo "<td class='' colspan='3'>Currently no roles</td>";

		}*/


		}
		?>  
        
        </table>  <?php } }?>
    </div>
    <div role="content-inner tabpanel" class="tab-pane" id="team">
       <?php  $tax       = 'gateley_plc_areas';
        $tax_terms = get_terms($tax, array(
            'order' => 'DESC'
        ));
        if ($tax_terms) {
                    foreach ($tax_terms as $tax_term) {
                    
                echo    "<h3>".$tax_term->name."</h3>"; ?>
                
     <table class="table table-condensed">
    <?php  $teams = get_terms('gateley_plc_departments', array(
        'hide_empty' => true
    ));
	?>
    <tr>
    <td><strong>Role</strong></td>
    <td><strong>Team</strong></td>
    <td><strong>Location</strong></td>
    </tr>
    <?php
	    foreach ($teams as  $team) {
			
// WP_Query arguments
$args = array (
	'post_type'              => array( 'careers' ),
	'tax_query'          => array(
                'relation' => 'AND',
				array(
                    'taxonomy' => 'gateley_plc_departments',
                    'field' => 'slug',
                    'terms' =>  $team->slug
                ),
				array(
                    'taxonomy' => 'gateley_plc_areas',
                    'field' => 'slug',
                    'terms' => $tax_term->slug
                )
		)
);
// The Query
$query = new WP_Query( $args );

        if ($query ->have_posts()) {
echo "<tr>";
echo "<td class='active' colspan='3'>". $team->name."</td>";






echo "</tr>";


            while ($query ->have_posts()):
                $query ->the_post();
				
				$gateley_plc_roles = wp_get_post_terms($post->ID, 'gateley_plc_departments', array("fields" => "names"));
				$gateley_plc_us_location = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));

?>
                <tr><td><?php echo the_title(); ?></td><td><?php echo $gateley_plc_roles[0];?></td><td><?php echo $gateley_plc_us_location[0];?></td></tr>
                <?php
			 endwhile;

		} /*else {
			echo "<td class='' colspan='3'>Currently no roles</td>";

		}
*/

		}
		?>  
        </table>  
    <?php }}?>
    </div>
    <div role="content-inner tabpanel" class="tab-pane" id="location"> 
    
     <?php  $tax       = 'gateley_plc_areas';
        $tax_terms = get_terms($tax, array(
            'order' => 'DESC'
        ));
        if ($tax_terms) {
                    foreach ($tax_terms as $tax_term) {
                    
                echo    "<h3>".$tax_term->name."</h3>"; ?>
    
    <table class="table table-condensed">
    <?php  $locations = get_terms('gateley_plc_us_location', array(
        'hide_empty' => true
    ));
	?>
    <tr>
    <td><strong>Role</strong></td>
    <td><strong>Team</strong></td>
    <td><strong>Location</strong></td>
    </tr>
    <?php
	    foreach ($locations as  $location) {
			// WP_Query arguments
$args = array (
	'post_type'              => array( 'careers' ),
	'tax_query'          => array(
                'relation' => 'AND',
				array(
                    'taxonomy' => 'gateley_plc_us_location',
                    'field' => 'slug',
                    'terms' =>  $location->slug
                )
				,
				array(
                    'taxonomy' => 'gateley_plc_areas',
                    'field' => 'slug',
                    'terms' => $tax_term->slug
                )
		)
);
// The Query
$query = new WP_Query( $args );

        if ($query ->have_posts()) {
echo "<tr>";
echo "<td class='active' colspan='3'>". $location->name."</td>";








echo "</tr>";


            while ($query ->have_posts()):
                $query ->the_post();
				
				$gateley_plc_roles = wp_get_post_terms($post->ID, 'gateley_plc_departments', array("fields" => "names"));
				$gateley_plc_us_location = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));

?>
                <tr><td><?php echo the_title(); ?></td><td><?php echo $gateley_plc_roles[0];?></td><td><?php echo $gateley_plc_us_location[0];?></td></tr>
                <?php
			 endwhile;

		} 

		}
		?>  
        </table> 
        <?php } }?> </div>
  </div>
    </div>
  <div class="col-no-pad sidebar wpb_column vc_column_container vc_col-sm-4">
  <?php wp_reset_query(); echo the_content(); ?>

  </div>
</div>
    
    </main>
     <!-- #main -->
</div>
<?php
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	
$GLOBALS['script'] .="$(document).ready(function() {     $('.ajax-popup-link').magnificPopup({
  type: 'ajax'
});
;});";?>
<!-- #primary -->
<?php
get_footer();
?>