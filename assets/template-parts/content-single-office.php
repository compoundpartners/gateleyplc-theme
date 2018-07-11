<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */
$themeswithcer = get_option('themetype');
?>
<?php
if (get_option('officepage') !== '' && $themeswithcer == 'main' || get_option('officepage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('officepage')), 'full' );
$url = $thumb['0'];	

} else {$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}

?>
<article id="office-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="page-header vertical-height<?php if(empty($url)) { echo '-no-overlay'; }else { echo ' has-post-thumbnail';}?>">
     
          <div class="cover <?php if(empty($url) || $themeswithcer == 'blog') { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title"> <?php echo the_title(); ?></h1>
                    <?php  echo the_breadcrumb(); ?>
               </div>
          </div>
     </header>    
     <!-- .entry-header -->
     
     <div class="entry-content container mb30">
               <div class="vc_row wpb_row vc_row-fluid equalheights white">
                    <div class="wpb_column vc_column_container vc_col-md-4 sidebar sidebar-grey sidebar-left border-right">
                                   <?php if (has_post_thumbnail($post->ID, 'medium')) { ?>

                         <div class="wpb_single_image wpb_content_element vc_align_left">
                            <?php echo the_post_thumbnail(); ?>
                         </div>
                       
                        <?php } ?>
  <?php
				  echo'<h3>'.get_the_title().'</h3>';
                        echo '<br>';
                        echo '<ul class="contact-list">';
                             
						 echo ' <li>
                                   <strong>Address:</strong><br>
';
                                echo get_post_meta(get_the_ID(), '_personaddress', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddressstreet', true)))echo get_post_meta(get_the_ID(), '_personaddressstreet', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddresscity', true)))echo get_post_meta(get_the_ID(), '_personaddresscity', true).'<br>
';
if(!empty(get_post_meta(get_the_ID(), '_personaddressstate', true)))echo get_post_meta(get_the_ID(), '_personaddressstate', true).'<br>
';
if(!empty(get_post_meta(get_the_ID(), '_personaddresspc', true)))echo get_post_meta(get_the_ID(), '_personaddresspc', true).'<br>';
if(!empty(get_post_meta(get_the_ID(), '_personaddresscountry', true)))echo  get_post_meta(get_the_ID(), '_personaddresscountry', true);
                              echo '</li>';
						 
						 
						 
                              if(get_post_meta($post->ID, '_personEmail', true)) { 
						
                             echo ' <li>
                                   <a href="mailto:'. get_post_meta($post->ID, '_personEmail', true).'"><strong>Email us</strong></a>';
                              echo '</li>';
                              }
                               if( get_post_meta($post->ID, '_personNumber', true)) { 
                            echo '<li><strong>T: </strong>
';
                                echo get_post_meta($post->ID, '_personNumber', true).'</li>';
                               } 
                              if( get_post_meta($post->ID, '_personFax', true)) {
                              echo '<li><strong>F: </strong>
';
                                  echo  get_post_meta($post->ID, '_personFax', true);
                             echo ' </li>';
                              } if( get_post_meta($post->ID, '_personMobile', true)) { 
                              echo '<li><strong>M: </strong>
';
                               echo  get_post_meta($post->ID, '_personMobile', true); 
                            echo '</li>';
                             } 
                      echo ' </ul>';
                        
                         
                            echo'<a href="'.home_url().'/vcard?vcard=true&id='.get_the_ID().'" class="btn btn-default btn-block"> <em class="icon icon-address-book"></em> Download vCard</a>';
					   
					                                 if( get_post_meta($post->ID, '_gmaplink', true)) {



				echo'<a href="'.get_post_meta($post->ID, '_gmaplink', true).'" class="btn btn-primary btn-block" target="_blank"><em class="icon icon-map glyphicon-align-left" ></em>
								  
				   View Map</a>';

											   } else {
												   
												 $addrss = str_replace(" ", '+',get_post_meta(get_the_ID(), '_personaddress', true));  
												 $street = str_replace(" ", '+', get_post_meta(get_the_ID(), '_personaddressstreet', true));  
												 $pc = str_replace(" ", '+', get_post_meta(get_the_ID(), '_personaddresspc', true)); 
					$gloc =	$addrss.$street.$pc;				  
				$gloc = str_replace('++', '+', $gloc);
				echo'<a href="https://www.google.com/maps?q='.$gloc.'" class="btn btn-primary btn-block" target="_blank"><em class="icon icon-map glyphicon-align-left" ></em>
								  
				   View Map</a>';
				   
				   
												 
											   }
											   echo'<p class="mt10">Contact Us</p>';
					echo'<a href="#office-contact-'.get_the_ID().'" class="btn btn-primary btn-block open-popup-link"><em class="icon icon-mail"></em> '.get_the_title().' Contact Form</a><br>';
					

	?>
     
     Switch office
     
     <div class="mb30" >
     <select name="officeswitcher" onchange="document.location.href=this.options[this.selectedIndex].value;" class="form-control colour-select select-block">
     <option class="transparent">Select an office near you </option>
    
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
    </div> 			  <br>
     
     

                    </div>
                  
                    <div class="wpb_column vc_column_container vc_col-md-8 col-no-pad">
                    <div class="content-inner">
                                        
                   <?php  if (!empty(get_post_meta($post->ID, '_insetMap', true))) {
				    echo wp_get_attachment_image( get_post_meta($post->ID, '_insetMap', true), 'large', false, array('class' => 'img-responsive') ); 
			    }?>
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

 }?></div><?php //echo the_content(); ?>
               <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gateley-plc' ),
				'after'  => '</div>',
			) );
		?>
                                   </div>
               </div>
               
     </div>
     <!-- .entry-content -->
     
     <footer class="entry-footer container">
          <?php gateley_plc_entry_footer(); ?>
     </footer>
     <!-- .entry-footer -->
     <?php
echo'<div id="office-contact-'.get_the_ID().'" class="white-popup-block mfp-hide animated small-popup">';
echo do_shortcode(get_post_meta(get_the_ID(), '_contactFormShort', true));
echo '</div>';
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	
$GLOBALS['script'] .=" $(document).ready(function() {
	 
	$('.open-popup-link').magnificPopup({
  type:'inline',
  midClick:true,
});
if(window.location.href.indexOf('#popup') > -1) {
$.magnificPopup.open({
    items: {
        src: '#office-contact-".get_the_ID()."' 
    },
    type: 'inline'
     
});
history.pushState('', document.title, window.location.pathname);
   }
});
";
?>

</article>
<!-- #post-## --><?php
if (isset($GLOBALS['styles'])) {
	$GLOBALS['styles'] = $GLOBALS['styles'];
	 } else {
	$GLOBALS['styles'] = '';	
	}
if (get_option('officepage') !== '' && $themeswithcer == 'main' || get_option('officepage') !== ' ' && $themeswithcer == 'main') {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_option('officepage')), 'full' );
$url = $thumb['0'];	
} else {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$url = $thumb['0'];
}
$GLOBALS['styles'] .= "#office-".get_the_ID(). " .page-header{ background-image:url(".$url.")}";

?>


