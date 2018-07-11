<?php $hbjorgateley = wp_get_post_terms($post->ID, 'gateley_plc_or_hbj_gateley', array("fields" => "names"));  ?>
<?php if($hbjorgateley[0] == 'HBJ Gateley') {
$homelink =  get_site_url(get_option('sitesplithbjgateley'));

} elseif($hbjorgateley[0] == 'Gateley Plc') { 
$homelink = get_site_url(get_option('sitesplitgateley'));
} else {
$homelink = home_url();	
}
if($homelink == home_url()) {
$thetarget= "";	
} else {
	$thetarget= "_blank";	

}

?><div class="vc_row mb0">
     <?php if (has_post_thumbnail($post->ID, 'medium')) { ?>
     <div class="wpb_column vc_column_container vc_col-sm-3">
          <div class="wpb_single_image mb0">
               <?php echo the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
          </div>
     </div>
     <?php } ?>
     <div class="vc_col-md-8">
          <div class="vc_row">
               <div class="wpb_column vc_column_container vc_col-md-6">
                    <h2 class="popup-title">
                         <?php the_title(); ?>
                    </h2>
                    <h5><?php echo get_post_meta($post->ID, '_jobRole', true); ?></h5>
                    <br>
                    <ul class="contact-list">
                         <li>
                              <strong>Location:</strong>
                              <?php
					$terms = wp_get_post_terms($post->ID, 'gateley_plc_us_location', array("fields" => "names"));
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
               <div class="wpb_column vc_column_container vc_col-md-6">
                    <div class="btn-group mb20">
                         <a href="<?php echo home_url()?>/vcard?vcard=true&id=<?php echo get_the_ID(); ?>" class="btn btn-default">
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
 
               </div>
          </div>
          <?php if (!empty(get_post_meta(get_the_ID(), '_Overview', true))) {?>
          <h4>Expertise</h4>
          <?php }?>
          <div class="vc_row">
               <div class="vc_col-md-9">
                    <?php echo get_post_meta(get_the_ID(), '_Overview', true);?>
               </div>
               <div class="vc_col-md-3">
                    <?php 
echo '<a href="'.get_the_permalink().'" class="btn btn-primary">View Full Profile <em class="icon icon-angle-right"></em></a>'; ?>
               </div>
          </div>
     </div>
</div>
