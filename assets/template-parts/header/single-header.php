   <?php $themeswithcer = get_option('themetype');

	$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'header-image', false);
$thumb_url = $thumb_url_array[0];
if(!empty($thumb_url)){
$hasthumb = 'has-post-thumbnail';
	} else {
	$hasthumb = '';	
	}
	if('investor' !==  $themeswithcer) {
?>
<?php if(get_post_type() == 'people') { ?>
 <header class="page-header">
     <div class="cover no-feature vertical-height">
          <div class="container">
               <h1 class="entry-title">Our People</h1>
               <?php echo the_breadcrumb(); ?>
          </div>
         </div> 
     </header>
     
     <?php } else { ?>
     <header class="page-header vertical-height page-header-<?php echo get_the_ID(); ?> <?php echo $hasthumb; ?>">
     <div class="cover">
          <div class="container">
               <h1 class="page-title">
                    <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?>
               </h1>
               <?php echo the_breadcrumb(); ?>
          </div>
     </div>
</header>
<?php } ?>
<?php } else {  ?>
<header class="investor-page-header vertical-height investor-page-header-<?php echo get_the_ID(); ?> <?php echo $hasthumb; ?>">
     <div class="cover">
          <div class="container">
          <div class="page-title">
               <h1 >
			<?php if (get_option('disclaimer') == '1') {
	 if($_COOKIE['first_disclaimer'] !== '1' && $_COOKIE['second_disclaimer'] !== '1') { ?>
       Disclaimer <small>- Step 1 </small> 
               <?php } elseif($_COOKIE['second_disclaimer'] !== '1') { ?>
       Disclaimer <small>- Step 2 </small>   
               <?php } else {
			echo the_title();
			}?>
			<?php } else {
			echo the_title();
			}?>
               
               </h1>
            <?php echo the_breadcrumb(); ?>
            </div>
          </div>
     </div>
</header>
<?php } 
?>

