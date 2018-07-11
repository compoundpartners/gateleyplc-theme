<div class="vc_row row-no-pad equalheights">
 <main id="main" class="site-main vc_col-md-8 col-no-pad" >
 <div class="content-inner">
          <?php while ( have_posts() ) : the_post(); ?>
   <?php


					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
		if(is_front_page() || is_archive()) {			 
           get_template_part( '../assets/template-parts/content', 'overview-posts');
		} else {
					echo "<h2>".get_the_title()."</h2><hr />";	

		echo the_content();	
		}
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
                    <hr />
          <?php endwhile; // End of the loop. 
				echo page_pagination(); ?>
          
         </div>
     </main>
     <!-- #main -->
     <div class="vc_col-md-4 col-no-pad">
     <div class="sidebar sidebar-grey">
          <?php get_sidebar(); ?>
       </div>   
     </div>
     </div>
     
     