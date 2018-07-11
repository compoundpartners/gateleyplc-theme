<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */
get_header();
$themeswithcer = get_option('themetype'); ?>

  <header class="page-header vertical-height">
          <div class="container">
               <h1 class="page-title"><?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?></h1>
               <?php echo the_breadcrumb(); ?>
          </div>
     </header>
     
<div id="primary" class="content-area container">

<?php $themeswithcer = get_option('themetype');
switch ($themeswithcer) {
    case "main":
		get_template_part( 'assets/template-parts/content/news', 'main-website' ); 
        break;
    case "investor":
		get_template_part( 'assets/template-parts/content/index', 'investor-website' ); 
        break;
    case "blog":
		get_template_part( 'assets/template-parts/content/index', 'blog-website' ); 
        break;
    default:
		get_template_part( 'assets/template-parts/content/index', 'main-website' ); 
}

?>



<?php if (!empty(get_option('blog_disclaimer'))) {
	?>
     <div class="well well-bordered mt20">
     <?php echo get_option('blog_disclaimer'); ?>
     </div>
     <?php
} ?>
</div>


     
<!-- #primary -->                
<div class="feeds-container mt30">
<div class="container">
 <?php dynamic_sidebar( 'Feeds' ); ?> </div>
</div>
<?php get_footer(); ?>