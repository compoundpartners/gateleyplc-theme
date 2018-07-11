<?php
/**
 * Template Name: HR Xchange Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @package gateley-plc 
 */

get_header(); ?>
<?php if (is_user_logged_in()) { ?> 
<?php if(is_front_page()) { ?><!-- FRONT PAGE --> <?php } ?><?php } ?>
<header class="page-header vertical-height-no-overlay has-post-thumbnail "><div class="cover no-feature"><div class="container">
<div class="vc_row">
<div class="vc_col-md-3">
<h1 class="entry-title"><?php if(get_field('hr_xchange_logo')) { echo wp_get_attachment_image(get_field('hr_xchange_logo'), 'medium', false, array('class' => 'hrxchange-logo img-responsive')); } else { the_title(); }?></h1>
</div>
<?php if(get_field('hr_xchange_brochure')) { ?>
<div class="vc_col-md-6 text-left mt10">
<?php echo the_field('brochure_info');?>
</div>
<div class="vc_col-md-3 mt10">
<a href="<?php echo the_field('hr_xchange_brochure');?>" class="btn btn-primary pull-right" target="_blank">
Download our 2017 HRXchange training directory
</a>
</div>
<?php } else {?>
<div class="vc_col-md-8">
<?php echo the_breadcrumb(); ?>
</div>
<?php } ?>
</div>
</div>
</header>
<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'header-image-cropped' );
$url = $thumb['0'];
?>
<style>.hrxchange-logo {
  margin-bottom: 50px;
  max-width: 220px;
}
<?php global $post;
$colour = get_post_meta($post->ID, '_pagecolour', true);
if(!empty($colour)) {
$GLOBALS['styles'] .= ".page-id-".get_the_ID()." .page-header .cover{ background:".$colour."; background:".hex2rgba($colour, 0.6)."}";
}

?>
.page-id-<?php echo get_the_ID(); ?> .page-header{ background-image:url("<?php echo $url; ?>")}</style>


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
<script type="text/javascript">// <![CDATA[
    jQuery(document).ready(function() {
    jQuery('#calendar').fullCalendar({
       eventSources: [

        // your event source
        {
            events: [ // put the array in the `events` property
			
			<?php $args = array(
	'posts_per_page'   => -1,
	'offset'           => 0,
	//'category'         => 1206,
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'tribe_events',
	'tax_query' => array(
        array(
            'taxonomy' => 'tribe_events_cat',
            'field'    => 'slug',
            'terms'    => 'hr-xchange'
        )
    ),
	'post_status'      => 'publish',
	'suppress_filters' => true 
);
$posts_array = get_posts( $args ); 

foreach($posts_array as $post) {?>
                {
                    title  : '<?php echo addslashes ($post->post_title); ?>',
                    start  : '<?php echo get_post_meta($post->ID, '_EventStartDate', true) ?>',
					'url'  : '<?php echo get_permalink($post->ID) ?>'
                },
<?php } ?>	
            ]
         
        }

        // any other event sources...

    ]
        });
});
// ]]></script>
<?php get_footer(); ?>
