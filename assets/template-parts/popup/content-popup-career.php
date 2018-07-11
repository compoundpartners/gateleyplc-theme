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
     <div class="wpb_column vc_column_container vc_col-sm-3">
          <div class="wpb_single_image mb0">
<?php

// load all 'category' terms for the post
$terms = get_the_terms($post->ID, 'gateley_plc_us_location');
// we will use the first term to load ACF data from
if( !empty($terms) ) {
	
	$term = array_pop($terms);

	$image_id = get_field('taxonomy_image', $term );

	// do something with $custom_field
}
?><?php echo wp_get_attachment_image( $image_id, 'large', "", array('class'=> 'img-responsive') ); ?>          </div>
     </div>
     <div class="vc_col-md-8">
         
                    <h2>
                         <?php the_title(); ?>
                    </h2>
                    <h5><?php echo get_post_meta($post->ID, '_jobRole', true); ?></h5>
                    <br>
                    <ul class="contact-list two-columns mb20 clear clearfix">
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
                             <li>
                              <strong>Role:</strong>
                              <?php
					$terms = wp_get_post_terms($post->ID, 'gateley_plc_roles', array("fields" => "names"));
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
                         <li>
                         <strong>Closing Date:</strong>
                        <?php echo str_replace('-', ' ', get_field( "closing_date", get_the_ID() )); ?>
                         </li>
                          <li>
                          <?php $dterms = get_the_terms($post->ID, 'gateley_plc_departments'); 
                          if( !empty($dterms) ) {
	
	$term = array_pop($dterms);

	$departmentlink = get_field('department_link', $term );
    
						  }?>
    
                              <strong>Department:</strong> <a href="<?php echo get_the_permalink($departmentlink[0]); ?>">
                              <?php
					$terms = wp_get_post_terms($post->ID, 'gateley_plc_departments', array("fields" => "names"));
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	 $looping = 1;
	 $countingterms = count($terms);
     foreach ( $terms as $term ) {
       echo $term;
	  
	  if( $countingterms  > 1) { echo ', '; }
	  $looping++;
        
     }
 }
				    ?></a>
                         </li>
                         
                    </ul>
            
   
          
          <div class="vc_row mt20">
               <div class="vc_col-md-8">
                    <?php echo truncate(get_the_excerpt(),300);?>
               </div>
               <div class="vc_col-md-4">
                    <?php 
echo '<a href="'.get_the_permalink().'" class="btn btn-primary btn-block mt20"><em class="icon icon-angle-right"></em> Read More </a>'; ?>

<?php

// load all 'category' terms for the post
$dterms = get_the_terms($post->ID, 'gateley_plc_departments');
// we will use the first term to load ACF data from
if( !empty($dterms) ) {
	
	$term = array_pop($dterms);

	$btnurl = get_field('blog_url', $term );
	$btntitle = get_field('blog_title', $term );
	$departmentlink = get_field('department_link', $term );

	   echo ' <a href="'.$btnurl.'" class="btn btn-default mt5 btn-block">
                         <em class="icon icon-rss"></em>';
						 if (!empty($btntitle)) {
							 echo $btntitle;
						 } else {
						  echo 'Related Blog';
						 }
						  echo '</a>';
						 
						 
	// do something with $custom_field
}
?>


               </div>
          </div>
     </div>
</div>
