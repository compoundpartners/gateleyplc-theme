
        <div class="vc_row wpb_row vc_row-fluid">
               <?php if (has_post_thumbnail($post->ID, 'medium')) { ?>
                    <div class="wpb_column vc_column_container vc_col-sm-3">
                         <div class="wpb_single_image wpb_content_element vc_align_left">
                            <?php echo the_post_thumbnail(); ?>
                         </div>
                    </div>
                    <?php } ?>
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                         <h2 class="popup-title"><?php the_title(); ?></h2>
                         <h5><?php echo get_post_meta($post->ID, '_jobRole', true); ?></h5>
                         <br>
                         <ul class="contact-list">
                              <li>
                                   <strong>Location.</strong>
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
                                   <strong>Email.</strong>
                                   <a href="mailto:<?php echo get_post_meta($post->ID, '_personEmail', true); ?>"><?php echo the_title();?></a>
                              </li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personNumber', true)) { ?>
                              <li><strong>Direct Telephone.</strong>
                                   <?php echo get_post_meta($post->ID, '_personNumber', true); ?></li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personFax', true)) { ?>
                              <li><strong>Direct Fax.</strong>
                                   <?php echo get_post_meta($post->ID, '_personFax', true); ?>
                              </li>
                              <?php } ?>
                              <?php if( get_post_meta($post->ID, '_personMobile', true)) { ?>
                              <li><strong>Mobile.</strong>
                                   <?php echo get_post_meta($post->ID, '_personMobile', true); ?>
                              </li>
                              <?php } ?>
                         </ul>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-5">
                    <div class="btn-group mb20">
                    <a href="<?php echo home_url()?>/vcard?vcard=true&id=<?php echo get_the_ID(); ?>" class="btn btn-default"> <em class="icon icon-address-book"></em> Download vCard</a>
                     <a href="#" class="btn btn-default"> <em class="icon icon-social-linkedin"></em> <span class="sr-only">LinkedIn</span></a>
                     <a href="#" class="btn btn-default"> <em class="icon icon-social-twitter"></em> <span class="sr-only">Twitter</span></a>
                     <a href="#" class="btn btn-default"> <em class="icon icon-rss"></em> <span class="sr-only">Blog</span></a>

                    </a>
                    
         
                    </div>
                    Test
                                            <?php
					$serviceterms = $term_list = wp_get_post_terms($post->ID, 'gateley_plc_service', array("fields" => "all"));;
 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
	 $looping = 1;
	 echo '<h5>Related Services</h5>';
	 echo '<ul class="list-square">';
	 $countingterms = count($terms);
     foreach ( $serviceterms as $sterm ) {
       echo '<li><a href="'.home_url().'/'.$sterm->slug.'">'.$sterm->name."</a></li>";
	  $looping++;
        
     }
	echo '</ul>';
echo '<a href="'.get_the_permalink().'" class="btn btn-primary">View Full Profile</a>';
 }?>
                                   </div>
               </div>