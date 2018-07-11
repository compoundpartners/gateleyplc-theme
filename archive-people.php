<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gateley-plc
 */

get_header(); ?>

	<div id="primary" class="content-area container">
		<main id="main" class="site-main" >

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
			
                    //for a given post type, return all
$post_type = 'people';
$tax = 'glossary';
$tax_terms = get_terms($tax);
if ($tax_terms) {
	echo '<ul class="nav nav-tabs" role="tablist">';
	$counting = 0;
	foreach ($tax_terms  as $tax_term) {
		$glossary2 = $_GET['glossary'];
		
	  		if (!empty($glossary2)){if ($glossary2 == $tax_term->slug) {$class = 'active';} else {$class = '';}}elseif ($counting == '0') {$class = 'active';} else {$class = '';}
			
  echo ' <li role="presentation" class="'.$class.'">';
	echo '<a href="'.home_url().'/people/?glossary='.$tax_term->slug.'" aria-controls="'.$tax_term->slug.'" role="tab" >'. strtoupper($tax_term->name).' </a>'; //data-toggle="tab"
	echo '</li>';
  $counting++;
  
  
  }
}

?>

			</header><!-- .page-header -->

<?php

echo "<div class='tab-content'>";
$counting2 = 0;
  foreach ($tax_terms  as $tax_term) {
	  $glossary = $_GET['glossary'];
	  
$glossary = (get_query_var('glossary' )) ? get_query_var('glossary') : 1;       
       
	  		if (!empty($glossary))		{if ($glossary == $tax_term->slug) {$class = 'active';} else {$class = '';}
			}elseif ($counting2 == '0') {$class = 'active';} else {$class = '';}
			
				  echo '<div role="tabpanel" class="tab-pane '.$class.'" id="'.$tax_term->slug.'">';
 echo "<hr>";
    $args=array(
      'post_type' => $post_type,
	 '$query_vars' => $glossary,
      "$tax" => $tax_term->slug,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      while ($my_query->have_posts()) : $my_query->the_post(); 
      
      			get_template_part( 'assets/template-parts/content', 'search-people');


      endwhile;
	 
    }
    wp_reset_query();
    	  echo "</div>";
$counting2++;
  }

echo "</div>"; 
?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>