    <header class="page-header vertical-height mb30">
          <div class="container">
               <h1 class="page-title"><?php echo the_title(); ?></h1>
               <?php echo the_breadcrumb(); ?>
          </div>
     </header>
     
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
     </main>
     <!-- #main -->
       </div>