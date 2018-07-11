<?php
/**
 * Template Name: Job Roles
 *
 * @package WordPress
 * @package gateley-plc 
 */

get_header();
?>

<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-image-cropped' );
$url = $thumb['0'];
?>
 <header class="page-header vertical-height-no-overlay <?php if(!empty($url)) { echo 'has-post-thumbnail'; }?> mb30">          
 <div class="cover <?php if(empty($url)) { echo 'no-feature'; }?>">
               <div class="container">
                    <h1 class="entry-title">            <?php if ($themeswithcer == 'blog') { echo get_bloginfo('name'); }  else { echo the_title(); }?></h1>
                    <?php echo the_breadcrumb(); ?>
               </div>
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
<div class="vc_row wpb_row vc_row-fluid row-no-pad mb30 equalheights">
  <div class="content-inner pb0 mb0 wpb_column vc_column_container vc_col-sm-8">
  <?php echo the_content(); ?>
  <?php echo get_post_meta(get_the_ID(), '_Overview', true);?>
  
  <div class="careers-wrapper">
<?php
$post_type = 'careers';
$tax       = 'glossary';
$tax_terms = get_terms($tax, array(
    'hide_empty' => false
));
if ($tax_terms) {
    echo '<nav class="navbar vc_row mb20">
     <div class="navbar-header"> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-navigation" aria-expanded="false">
      <em class="icon icon-search"><span class="sr-only">Search</span></em> 
      <span class="sep">|</span>
      Search
      </button>
    
    
  </div>
    ';
    
    echo ' <div class="collapse navbar-collapse" id="search-navigation">';
    
    echo '<form method="get" id="searchform" class="searchform careers-searchform form-inline" action="' . get_the_permalink() . '" >
     <div class="form-group">';
 
    $i = 0;
    global $post;
    $roles = get_terms('gateley_plc_roles', array(
        'hide_empty' => false
    ));
    echo "<select name='role' class='form-control colour-select'>";
    echo '<option value="" >
         Role</option>';
    
    foreach ($roles as $role) {
        if (get_query_var('role', 1) == $role->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('rol');
        echo '
          <option value="' . $role->slug . '" ' . $selected . '>
          ' . $role->name . '</option>';
        
        $i++;
    }
    echo "</select>";
    

  
    $i = 0;
    global $post;
    $departments = get_terms('gateley_plc_departments', array(
        'hide_empty' => true
    ));
    echo "<select name='department' class='form-control colour-select'>";
    echo '<option value="" >
         Department</option>';
    
    foreach ($departments as $department) {
        
        if (get_query_var('department', 1) == $department->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('department');
        
        echo '
          <option value="' . $department->slug . '" ' . $selected . '>
          ' . $department->name . '</option>';
        
        $i++;
    }
    echo "</select>";
    $i = 0;
    global $post;
    $locations = get_terms('gateley_plc_us_location', array(
        'hide_empty' => false
    ));
    echo "<select name='officeselected' class='form-control colour-select'>";
    echo '<option value="" >
         Location</option>';
    
    foreach ($locations as $locs) {
        if (get_query_var('officeselected', 1) == $locs->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('officeselected', 1);
        echo '
          <option value="' . $locs->slug . '" ' . $selected . '>
          ' . $locs->name . '</option>';
        
        $i++;
    }
    echo "</select>";
	 $i = 0;
    global $post;
    $areas = get_terms('gateley_plc_areas', array(
        'hide_empty' => false
    ));
    echo "<select name='area' class='form-control colour-select'>";
    echo '<option value="" >
         Area</option>';
    
    foreach ($areas as $ar) {
        if (get_query_var('area', 1) == $ar->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('area', 1);
        echo '
          <option value="' . $ar->slug . '" ' . $selected . '>
          ' . $ar->name . '</option>';
        
        $i++;
    }
    echo "</select>";
    echo "
    </div>";
    
    //echo $_POST['SectorGroup'];
    
    
    echo ' <button type="submit" class="btn 
    btn-link"><em class="icon-search"><span class="sr-only">Search</span></em> <span class="sr-only visible-xs">Search</span></button>
    </form></div>';
    if (get_query_var('phrase') !== '' || get_query_var('role') !== '' ||  get_query_var('department') !== '' || get_query_var('officeselected') !== '' || get_query_var('area') !== '') {
        
        echo '<p class="navbar-text search-text mt20 sr-only">';
        echo "Search Filters: ";
        echo "</p>";
     
        echo '<p class="navbar-text search-text mt20">';
        
        echo "<strong> Role.</strong> ";
        if (get_query_var('role') !== '') {
            $rolesname = str_replace('-', ' ', get_query_var('role', 1));
            echo ucfirst($rolesname);
        } else {
            echo "Any";
        }
        echo "</p>";
     
	   echo '<p class="navbar-text search-text mt20">';
        echo "<strong>Department.</strong> ";
        if (get_query_var('department') !== '') {
		   $departmenttitle = get_query_var('department', 1);
		   $departmenttitle = str_replace('-', ' ',  $departmenttitle);
            echo ucfirst( $departmenttitle );
        } else {
            echo "Any";
        }
        echo "</p>";
        echo '<p class="navbar-text search-text mt20">';
        echo "<strong>Location.</strong> ";
        if (get_query_var('officeselected') !== '') {
            echo ucfirst(get_query_var('officeselected', 1));
        } else {
            echo "Any";
        }
        echo "</p>";
		
		   echo '<p class="navbar-text search-text mt20">';
        echo "<strong>Area.</strong> ";
        if (get_query_var('area') !== '') {
            echo ucfirst(get_query_var('area', 1));
        } else {
            echo "Any";
        }
        echo "</p>";
        
        echo '<a href="' . get_the_permalink() . '" class="btn btn-default btn-sm mt15"> Reset <em class="icon icon-x"><span class="sr-only">Close</span></em></a>';
        
    } 
}
echo "</nav>";
?>
 <?php
while (have_posts()):
    the_post();
    
    
	    
	        $hbjorplc = get_terms('gateley_plc_or_hbj_gateley', array(
        'hide_empty' => false
    ));
    
	    
	  $whichsite = get_option('sitesplithbjgateley');
	    $currentsite = get_current_blog_id();
		if ($whichsite ==  $currentsite) {
			$termargs['order'] = 'DESC';
			$termargs['orderby'] = 'slug';
		} else {
			$termargs['order'] = 'ASC';
			$termargs['orderby'] = 'slug';

		}
					$termargs['hide_empty'] = false;

	     $hbjorplc = get_terms('gateley_plc_or_hbj_gateley', $termargs);
   
	   $paged                   = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query['post_type']      = 'careers';
        //$query['s']              = get_query_var('phrase');
        $query['posts_per_page'] = -1;
        $query['paged']          = $paged;
	    $query['orderby']          = 'title';
	    $query['order']          = 'ASC';
  		
        if ( get_query_var('department') !== '' || get_query_var('officeselected') !== '' || get_query_var('role') !== '' || get_query_var('area') !== '') {
           
            if (get_query_var('role') !== '') {
                $therole = array(
                    'taxonomy' => 'gateley_plc_roles',
                    'field' => 'slug',
                    'terms' => get_query_var('role')
                );
            } else {
                $therole = '';
            }
            
            if (get_query_var('department') !== '') {
                $thedepartment = array(
                    'taxonomy' => 'gateley_plc_departments',
                    'field' => 'slug',
                    'terms' => get_query_var('department')
                );
            } else {
                $thedepartment = '';
            }
            
            if (get_query_var('officeselected') !== '') {
                $theoffice = array(
                    'taxonomy' => 'gateley_plc_us_location',
                    'field' => 'slug',
                    'terms' => get_query_var('officeselected')
                );
            } else {
                $theoffice = '';
            }
            
			 if (get_query_var('area') !== '') {
                $thearea = array(
                    'taxonomy' => 'gateley_plc_areas',
                    'field' => 'slug',
                    'terms' => get_query_var('area')
                );
            } else {
                $thearea= '';
            }
            
		  
		 
            
            $query['tax_query'] = array(
                'relation' => 'AND',
                $thedepartment,
                $theoffice,
                $therole,
				$thearea
            );
        } else {
		      
	   }
	  
        $my_query  = new WP_Query($query);
        $currentid = get_the_ID();
        
        if ($my_query->have_posts()) {
            echo "<div class='careers-search-block-" . $currentid . " careers-search-block row'>";
            while ($my_query->have_posts()):
                $my_query->the_post();
                
                get_template_part('assets/template-parts/content', 'search-careers');
            endwhile;
                 
			               echo "</div>";
            // pager
            
    echo next_posts_link('Older &raquo;');
        }
        wp_reset_query();  
   
  ?>
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;
?>
    <?php
endwhile; // End of the loop. 
?></div>
    </div>
  <div class="col-no-pad sidebar wpb_column vc_column_container vc_col-sm-4">
          <?php dynamic_sidebar( 'Vacancies Sidebar' ); ?>

  </div>
</div>
    
    </main>
     <!-- #main -->
</div>
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
<?php
get_footer();
?>