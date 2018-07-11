<?php
 $output .= '   <div class="vc_row wpb_row vc_row-fluid">';
$output .= '<div class="wpb_column vc_column_container vc_col-md-3">
                         <div class="wpb_single_image wpb_content_element vc_align_left">';
					if (has_post_thumbnail($post->ID, 'medium')) { 

                        $output .=  get_the_post_thumbnail(get_the_ID(), 'medium');
					                  } else {
					$output .="<img class='media-object' src='".home_url()."/wp-content/plugins/js_composer/assets/vc/no_image.png' >";
   
								   }

                         $output .= '</div>
                    </div>';
                   $output .='<div class="wpb_column vc_column_container vc_col-md-3">';
                       
				   $output .='<h3>'.get_the_title().'</h3>';
                         $output .= '<br>';
                         $output .= '<ul class="contact-list">';
                             
						  $output .= ' <li>
                                   <strong>Address.</strong>';
                                 $output .= get_post_meta(get_the_ID(), '_personaddress', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddressstreet', true))) $output .=get_post_meta(get_the_ID(), '_personaddressstreet', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddresscity', true))) $output .= get_post_meta(get_the_ID(), '_personaddresscity', true).'<br>
';
if(!empty(get_post_meta(get_the_ID(), '_personaddressstate', true))) $output .= get_post_meta(get_the_ID(), '_personaddressstate', true).'<br>
';
if(!empty(get_post_meta(get_the_ID(), '_personaddresspc', true))) $output .= get_post_meta(get_the_ID(), '_personaddresspc', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddresscountry', true))) $output .=  get_post_meta(get_the_ID(), '_personaddresscountry', true);
                               $output .= '</li>';
						 
						 
						 
                              if(get_post_meta($post->ID, '_personEmail', true)) { 
						
                              $output .= ' <li>
                                  <a href="mailto:'. get_post_meta($post->ID, '_personEmail', true).'"> <strong>Email.</strong></a>';
                                 $output .= '  '.get_the_title().'';
                               $output .= '</li>';
                              }
                               if( get_post_meta($post->ID, '_personNumber', true)) { 
                             $output .= '<li><strong>Telephone. </strong>';
                                 $output .= get_post_meta($post->ID, '_personNumber', true).'</li>';
                               } 
                              if( get_post_meta($post->ID, '_personFax', true)) {
                               $output .= '<li><strong>Fax. </strong>';
                                   $output .=  get_post_meta($post->ID, '_personFax', true);
                              $output .= ' </li>';
                              } if( get_post_meta($post->ID, '_personMobile', true)) { 
                               $output .= '<li><strong>Mobile. </strong>';
                                $output .=  get_post_meta($post->ID, '_personMobile', true); 
                             $output .= '</li>';
                             } 
                       $output .= ' </ul>';
                         
                         
                    $output .= ' </div>';
              
				 $output .=' <div class="wpb_column vc_column_container vc_col-md-3">';
                   $output .= '<a href="'.home_url().'/vcard?vcard=true&id='.get_the_ID().'" class="btn btn-default btn-block"> <em class="icon icon-address-book"></em> Download vCard</a>';
				$output .= '<a href="'.get_the_permalink().'" class="btn btn-primary btn-block"><em class="icon icon-map"></em> View Map</a>';

					$output .= '<p class="mt10">Contact Us</p>';
					$output .= '<a href="'.get_the_permalink().'/#popup" class="btn btn-primary btn-block"><em class="icon icon-mail"></em> '.get_the_title().' Contact Form</a><br>';

	$output .= '<a href="'.get_the_permalink().'" class="btn btn-purple btn-block"><em class="icon icon-angle-right"></em> Read More </a>'; 				 $output .= '</div>';
                $output .='  </div>';


return $output;