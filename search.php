<?php
/**
 * Template Name: Search Page
 *
 * @package WordPress
 * @package gateley-plc 
 */
if (get_option('disclaimer') == '1') {
	 if($_COOKIE['first_disclaimer'] !== '1' && $_COOKIE['second_disclaimer'] !== '1') {
		 wp_redirect( home_url() ); exit; 
	 }
	 
} get_header(); ?>

<section id="primary" class="search-page content-area">
     <header class="page-header vertical-height mb30">
          <div class="container">
               <h1 class="page-title">Search</h1>
                              <?php echo the_breadcrumb(); ?>

               <?php  get_search_form(); ?>
               
               <div class="clear mt20 search-terms">
               <?php if(!empty(get_search_query())) { ?>
               <?php printf( esc_html__( 'Search term: %s', 'gateley-plc' ), '<span>' . get_search_query() . '</span>' ); ?>
               <a href="<?php home_url(); ?>/search" class="btn btn-link btn-white">Reset X </a>
               <?php } ?>
               
               <div class="btn-group pull-right filters" role="group" aria-label="...">
                 <button type="button" class="btn btn-link btn-white active" data-toggle="all">All</button>
                  <?php foreach (array('people', 'sectors','services','post', 'publications', 'event', 'page') as $pt) : 
$obj = get_post_type_object( $pt ); $toggle = strtolower($obj->labels->singular_name);  $toggle = str_replace(' ', '-', $toggle); ?>
  <button type="button" class="btn btn-link btn-white" data-toggle="<?php echo $toggle; ?>"><?php 
		if ('post' ==  $pt) { 
		echo "News";
		} else {
echo "".$obj->labels->singular_name.""; 
		}?>
          </button>

  <?php endforeach; ?>
</div>
</div>

          </div>
     </header>
     <!-- .page-header -->
     <main id="main" class="site-main container mb30">
  
    <table class="table table-striped search-table">
<?php
    foreach (array('people', 'sectors','services','post', 'publications', 'event', 'page') as $pt) :
    

$obj = get_post_type_object( $pt ); $toggle = strtolower($obj->labels->singular_name);  $toggle = str_replace(' ', '-', $toggle); ?>
<?php if ( post_type_exists( $pt ) ) { ?>
  <tr class="<?php echo $toggle; ?> all">
          <td class="first"><?php $obj = get_post_type_object( $pt );
		if ('post' ==  $pt) { 
		echo "<h3>News</h3>";
		} else {
echo "<h3>".$obj->labels->singular_name."</h3>"; 
		}?></td>

    <td> 
    
                   <?php if(!empty(get_search_query())) {
				    $split = get_option('thisissite');
					?>
                    <?php
				       $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
 if($toggle == 'our-people') { 
 $thesplit = array(
                    'taxonomy' => 'gateley_plc_or_hbj_gateley',
                    'field' => 'slug',
                    'terms' => $split
                );
				
 } else {
 $thesplit = '';	 
 }
        $search_query = array(
                'post_type'         => $pt,
                's'                 => $s,
                'posts_per_page'    => 12,
                'paged'             => $paged,
			 'order' => 'ASC',
			 'tax_query' => array(
                'relation' => 'AND',
			 $thesplit
            ),		
        );
	    ?>

<?php query_posts($search_query); 

        //if ($search_query->have_posts()) : while ($search_query->have_posts()) : $search_query->the_post();
	   if(have_posts()) :while (have_posts()) : the_post(); 


	   if($pt == get_post_type(get_the_ID())) {
    			if ('post' ==  $pt or 'page'  ==  $pt) {
			get_template_part( 'assets/template-parts/content', 'search' );
			} else {
			get_template_part( 'assets/template-parts/content', 'search-'.  $pt );

			}
	   }
		
     endwhile;
		   if($pt == get_post_type(get_the_ID())) {
	echo "<div class='clearfix'>".page_pagination()."</div>"; 
		   }; else : 
			get_template_part( 'assets/template-parts/content', 'none-search' );
    endif; ?> 
    
    <?php } else { get_template_part( 'assets/template-parts/content', 'none-search' ); } ?></td>
    
    </tr>
    <?php } ?>
    
<?php endforeach; ?></table>




  <?php if ( is_active_sidebar( 'search-page' ) ) { ?><div class="well"><?php dynamic_sidebar( 'search-page' ); ?></div><?php  } ?>
        
     </main>
     <!-- #main -->
</section>
<?php
if (isset($GLOBALS['script'])) {
	$GLOBALS['script'] = $GLOBALS['script'];
	 } else {
	$GLOBALS['script'] = '';	
	}
	
$GLOBALS['script'] .="$(document).ready(function() {     $('.ajax-popup-link').magnificPopup({
  type: 'ajax'
});
;});";?>
<!-- #primary -->
<?php get_footer(); ?>
