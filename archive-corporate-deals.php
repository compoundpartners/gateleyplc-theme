<?php
/**
 * Template Name: Archive Template (Corporate Deals)
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @package gateley-plc
 */

get_header();

$themeswithcer = get_option('themetype'); ?>

  <header class="page-header vertical-height">
    <div class="container">
      <h1 class="page-title">
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
        ?>
      </h1>
      <?php echo the_breadcrumb(); ?>
    </div>
  </header>

  <div id="primary" class="content-area container">

    <?php $themeswithcer = get_option('themetype');

      switch ($themeswithcer) {
        case "main":
		      // get_template_part( 'assets/template-parts/content/content', 'main-website' );
        	// get_template_part( 'assets/template-parts/content', get_post_format() );
          get_template_part( 'assets/template-parts/content/news', 'main-website' );
          break;

        case "investor":
		      get_template_part( 'assets/template-parts/content/content', 'investor-website' );
          break;

        case "blog":
		      get_template_part( 'assets/template-parts/content/index', 'blog-website' );
          break;

        default:
		      get_template_part( 'assets/template-parts/content/content', 'main-website' );
      }
    ?>

    <?php if (!empty(get_option('blog_disclaimer'))) { ?>
      <div class="well well-bordered mt20">
        <?php echo get_option('blog_disclaimer'); ?>
     </div>
    <?php
    } ?>

</div>

<!-- #primary -->
<div class="feeds-container mt30">
  <div class="container">
    <?php dynamic_sidebar( 'Feeds' ); ?>
  </div>
</div>

<?php get_footer(); ?>
