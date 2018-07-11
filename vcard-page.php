<?php
/**
 * Template Name: vCard Page
 *
 * @package WordPress
 * @package gateley-plc 
 */
 include( 'wp-load.php' ); // loads WordPress Environment
if(isset($_GET['vcard'])) {

//header("Content-type: text/x-vcard; charset=utf-8");
// Alternatively: application/octet-stream
// Depending on the desired browser behaviour
// Be sure to test thoroughly cross-browser
$thetitle = str_replace(' ', '-', get_the_title($_GET['id']));
//header("Content-Disposition: attachment; filename=\"".$thetitle.".vcf\";");
header("Content-type: text/x-vcard; charset=utf-8"); 
header('Content-Disposition: attachment; filename= "'.$thetitle.'.vcf"');  
# Output file contents
global $post;
if(get_post_type($_GET['id']) == 'office') {
echo makeVcard(get_the_title($_GET['id']) . " ". get_bloginfo('name'),get_bloginfo('name'), get_post_meta($_GET['id'], '_jobRole', true), get_post_meta($_GET['id'], '_personEmail', true), get_post_meta($_GET['id'], '_personNumber', true), get_post_meta($_GET['id'], '_personFax', true), get_post_meta($_GET['id'], '_personMobile', true), get_post_meta($_GET['id'], '_personaddress', true), get_post_meta($_GET['id'], '_personaddressstreet', true), get_post_meta($_GET['id'], '_personaddressstreet', true), get_post_meta($_GET['id'], '_personaddresscity', true), get_post_meta($_GET['id'], '_personaddressstate', true), get_post_meta($_GET['id'], '_personaddresspc', true), get_post_meta($_GET['id'], '_personaddresscountry', true));exit();
}else {
echo makeVcard(get_the_title($_GET['id']),get_bloginfo('name'), get_post_meta($_GET['id'], '_jobRole', true), get_post_meta($_GET['id'], '_personEmail', true), get_post_meta($_GET['id'], '_personNumber', true), get_post_meta($_GET['id'], '_personFax', true), get_post_meta($_GET['id'], '_personMobile', true), get_post_meta($_GET['id'], '_personaddress', true), get_post_meta($_GET['id'], '_personaddressstreet', true), get_post_meta($_GET['id'], '_personaddressstreet', true), get_post_meta($_GET['id'], '_personaddresscity', true), get_post_meta($_GET['id'], '_personaddressstate', true), get_post_meta($_GET['id'], '_personaddresspc', true), get_post_meta($_GET['id'], '_personaddresscountry', true));exit();
}


exit();
   
   } else {
header('Location: '.home_url());
}




get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'assets/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
