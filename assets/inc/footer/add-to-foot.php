<?php function nj_add_script_to_footer() {
	
	if(isset($GLOBALS['script'])) {
		$jsoutput = "";
		$jsoutput .="<script>";
		$jsoutput .= $GLOBALS['script']."\n";
		if (is_front_page() && !empty(get_option("cookie_text")) && $_COOKIE['gateley-cookie'] !== '1') {
		$jsoutput .= "jQuery(document).ready(function() {
			jQuery('body').addClass('cookienotice');
			jQuery('#cookieclose').click(function() {
			jQuery('body').removeClass('cookienotice');
			setCookie('gateley-cookie', 1, 30);
		});	
		});";
		
		}
		$jsoutput .= "</script>";
			}
		echo minify_js($jsoutput	);
                

	$output = '';
	if(isset($GLOBALS['styles'])) {
		$output .= "<style>"."\n";
		$output .= $GLOBALS['styles']."\n";
		$output .= "</style>"."\n";
	}
	echo minify_css($output);
	$current_user = wp_get_current_user();
if (is_front_page() && !empty(get_option("cookie_text")) && $_COOKIE['gateley-cookie'] !== '1') {
	echo '<div class="alert alert-cookie-policy alert-dismissible text-purple" ><form class="container" action="">  <button type="button" class="btn btn-purple btn-cookie" id="cookieclose" data-dismiss="alert" aria-label="Close">I Agree</button>'.get_option("cookie_text").'
	</form></div>';
}

//if (is_front_page() && esc_attr( get_option('showhomepageadvert')  == '1')&& $current_user->display_name == 'DesignReligion' && is_user_logged_in()) {
//if (is_front_page() && esc_attr( get_option('showhomepageadvert')  == '1') )  {



echo "<!-- Show Advert ".get_field('show_slidedown_advert', 'option')." -->";
if (is_front_page() && esc_attr( get_field('show_slidedown_advert', 'option')  == '1') )  {
// check if the repeater field has rows of data
if( have_rows('home_slidedown_advert', 'option') ):
$slidecount =1;
 	// loop through the rows of data
while ( have_rows('home_slidedown_advert', 'option') ) : the_row();
if(get_sub_field('advert_active')) {
	if(get_sub_field('admin_only')) {
		if($current_user->display_name == 'DesignReligion' && is_user_logged_in()) {
			$adminonly;
		} else {
			$adminonly = 'style="display:none;"';
		}
	}
echo '<a class="campaign-advert-slidedown campaign-advert-slidedown-'.$slidecount.'" role="alert"  target="_blank" href="'.get_sub_field('advert_link').'" '.$adminonly.'>';
echo '<div class="container">';
echo '<div class="vc_row">';
if(get_sub_field('icon_image')) {
echo '<div class="vc_col-md-2 vc_col-sm-3 hidden-xs">'.wp_get_attachment_image(get_sub_field('icon_image'), 'medium', false, array('class' => 'img-responsive')).'</div>';
}
if(get_sub_field('icon_image')) {
$pullrightclass="";
} else {
$pullrightclass="pull-right";	

}
$columnclass = get_sub_field('columnclass');
echo '<div class="'.$columnclass.'">'.get_sub_field('advert_content').' </div>';
echo '<div class="vc_col-md-2 vc_col-sm-2 vc_col-xs-2"><span class="advert-btn">'.wp_get_attachment_image(get_sub_field('advert_button'), 'medium').'</span></div>';
echo '<div class="vc_col-md-2 vc_col-sm-2 '.$pullrightclass.'"><span class="hashtag">'.get_sub_field('advert_hashtag').' </span></div>';
//<img src="http://gateleyplc.com/wp-content/uploads/2015/11/rise-of-retail-icon.png" alt="Rise of retail" class="campaign-title-image"/> '.get_option("homepageadvertcontent").'</div><div class="vc_col-md-4"><span class="strapline hidden-xs  hidden-sm">Insight from our experts</span> <span class="btn btn-primary pull-right mt20 hidden-sm"><em class="icon icon-angle-right"></em></span></div><div class="vc_col-md-3"><span class="hashtag">'.get_option("homepageadverthashtag").'</span></div>
echo '</div>';	
echo '</div>';
echo  "</a>";
?>
<style>
.campaign-advert-slidedown.campaign-advert-slidedown-<?php echo $slidecount; ?> {
background-image:url(<?php echo wp_get_attachment_url( get_sub_field('advert_background')); ?>);
background-position:288px 108px;
 background-size: auto 201px;
  background-repeat: none;}

<?php echo the_sub_field('advert_styles'); ?>
</style>
<?php
}
        // display a sub field value
        
$slidecount++;
    endwhile;

else :

    // no rows found

endif;




echo "<script>jQuery(document).ready(function() {
			jQuery('body').addClass('cookienotice');
			jQuery('body').addClass('hadslidedownadvert');

			if(jQuery('.has-hero-slider')) {
$('.has-hero-slider').css({'padding-top' : $('.campaign-advert-slidedown').height()+80});
$('.site-header').attr('style', 'top: '+($('.campaign-advert-slidedown').height()+20)+'px !important');
$('.dropdown-menu').attr('style', 'top: '+($('.campaign-advert-slidedown').height()+80)+'px !important');
}
		});
		$(window).resize(function() {
				if(jQuery('.has-hero-slider')) {
$('.has-hero-slider').css({'padding-top' : $('.campaign-advert-slidedown').height()+80});
$('.site-header').attr('style', 'top: '+($('.campaign-advert-slidedown').height()+20)+'px !important');
$('.dropdown-menu').attr('style', 'top: '+($('.campaign-advert-slidedown').height()+80)+'px !important');
}
		});</script>";
}
}

global $post;
if (get_field('show_popup_box', $post->ID)) {
echo "<a href='#campaign-advert-popup' class='open-popup-link invisible hidden'>Campaign</a>";
echo '<div id="campaign-advert-popup" class="mfp-hide"><div class="container"><a href="'.get_field('campaign_link').'" target="_blank"><img src="'.get_field('campaign_advert').'" alt="Gateley Campaign" class="img-responsive"/></a></div></div>';
echo "<script>jQuery(document).ready(function() {
		$('.open-popup-link').magnificPopup({
		  type:'inline',
		  midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
		});
		$('.open-popup-link').trigger('click');
		});</script>";
}

//}
 add_action('wp_footer', 'nj_add_script_to_footer', 100);