<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gateley-plc
 */

global $post; // < -- globalize, just in case
if ($post->type == 'careers') {
$field = get_post_meta($post->ID, '_externalLink', true);
if($field) wp_redirect(clean_url($field), 301);
}
get_header(); ?>



	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>
<?php
if ('post' ==  get_post_type()) {
			get_template_part( 'assets/template-parts/content', 'single' );
			} else {
			get_template_part( 'assets/template-parts/content', 'single-'.get_post_type() );

			}?>

               <?php
//echo(my_get_post_views());
?>




		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
<?php
my_set_post_views(get_the_ID());
?>
