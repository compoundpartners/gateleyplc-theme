<?php
/**
 * Template Name: People Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @package gateley-plc 
 */

get_header();
?>

<header class="page-header mb30 vertical-height-no-overlay">
     <div class="container">
          <h1 class="page-title"><?php
echo the_title();
?></h1>
          <?php
echo the_breadcrumb();
?>
<div class="text-white mb10">
<?php echo get_post_meta(get_the_ID(), '_Overview', true);?>
</div>
<?php
$post_type = 'people';
$tax       = 'glossary';
$tax_terms = get_terms($tax, array(
    'hide_empty' => false
));
if ($tax_terms) {
    echo '<nav class="navbar vc_row">
     <div class="navbar-header"> <button type="button" class="navbar-toggle collapsed text-white" data-toggle="collapse" data-target="#search-navigation" aria-expanded="false">
      <em class="icon icon-search"><span class="sr-only">Search</span></em> 
      <span class="sep">|</span>
      Search People
      </button>
    
    
      <button type="button" class="navbar-toggle collapsed text-white" data-toggle="collapse" data-target="#glossary-navigation" aria-expanded="false">
       <em class="icon icon-menu"><span class="sr-only">Menu</span></em>
      <span class="sep">|</span>
       Filter by Initial
      </button> </div>
    ';
    
    echo ' <div class="collapse navbar-collapse" id="search-navigation">';
    
    echo '<form method="get" id="searchform" class="searchform people-searchform form-inline" action="' . get_the_permalink() . '" >
     <div class="form-group"><label class="screen-reader-text" for="phrase">' . __('Search for:') . '</label>
    <input type="text" value="' . ucfirst(get_query_var('phrase')) . '" name="phrase" id="phrase" placeholder="Phrase" class="form-control"/>
    

 
 ';
 
    $i = 0;
    global $post;
    $roles = get_terms('gateley_plc_jobs', array(
        'hide_empty' => false
    ));
    echo "<select name='role' class='form-control'>";
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
    $sectors = get_terms('gateley_plc_sector', array(
        'hide_empty' => false
    ));
    echo "<select name='sector-search' class='form-control'>";
    echo '<option value="" >
         Sectors</option>';
    
    foreach ($sectors as $sector) {
        if (get_query_var('sector-search', 1) == $sector->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('sector-search');
        echo '
          <option value="' . $sector->slug . '" ' . $selected . '>
          ' . $sector->name . '</option>';
        
        $i++;
    }
    echo "</select>";
    $i = 0;
    global $post;
    $services = get_terms('gateley_plc_service', array(
        'hide_empty' => false
    ));
    echo "<select name='service' class='form-control'>";
    echo '<option value="" >
         Services</option>';
    
    foreach ($services as $service) {
        
        if (get_query_var('service', 1) == $service->slug) {
            $selected = "selected";
        } else {
            $selected = "";
        }
        echo get_query_var('service');
        
        echo '
          <option value="' . $service->slug . '" ' . $selected . '>
          ' . $service->name . '</option>';
        
        $i++;
    }
    echo "</select>";
    $i = 0;
    global $post;
    $locations = get_terms('gateley_plc_us_location', array(
        'hide_empty' => false
    ));
    echo "<select name='officeselected' class='form-control'>";
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
    echo "
    </div>";
    
    //echo $_POST['SectorGroup'];
    
    
    echo ' <button type="submit" class="btn 
    btn-link"><em class="icon-search"><span class="sr-only">Search</span></em> <span class="sr-only visible-xs">Search</span></button>
    </form></div>';
    if (get_query_var('phrase') !== '' || get_query_var('role') !== '' || get_query_var('sector-search') !== '' || get_query_var('service') !== '' || get_query_var('officeselected') !== '') {
        
        echo '<p class="navbar-text search-text mt20">';
        echo "Search Filters: ";
        echo "</p>";
        echo '<p class="navbar-text search-text mt20">';
        echo "<strong> Name.</strong> ";
        if (get_query_var('phrase') !== '') {
            echo ucfirst(get_query_var('phrase', 1));
        } else {
            echo "Any";
        }
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
        echo "<strong>Service.</strong> ";
        if (get_query_var('sector-search') !== '') {
            echo ucfirst(get_query_var('sector-search', 1));
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
        
        echo '<a href="' . get_the_permalink() . '" class="btn btn-reset mt15"> Reset <em class="icon icon-x"><span class="sr-only">Close</span></em></a>';
        
    } else {
        
        echo ' <div class="collapse navbar-collapse" id="glossary-navigation">';
        echo '<ul class="nav nav-pills mt20 nav-justified" role="tablist">';
        $counting = 0;
        foreach ($tax_terms as $tax_term) {
            $glossary2 = get_query_var('glossary', 1);
            if ($glossary2 == 1) {
                $glossary2 = 'a';
            }
            if (!empty($glossary2)) {
                if ($glossary2 == $tax_term->slug) {
                    $class = 'active';
                } else {
                    $class = '';
                }
            } elseif ($counting == '0') {
                $class = 'active';
            } else {
                $class = '';
            }
            echo ' <li role="presentation" class="' . $class . '">';
            echo '<a href="' . get_the_permalink() . "glossary/" . $tax_term->slug . '" aria-controls="' . $tax_term->slug . '" role="tab" >' . strtoupper($tax_term->name) . ' </a>'; //data-toggle="tab"
            echo '</li>';
            $counting++;
        }
        
        echo "</ul>";
        echo "</div></nav>";
    }
}

?>
    </div>
</header>
<div id="primary" class="content-area container mb30">
<main id="main" class="site-main">
<div class="vc_row mb30">
     <?php
while (have_posts()):
    the_post();
    
    
    if (get_query_var('phrase') !== '' || get_query_var('role') !== '' || get_query_var('sector-search') !== '' || get_query_var('service') !== '' || get_query_var('officeselected') !== '') {
        $paged                   = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $query['post_type']      = 'people';
        $query['s']              = get_query_var('phrase');
        $query['posts_per_page'] = -1;
        $query['paged']          = $paged;
	    $query['orderby']          = 'title';
	    $query['order']          = 'ASC';

        /* if( get_query_var('role') !== '') { 
        
        $query['meta_query'] = array(
        array(
        'key'     => '_jobRole',
        'value'   => get_query_var('role'),
        )
        ); 
        }*/
        
        
        if (get_query_var('sector-search') !== '' || get_query_var('service') !== '' || get_query_var('officeselected') !== '' || get_query_var('role') !== '') {
            if (get_query_var('sector-search') !== '') {
                $thesector = array(
                    'taxonomy' => 'gateley_plc_sector',
                    'field' => 'slug',
                    'terms' => get_query_var('sector-search')
                );
            } else {
                $thesector = '';
            }
            
            if (get_query_var('role') !== '') {
                $therole = array(
                    'taxonomy' => 'gateley_plc_jobs',
                    'field' => 'slug',
                    'terms' => get_query_var('role')
                );
            } else {
                $therole = '';
            }
            
            if (get_query_var('service') !== '') {
                $theservice = array(
                    'taxonomy' => 'gateley_plc_service',
                    'field' => 'slug',
                    'terms' => get_query_var('service')
                );
            } else {
                $theservice = '';
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
            
            
            $query['tax_query'] = array(
                'relation' => 'AND',
                $thesector,
                $theservice,
                $theoffice,
                $therole
            );
        }
	  
        $my_query  = new WP_Query($query);
        $currentid = get_the_ID();
        
        if ($my_query->have_posts()) {
            echo "<div class='peoplesearch-" . $currentid . " people-search'>";
            while ($my_query->have_posts()):
                $my_query->the_post();
                
                get_template_part('assets/template-parts/content', 'search-people');
            endwhile;
                 
			               echo "</div>";
            // pager
            
    echo next_posts_link('Older &raquo;');
          /*wp_enqueue_style( 'isotope-css' );
            wp_enqueue_script( 'isotope' );
            if (isset($GLOBALS['script'])) {
            $GLOBALS['script'] = $GLOBALS['script'];
            } else {
            $GLOBALS['script'] = '';    
            }
            $GLOBALS['script'] .="
            $(document).ready(function() {
            $('.peoplesearch').isotope({  itemSelector: '.people', masonry: { columnWidth: '.grid-sizer'}
            
            });
            });";
            
            */
        }
        wp_reset_query();
	   
    } else {
        //for a given post type, return all
        $post_type = 'people';
        $tax       = 'glossary';
        $tax_terms = get_terms($tax, array(
            'hide_empty' => false
        ));
        if ($tax_terms) {
            
            
            echo "<div class='tab-content'>";
            $counting2 = 0;
            foreach ($tax_terms as $tax_term) {
                
                $glossary = get_query_var('glossary', 1);
                
                if ($glossary == 1) {
                    $glossary = 'a';
                }
                if (!empty($glossary)) {
                    if ($glossary == $tax_term->slug) {
                        $class = 'active';
                    } else {
                        $class = '';
                    }
                } elseif ($counting2 == '0') {
                    $class = 'active';
                } else {
                    $class = '';
                }
                echo '<div role="tabpanel" class="tab-pane ' . $class . '" id="' . $tax_term->slug . '">';
                $args = array(
                    'post_type' => $post_type,
                    'query_vars' => $glossary,
                    "$tax" => $tax_term->slug,
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'caller_get_posts' => 1,
				'orderby' => 'title',
				'order' => 'ASC'
                    
                );
                
                $my_query = null;
                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) {
                    $i = 1;
                    while ($my_query->have_posts()):
                        $my_query->the_post();
                        
                        get_template_part('assets/template-parts/content', 'search-people');
                    endwhile;
                    
                    
                } else {
                    
                    echo "<div class='vc_col-md-4 people'><div class='media deactive'><div class='media-body no-image'>Sorry, no people this criteria.</div></div></div>";
                }
                wp_reset_query();
                if (!empty($tax_terms[$counting2 - 1]->slug))
                    echo '<a href="' . get_the_permalink() . "glossary/" . $tax_terms[$counting2 - 1]->slug . '" aria-controls="' . $tax_terms[$counting2 - 1]->slug . '" role="tab" class="btn btn-inverse media-btn btn-left visible-xs visible-sm"><em class="icon icon-angle-left"><span class="sr-only">Left</span></em>' . strtoupper($tax_terms[$counting2 - 1]->name) . '</a>'; //data-toggle="tab"
                if (!empty($tax_terms[$counting2 + 1]->slug))
                    echo '<a href="' . get_the_permalink() . "glossary/" . $tax_terms[$counting2 + 1]->slug . '" aria-controls="' . $tax_terms[$counting2 + 1]->slug . '" role="tab" class="btn btn-inverse media-btn btn-right">' . strtoupper($tax_terms[$counting2 + 1]->name) . '<em class="icon icon-angle-right"<span class="sr-only">Right</span>></em></a>'; //data-toggle="tab"
                
                echo "</div>";
                $counting2++;
            }
        }
        echo "</div>";
    }
    echo "</div>";
    get_template_part('assets/template-parts/content', 'page');
?>
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()):
        comments_template();
    endif;
?>
    <?php
endwhile; // End of the loop. 
?>
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