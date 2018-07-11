<?php
/**
 * Template Name: Full Width Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @package gateley-plc 
 */

get_header(); ?>
<?php if (is_user_logged_in()) { ?> 
<?php if(is_front_page()) { ?><!-- FRONT PAGE --> <?php } ?><?php } ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'assets/template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					$themeswithcer = get_option('themetype');
					if($themeswithcer  == 'blog') {
						if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					}
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
