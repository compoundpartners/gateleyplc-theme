<?php
/**
 * Template Name: Careers Overview Page
 *
 */
get_header(); ?>
<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-image-cropped' );
$url = $thumb['0'];
?>

<header class="page-header vertical-height-no-overlay <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?> mb30">
  <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
    <div class="container">
      <h1 class="entry-title">
        <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?>
      </h1>
      <?php echo the_breadcrumb(); ?> </div>
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
<div id="primary" class="content-area container">
  <main id="main" class="site-main">
    <?php $user = wp_get_current_user();
    if(is_user_logged_in () && in_array( 'applicant', (array) $user->roles )) { ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php 
	$firstname = get_the_author_meta( 'firstname', $user->ID );
	$lastname = get_the_author_meta( 'lastname', $user->ID );
	$address = get_the_author_meta( 'address', $user->ID );
	$mobile = get_the_author_meta( 'mobile', $user->ID );
	$email = get_the_author_meta( 'email', $user->ID );

	if($firstname !== '' && $lastname !== '' && $address !== '' && $mobile !== '' && $email !== '') {  
		$applicationdisbaled = '';	
	} else {
		$applicationdisbaled = 'disabled'; 	
	}?>
    <div class="btn-group btn-group-justified mb30" role="group" aria-label="..."> <a href="<?php echo get_the_permalink(get_option('welcomepage')); ?>" class="btn btn-primary">Welcome </a> <a href="<?php echo get_the_permalink(get_option('personalpage')); ?>" class="btn btn-default">Personal Details </a> <a href="<?php echo get_the_permalink(get_option('applicationpage')); ?>" class="btn btn-default <?php echo $applicationdisbaled; ?>">Start Application </a> </div>
    
 <div class="content-inner">
    </div>
    <div class="clearfix mb30">     <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-inverse">Logout</a>
<a href="<?php echo get_the_permalink(get_option('personalpage')); ?>" class="btn btn-primary pull-right">Fill Out Personal Details </a> </div>
    <?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
    <?php endwhile; // End of the loop. ?>
    <?php } else {
				?>
                   <div class="well well-white mb30">  <div class="row"><div class="vc_col-md-10">    <?php  the_content(); ?></div></div>
</div>

    <div class="vc_row wpb_row vc_row-fluid row-no-pad mb30 equalheights">
      <div class="mb0 wpb_column vc_column_container vc_col-sm-6 pb40 white-bg">
       <div class="content-inner mb0">

        <h2>sdfg fghdfgh</h2>
</div>
<?php $vacaniesimg = get_field('vacancies_image', $post->ID);
echo wp_get_attachment_image($vacaniesimg, 'header-image-cropped', false, array('class' => 'img-responsive')); ?>
 <div class="content-inner">

</div>       
      </div>
      <div class="sidebar wpb_column vc_column_container vc_col-sm-6 padded-sidebar">
        <h2>dfghdf dghfgh</h2>
        
      </div>
    </div>
    <?php }?>
  </main>
  <!-- #main --> 
</div>
<!-- #primary -->

<?php get_footer(); ?>
