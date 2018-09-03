<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

?>
<?php $hbjorgateley = wp_get_post_terms($post->ID, 'gateley_plc_or_hbj_gateley', array("fields" => "names"));  ?>
<?php if($hbjorgateley[0] == 'HBJ Gateley') {
$homelink =  get_site_url(get_option('sitesplithbjgateley'));
} elseif($hbjorgateley[0] == 'Gateley Plc') {
$homelink = get_site_url(get_option('sitesplitgateley'));
} else {
$homelink = home_url();
} if($homelink == home_url()) {
$thetarget= "";
} else {
	$thetarget= "_blank";
}?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <?php get_template_part( 'assets/template-parts/header/single', 'people-header' );  ?>
     <!-- .entry-header -->

     <div class="entry-content container">
          <div class="content-inner        <?php if(get_option('hidenpb') !== '1') {
 ?>mb0<?php } ?>">
               <div class="vc_row mb0 wpb_row vc_row-fluid">
                    <?php if (has_post_thumbnail($post->ID, 'medium')) { ?>
                    <div class="wpb_column vc_column_container vc_col-sm-3">
                         <div class="wpb_single_image wpb_content_element vc_align_left">
                              <?php echo the_post_thumbnail(); ?>
                         </div>
                    </div>
                    <?php } ?>
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                         <h2>
                              <?php the_title(); ?>
                         </h2>
                         <h5><?php echo get_post_meta($post->ID, '_jobRole', true); ?></h5>
                         <br>
                         <ul class="contact-list">
                              <?php $terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names")); if(!empty($terms)) { ?>
                              <li>
                                   <strong>Location:</strong>
                                   <?php
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	 $looping = 1;
	 $countingterms = count($terms);
     foreach ( $terms as $term ) {
       echo $term;

	  if( $countingterms  > 1) { echo ', '; }
	  $looping++;

     }
 }
				    ?>
                              </li>
                              <?php } ?>
                              <?php if(get_post_meta($post->ID, '_personEmail', true)) { ?>
                              <li>
                                   <strong>Email:</strong>
                                   <a href="mailto:<?php echo get_post_meta($post->ID, '_personEmail', true); ?>"><?php echo the_title();?></a>
                              </li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personNumber', true)) { ?>
                              <li><strong>Direct Telephone:</strong>
                                   <?php echo get_post_meta($post->ID, '_personNumber', true); ?></li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personFax', true)) { ?>
                              <li><strong>Direct Fax:</strong>
                                   <?php echo get_post_meta($post->ID, '_personFax', true); ?>
                              </li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personMobile', true)) { ?>
                              <li><strong>Mobile:</strong>
                                   <?php echo get_post_meta($post->ID, '_personMobile', true); ?>
                              </li>
                              <?php } ?>
                         </ul>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-5">
                         <div class="btn-group mb20">
                              <a href="<?php echo $homelink;?>/vcard?vcard=true&id=<?php echo get_the_ID(); ?>" class="btn btn-default">
                              <em class="icon icon-address-book"></em> Download vCard</a>
                              <?php  if (!empty(get_post_meta($post->ID, '_personLinkedin', true))) {
                    $linkedin = get_post_meta($post->ID, '_personLinkedin', true);
                    } else {
                    $linkedin = get_theme_mod("gateley_plc_social_media_linkedin");
                    }?>
                              <a href="<?php echo $linkedin; ?>" class="btn btn-default" target="_blank">
                              <em class="icon icon-social-linkedin"></em>
                              <span class="sr-only">LinkedIn</span></a>
                              <?php  if (!empty(get_post_meta($post->ID, '_personTwitter', true))) {
                    $twitter = get_post_meta($post->ID, '_personTwitter', true);
                    } else {
                    $twitter = get_theme_mod("gateley_plc_social_media_twitter");
                    }?>
                              <a href="<?php echo   $twitter; ?>" class="btn btn-default" target="_blank">
                              <em class="icon icon-social-twitter"></em>
                              <span class="sr-only">Twitter</span></a>
                              <?php  $blogurl = get_post_meta($post->ID, '_personBlog', true);
					if (!filter_var($blogurl, FILTER_VALIDATE_URL) === false) {                    ?>
                              <a href="<?php echo  $blogurl;?>" class="btn btn-default" target="_blank">
                              <em class="icon icon-rss"></em>
                              <span class="sr-only">Blog</span></a>
                              </a>
                              <?php }?>
                         </div>
                         <?php
					$serviceterms = $term_list = wp_get_post_terms($post->ID, 'gateley_plc_service', array("fields" => "all"));;
 if ( ! empty( $serviceterms ) && ! is_wp_error( $serviceterms ) ){
	 $looping = 1;
	 echo '<h5>Related Services</h5>';
	 echo '<ul class="list-square mb20">';
	 $countingterms = count($terms);
     foreach ( $serviceterms as $sterm ) {

		$thepage = get_page_by_title( $sterm->name, ARRAY_A, 'services' );
		if(!empty($thepage)) {
		 echo '<li><a href="'.$homelink.'/services/'.$thepage['post_name'].'" target="'.$thetarget.'">'.$thepage['post_title']."</a></li>";
		} else {
       echo '<li><a href="'.$homelink.'/services/'.$sterm->slug.'" target="'.$thetarget.'">'.$sterm->name."</a></li>";
		}
	  if(is_user_logged_in ()) {
	 //echo "<!-- ".var_dump(get_page_by_title( $sterm->name, ARRAY_A, 'services' ))." -->";
	  }
	  $looping++;

     }
	echo '</ul>';

 }?>
                         <?php
					$sectorterms = wp_get_post_terms($post->ID, 'gateley_plc_sector', array("fields" => "all"));;
 if ( ! empty( $sectorterms ) && ! is_wp_error( $sectorterms ) ){
	 //if(!empty($serviceterms )) {echo "<hr />";}
	 $looping = 1;
	 echo '<h5>Related Sectors</h5>';
	 echo '<ul class="list-square">';
	 $countingterms = count($sectorterms);
     foreach ( $sectorterms as $sectterm ) {
		$thepage = get_page_by_title( $sectterm->name, ARRAY_A, 'services' );
		if(!empty($thepage)) {
		 echo '<li><a href="'.$homelink.'/sectors/'.$thepage['post_name'].'" target="'.$thetarget.'">'.$thepage['post_title']."</a></li>";
		} else {
       	echo '<li><a href="'.$homelink.'/sectors/'.$sectterm->slug.'" target="'.$thetarget.'">'.$sectterm->name."</a></li>";
		}
	  $looping++;

     }
	echo '</ul>';

 }?>
                    </div>
               </div>
               <?php echo the_content(); ?>
               <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateley-plc' ),
				'after'  => '</div>',
			) );
		?>
          </div>
          <?php if(get_option('hidenpb') !== 1) {
 $columns = '';

 if($columns == '1') {
	$wellclass = 'vc_col-sm-12';
 } elseif($columns == '2') {
	$wellclass = 'vc_col-sm-6';
 } else {
	$wellclass = 'vc_col-sm-4';
 }

 ;?>

 <!--
          <div class="well extra">
          <?php $pagetitle = get_the_title(); ?>
               <div class="vc_row mb0 wpb_row vc_row-fluid">
                                        <?php   $args = array(
				  'post_type' => 'post',
				  'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'gateley_plc_people',
			'field' => 'name',

			'terms'    => get_the_title(),
		),
	),
);
$slug = the_slug();
query_posts($args);
$count=0;
if(have_posts()) {  query_posts($args); ?>

                    <div class="wpb_column vc_column_container <?php echo $wellclass; ?> breifings">
                         <h5>
                              <?php echo $pagetitle; ?>'s News Items</h5>
<?php
$output;
while (have_posts()) : the_post();
global $post;
echo '<div class="media">';
echo '<div class="media-left">';

echo '<a href="'.get_the_permalink().'">';
echo"<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>';
 echo "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';
 echo '</a>';
  echo '</div>';

  echo '<div class="media-body">';
  echo '<a href="'.get_the_permalink().'">';

  echo '<strong class="media-heading">'.get_the_title().'</strong><br>
';
   echo '</a>';
if($showcontent == 'yes') {
		//echo '<span class="hidden-sm">';
	$content = strip_tags(get_post_meta($post->ID, '_Overview', true));
echo truncate($content, 80);
	//echo '</span>';
}
  echo ' <a href="'.get_the_permalink().'" class="btn-link">Read More</a>';
  echo '</div>';
  echo '</div>';
  endwhile;
?>

 <?php
//wp_reset_query();
$columns = $columns + 1;
?> </div><?php
}
$args = array(
				  'post_type' => 'publications',
				  'posts_per_page' => 3,
	'tax_query' => array(
		array(
			'taxonomy' => 'gateley_plc_people',
			'field' => 'name',

			'terms'    => $pagetitle,
		),
	),
);
$slug = the_slug();
query_posts($args);
$count=0;
if(have_posts()) {  query_posts($args);
$output;
?>
                    <div class="wpb_column vc_column_container <?php echo $wellclass; ?> breifings">
                         <h5>
                              <?php echo $pagetitle; ?>'s Briefings</h5>
<?php
global $post;
while (have_posts()) : the_post();

echo '<div class="media">';
echo '<div class="media-left">';
$attachment = get_post_meta(get_the_ID(), '_publication', true);
echo '<a href="'.wp_get_attachment_url( $attachment ).'">';
echo"<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>';
 echo "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';
 echo '</a>';
  echo '</div>';

  echo '<div class="media-body">';
  echo '<a href="'.wp_get_attachment_url( $attachment ).'">';

  echo '<strong class="media-heading">'.get_the_title().'</strong><br>
';
   echo '</a>';
if($showcontent == 'yes') {
		//echo '<span class="hidden-sm">';
	$content = strip_tags(get_post_meta($post->ID, '_Overview', true));
echo truncate($content, 80);
	//echo '</span>';
}
  echo ' <a href="'.wp_get_attachment_url( $attachment ).'" class="btn-link">Read More</a>';
  echo '</div>';
  echo '</div>';

endwhile;
?>                  </div>
                    <?php  wp_reset_query();
					$columns = $columns + 1;
}
?>                     <?php
				$currentblog = get_current_blog_id();
				   $blog_url = str_replace('http://', '', $blogurl);
											  $blog_url = str_replace('/', '',  $blog_url);
											  $blog_id = get_blog_id_from_url($blog_url);  }

				$theposts = array();
          					  switch_to_blog($blog_id);
							  global $option;
							  //if(get_option('themetype') == 'blog') {
							   $args = array(
				  'post_type' => 'post',
				  'posts_per_page' => 3,
	/*'tax_query' => array(
		array(
			'taxonomy' => 'gateley_plc_people',
			'field' => 'name',

			'terms'    => get_the_title(),
		),
	),*/
);
$slug = the_slug();
query_posts($args);
$count=0;
if(have_posts()) {
?>
                    <div class="wpb_column vc_column_container <?php echo $wellclass; ?> breifings">
                         <h5>
                              <?php echo $pagetitle; ?>'s Blog Articles</h5>

    <?php
$output;
while (have_posts()) : the_post();


echo '<div class="media">';
echo '<div class="media-left">';

echo '<a href="'.get_the_permalink().'">';
echo"<div class='date-block-default media-object'><span class='day'>".date('d', strtotime(get_the_date())).'</span>';
 echo "<span class='month'>".date('M', strtotime(get_the_date())).'</span></div>';
 echo '</a>';
  echo '</div>';

  echo '<div class="media-body">';
  echo '<a href="'.get_the_permalink().'">';

  echo '<strong class="media-heading">'.get_the_title().'</strong><br>
';
   echo '</a>';
if($showcontent == 'yes') {
		//echo '<span class="hidden-sm">';

	$content = strip_tags(get_post_meta($post->ID, '_Overview', true));
echo truncate($content, 80);
	//echo '</span>';

}
  echo ' <a href="'.get_the_permalink().'" class="btn-link">Read More</a>';




  echo '</div>';
  echo '</div>';

$count++;
endwhile;
?>
                    </div>
                    <?php $columns = $columns + 1;
 }
							//  }



		switch_to_blog($currentblog);
		wp_reset_query();
				?>
               </div>
          </div>

					 -->
					&nbsp;


     </div>


     <!-- .entry-content -->

     <footer class="entry-footer container">
          <?php gateley_plc_entry_footer(); ?>
     </footer>
     <!-- .entry-footer -->
</article>
<!-- #post-## -->
