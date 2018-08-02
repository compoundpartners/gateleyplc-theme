<?php add_action('vc_before_init', 'gateley_plc_integrateWithVC');
function get_custom_terms($taxonomies){
$args = array('orderby'=>'asc','hide_empty'=>false);
$custom_terms = get_terms('event-categories', $args);
$options = array();
	  $options['unset'] = 'Unset';
	  $options['None'] = 'none';
if(!empty($custom_terms)) {
foreach($custom_terms as $term){
	  $options[$term->name] = $term->slug;
}
}
return $options;
}

function options($type)
{
    wp_reset_query();
    $args    = array(
        'post_type' => $type,
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
            $options[htmlspecialchars(get_the_title())] = get_the_ID();
        endwhile;
        return $options;
    }
}
function posttype()
{
    $screens = get_post_types('', 'names');
    foreach ($screens as $screen) {

    }
}
function whichcasestudy()
{
    wp_reset_query();
    $args    = array(
        'post_type' => 'case_studies',
        'posts_per_page' => -1
    );
    $loop    = new WP_Query($args);
    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
            $options[htmlspecialchars(get_the_title())] = get_the_title();
        endwhile;
        return $options;
    }
}
function whichgallery()
{

    wp_reset_query();
    global $post, $wp_query, $page, $meta;
    $loop = new WP_Query(array(
        'post_type' => 'page',
        'posts_per_page' => -1
    ));

    $options = array();
    if ($loop->have_posts()) {
        while ($loop->have_posts()):
            $loop->the_post();
            if (basename(get_page_template()) == 'products-page.php') {
                $options[htmlspecialchars(get_the_title())] = get_the_title();
            }
        endwhile;
        return $options;
    }

}
function customfields()
{
    $custom_field_keys = get_post_custom_keys();
    $options           = array();
    foreach ($custom_field_keys as $key => $value) {
        $options[htmlspecialchars($value)] = $value;
    }
    return $options;
}



function wpsites()
{
    $keys    = wp_get_sites();
    $options = array();
            $options['Please Select'] = ' ';

    foreach ($keys as $key) {
        $options[$key['domain']] = $key['blog_id'];
    }
    return $options;
}

function gateley_plc_integrateWithVC()
{

    vc_map(array(
        "name" => __("Page Title"),
        "base" => "pagetitle",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Page Title"),
                "param_name" => "pagetitle",
                "value" => get_the_title(get_the_ID()),
                "description" => ''
            )
        )
    ));

        vc_map(array(
        "name" => __("iFrame"),
        "base" => "iframe",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Title"),
                "param_name" => "title",
                "value" => '',
                "description" => ''
            ),

		  array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Src"),
                "param_name" => "src",
                "value" => '',
                "description" => ''
            ),
		  array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Height"),
                "param_name" => "height",
                "value" => '',
                "description" => ''
            ),
		    array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Width"),
                "param_name" => "weight",
                "value" => '',
                "description" => ''
            ),
		    array(
                "type" => "dropdown",
                "heading" => __("iFrame Type", "js_composer"),
                "param_name" => "type",
                "value" => array(
			     'Unset' => 'unset',
                    'Feedblock' => 'feedblock',
                    'Fluid Iframe' => 'fluidiframe'
                ),
                "description" => __("Show Content Block", "js_composer"),
                "group" => 'Display Settings'
               ),
		  array(
                "type" => "dropdown",
                "heading" => __("Show Title?", "js_composer"),
                "param_name" => "showfeedtitle",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Title Block", "js_composer"),
                "group" => 'Display Settings'
               ),

			  array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showfeedcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Content Block", "js_composer"),
                "group" => 'Display Settings'
               ),

			  array(
                "type" => "vc_link",
                "heading" => __("The Link", "js_composer"),
                "param_name" => "link",
                "description" => __("link", "js_composer"),
                "group" => 'Display Settings'
            ),
		   array(
                "type" => "textarea",
                "class" => "",
                "heading" => __("disclaimer"),
                "param_name" => "disclaimer",
                "value" => '',
                "description" => ''
            ),
		   array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )
        )
    ));
    /*  vc_map( array(
    "name" => __("Page Custom Field"),
    "base" => "pagecustomfield",
    "class" => "",
    "category" => __('Content'),
    "params" => array(
    array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Custom Field"),
    "param_name" => "customfieldkey",
    "value" => customfields(),
    "description" => ''
    )
    )
    ) );*/



    vc_map(array(
        "name" => __("Page Block"),
        "base" => "pageblock",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Page"),
                "param_name" => "pageid",
                "value" => options('page'),
                "description" => ''
            ),
		   array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'
               ),

            array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),
		      array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            ),
		  array(
                "type" => "dropdown",
                "heading" => __("Colour Thumbnails", "js_composer"),
                "param_name" => "colourthumbs",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Has Coloured Thumbnail Overlay?", "js_composer"),
                "group" => 'Display Settings'

            )

        )
    ));

	vc_map(array(
        "name" => __("Thumbnail Block"),
        "base" => "thumbnail",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Page"),
                "param_name" => "pageid",
                "value" => options('services'),
                "description" => ''
            ),
		   array(
                "type" => "textarea_html",
                "heading" => __("Page Content", "js_composer"),
                "param_name" => "pagecontent",
            ),

			array(
                "type" => "attach_image",
                "heading" => __("Page Image", "js_composer"),
                "param_name" => "pageimage",
                "description" => __("The Page Image", "js_composer")
            ),
		      array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            ),
		  array(
                "type" => "dropdown",
                "heading" => __("Colour Thumbnails", "js_composer"),
                "param_name" => "colourthumbs",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Has Coloured Thumbnail Overlay?", "js_composer"),
                "group" => 'Display Settings'

            )

        )
    ));

     vc_map(array(
        "name" => __("Service Block"),
        "base" => "serviceblock",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Page"),
                "param_name" => "pageid",
                "value" => options('services'),
                "description" => ''
            ),
		   array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'
               ),

            array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),
		      array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )

        )
    ));


    vc_map(array(
        "name" => __("Link Block"),
        "base" => "linkblockbuilder",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	    array(
                "type" => "attach_image",
                "heading" => __("blockimage", "js_composer"),
                "param_name" => "blockimg",
                "description" => __("The Block Image", "js_composer")
            ),
          array(
                "type" => "textfield",
                "heading" => __("title", "js_composer"),
                "param_name" => "blocktitle",
                "value" => " ",
                "description" => __("Block Title.", "js_composer"),
                             "group" => 'Display Settings'
            ),
		    array(
                "type" => "textarea",
                "heading" => __("Content", "js_composer"),
                "param_name" => "blockcontent",
                "description" => __("Block Content", "js_composer"),
                  "group" => 'Display Settings'

            ),

		 array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),

		   array(
                "type" => "vc_link",
                "heading" => __("The Link", "js_composer"),
                "param_name" => "blocklink",
                "description" => __("Enter hyperlink location", "js_composer"),
                "group" => 'Display Settings'
            ),
           array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )

        )
    ));

    vc_map(array(
        "name" => __("Call to action Block"),
        "base" => "call_to_action",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	    array(
                "type" => "attach_image",
                "heading" => __("Background Image", "js_composer"),
                "param_name" => "calltoactionbackground",
                "description" => __("The Block Image", "js_composer")
            ),
          array(
                "type" => "textarea_html",
                "heading" => __("Title", "js_composer"),
                "param_name" => "calltoactioncontent",
                "value" => " ",
            ),
		    array(
                "type" => "vc_link",
                "heading" => __("Link", "js_composer"),
                "param_name" => "calltoactionlink",
                "description" => __("Block Content", "js_composer"),
                  "group" => 'Display Settings'

            ),

           array(
                'type' => 'colorpicker',
                'heading' => __('Colour Overlay', 'my-text-domain'),
                'param_name' => 'calltoactioncoloroverlay',
				 "value" => 'rgba(96, 198, 197, 0.8)',
                'group' => __('Design options', 'my-text-domain')
            ),
		   array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )

        )
    ));


    vc_map(array(
        "name" => __("Sector Block"),
        "base" => "sectorblock",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Page"),
                "param_name" => "pageid",
                "value" => options('sectors'),
                "description" => ''
            ),
            array(
                "type" => "attach_image",
                "heading" => __("blockimage", "js_composer"),
                "param_name" => "blockimg",
                "description" => __("Replaces Feature Image", "js_composer")
            )
        )
    ));
      vc_map(array(
        "name" => __("Fact Block"),
        "base" => "factblock",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Percentage", "js_composer"),
                "param_name" => "percentage",
                "value" => " ",
                "description" => __("Enter Fact Statistic Here.", "js_composer"),
                             "group" => 'Display Settings'
            ),
		    array(
                "type" => "textarea",
                "heading" => __("Fact", "js_composer"),
                "param_name" => "fact",
                "description" => __("Enter your fact here", "js_composer"),
                  "group" => 'Display Settings'

            ),

        )
    ));

          vc_map(array(
        "name" => __("Meta Data"),
        "base" => "social_share",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
             array(
                "type" => "dropdown",
                "heading" => __("Drop up Or down", "js_composer"),
                "param_name" => "dropupdown",
                "value" => array(
                    'Default' => 'default',
                    'Up' => 'up',
				 'Down' => 'down'

                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),

        )
    ));

    vc_map(array(
        "name" => __("Case Studies"),
        "base" => "casestudies",
        "class" => "",
        "category" => __('Content'),
        "params" => array()
    ));
    vc_map(array(
        "name" => __("Latest News"),
        "base" => "latestnews",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),



		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
            )
    ));
	 vc_map(array(
        "name" => __("Network Feed"),
        "base" => "networkfeed",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),



		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
            )
    ));
      vc_map(array(
        "name" => __("Publications"),
        "base" => "publications",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
            )
    ));
      vc_map(array(
        "name" => __("Financial Events"),
        "base" => "financialevents",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),

            )
    ));

    vc_map(array(
        "name" => __("Paginated News Feed"),
        "base" => "paginatednews",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
            )
    ));


				vc_map(array(
						"name" => __("Paginated Talking Matters Feed"),
						"base" => "paginatedtalkingmatters",
						"class" => "",
						"category" => __('Content'),
						"params" => array(
						array(
										"type" => "textfield",
										"heading" => __("Title", "js_composer"),
										"param_name" => "title"

								),
						array(
										"type" => "dropdown",
										"heading" => __("Show Content?", "js_composer"),
										"param_name" => "showcontent",
										"value" => array(
												'No' => 'no',
												'Yes' => 'yes'
										),
										"description" => __("Show a truncated content?", "js_composer"),
										"group" => 'Display Settings'

								),
						array(
										"type" => "dropdown",
										"heading" => __("Show Post Meta?", "js_composer"),
										"param_name" => "postmeta",
										"value" => array(
												'No' => 'no',
												'Yes' => 'yes'
										),
										"group" => 'Display Settings'

								),
						array(
										"type" => "colorpicker",
										"heading" => __("Header Background Colour", "js_composer"),
										"param_name" => "headerbackgroundcolour",
										"description" => __("Header Background Colour", "js_composer"),
													 "group" => 'Title Display Settings'


								),

						array(
										"type" => "colorpicker",
										"heading" => __("Header Link Background Colour", "js_composer"),
										"param_name" => "headerlinkbackgroundcolour",
										"description" => __("Header Link Background Colour", "js_composer"),
													 "group" => 'Title Display Settings'


								),

							array(
										"type" => "colorpicker",
										"heading" => __("Header LinkColour", "js_composer"),
										"param_name" => "headerlinkcolour",
										"description" => __("Header Link Colour", "js_composer"),
													 "group" => 'Title Display Settings'


								),
								)
				));


								vc_map(array(
										"name" => __("Paginated Talking Trainees Feed"),
										"base" => "paginatedtalkingtrainees",
										"class" => "",
										"category" => __('Content'),
										"params" => array(
										array(
														"type" => "textfield",
														"heading" => __("Title", "js_composer"),
														"param_name" => "title"

												),
										array(
														"type" => "dropdown",
														"heading" => __("Show Content?", "js_composer"),
														"param_name" => "showcontent",
														"value" => array(
																'No' => 'no',
																'Yes' => 'yes'
														),
														"description" => __("Show a truncated content?", "js_composer"),
														"group" => 'Display Settings'

												),
										array(
														"type" => "dropdown",
														"heading" => __("Show Post Meta?", "js_composer"),
														"param_name" => "postmeta",
														"value" => array(
																'No' => 'no',
																'Yes' => 'yes'
														),
														"group" => 'Display Settings'

												),
										array(
														"type" => "colorpicker",
														"heading" => __("Header Background Colour", "js_composer"),
														"param_name" => "headerbackgroundcolour",
														"description" => __("Header Background Colour", "js_composer"),
																	 "group" => 'Title Display Settings'


												),

										array(
														"type" => "colorpicker",
														"heading" => __("Header Link Background Colour", "js_composer"),
														"param_name" => "headerlinkbackgroundcolour",
														"description" => __("Header Link Background Colour", "js_composer"),
																	 "group" => 'Title Display Settings'


												),

											array(
														"type" => "colorpicker",
														"heading" => __("Header LinkColour", "js_composer"),
														"param_name" => "headerlinkcolour",
														"description" => __("Header Link Colour", "js_composer"),
																	 "group" => 'Title Display Settings'


												),
												)
								));


																vc_map(array(
																		"name" => __("Paginated Housebuilder Markets Feed"),
																		"base" => "paginatedhousebuildermarkets",
																		"class" => "",
																		"category" => __('Content'),
																		"params" => array(
																		array(
																						"type" => "textfield",
																						"heading" => __("Title", "js_composer"),
																						"param_name" => "title"

																				),
																		array(
																						"type" => "dropdown",
																						"heading" => __("Show Content?", "js_composer"),
																						"param_name" => "showcontent",
																						"value" => array(
																								'No' => 'no',
																								'Yes' => 'yes'
																						),
																						"description" => __("Show a truncated content?", "js_composer"),
																						"group" => 'Display Settings'

																				),
																		array(
																						"type" => "dropdown",
																						"heading" => __("Show Post Meta?", "js_composer"),
																						"param_name" => "postmeta",
																						"value" => array(
																								'No' => 'no',
																								'Yes' => 'yes'
																						),
																						"group" => 'Display Settings'

																				),
																		array(
																						"type" => "colorpicker",
																						"heading" => __("Header Background Colour", "js_composer"),
																						"param_name" => "headerbackgroundcolour",
																						"description" => __("Header Background Colour", "js_composer"),
																									 "group" => 'Title Display Settings'


																				),

																		array(
																						"type" => "colorpicker",
																						"heading" => __("Header Link Background Colour", "js_composer"),
																						"param_name" => "headerlinkbackgroundcolour",
																						"description" => __("Header Link Background Colour", "js_composer"),
																									 "group" => 'Title Display Settings'


																				),

																			array(
																						"type" => "colorpicker",
																						"heading" => __("Header LinkColour", "js_composer"),
																						"param_name" => "headerlinkcolour",
																						"description" => __("Header Link Colour", "js_composer"),
																									 "group" => 'Title Display Settings'


																				),
																				)
																));


		vc_map(array(
				"name" => __("Paginated Corporate Deals Feed"),
				"base" => "paginatedcorporatedeals",
				"class" => "",
				"category" => __('Content'),
				"params" => array(
				array(
								"type" => "textfield",
								"heading" => __("Title", "js_composer"),
								"param_name" => "title"

						),
				array(
								"type" => "dropdown",
								"heading" => __("Show Content?", "js_composer"),
								"param_name" => "showcontent",
								"value" => array(
										'No' => 'no',
										'Yes' => 'yes'
								),
								"description" => __("Show a truncated content?", "js_composer"),
								"group" => 'Display Settings'

						),
				array(
								"type" => "dropdown",
								"heading" => __("Show Post Meta?", "js_composer"),
								"param_name" => "postmeta",
								"value" => array(
										'No' => 'no',
										'Yes' => 'yes'
								),
								"group" => 'Display Settings'

						),
				array(
								"type" => "colorpicker",
								"heading" => __("Header Background Colour", "js_composer"),
								"param_name" => "headerbackgroundcolour",
								"description" => __("Header Background Colour", "js_composer"),
											 "group" => 'Title Display Settings'


						),

				array(
								"type" => "colorpicker",
								"heading" => __("Header Link Background Colour", "js_composer"),
								"param_name" => "headerlinkbackgroundcolour",
								"description" => __("Header Link Background Colour", "js_composer"),
											 "group" => 'Title Display Settings'


						),

					array(
								"type" => "colorpicker",
								"heading" => __("Header LinkColour", "js_composer"),
								"param_name" => "headerlinkcolour",
								"description" => __("Header Link Colour", "js_composer"),
											 "group" => 'Title Display Settings'


						),
						)
		));


    vc_map(array(
        "name" => __("Tweets"),
        "base" => "tweet",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "tweetid",
			 "description" => "Please enter twitter ID… ".get_option("itap_user_id")
            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
		   array(
                "type" => "dropdown",
                "heading" => __("Network Query", "js_composer"),
                "param_name" => "networkquery",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does this need to pull the data from another site in this network?", "js_composer"),
                "group" => 'Query Settings'
            ),

array(
                "type" => "dropdown",
                "heading" => __("Which Site From Network?", "js_composer"),
                "param_name" => "whichsite",
                "value" => wpsites(),
                "description" => __("which Site to pull information from?", "js_composer"),
                "dependency" => array(
                    'element' => 'networkquery',
                    'value' => 'yes'
                ),
                "group" => 'Query Settings'
            ),
            )
    ));

      vc_map(array(
        "name" => __("Network Blog"),
        "base" => "networkblogfeed",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
	      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),
		    array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),
		   array(
                "type" => "dropdown",
                "heading" => __("Which Site From Network?", "js_composer"),
                "param_name" => "whichsite",
                "value" => wpsites(),
                "description" => __("which Site to pull information from?", "js_composer"),
                                "group" => 'Query Settings'
            ),
		    array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),
            )
    ));

    vc_map(array(
        "name" => __("Sub Page Grid"),
        "base" => "subpagegrid",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __("Amount of Posts to Show", "js_composer"),
                "param_name" => "amountofposts",
                "value" => "-1",
                "description" => __("Amount of posts to show", "js_composer"),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Show Title", "js_composer"),
                "param_name" => "showtitle",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Title", "js_composer"),
                "group" => 'Title Display Settings'
            ),



		      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer"),
                "dependency" => array(
                    'element' => 'showtitle',
                    'value' => 'yes'
                ),
                "group" => 'Title Display Settings'
            ),

			   array(
                "type" => "dropdown",
                "heading" => __("Custom Order", "js_composer"),
                "param_name" => "customorder",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Custom order", "js_composer"),
                "group" => 'Display Settings'
            ),


		        array(
                "type" => "dropdown",
                "heading" => __("Order", "js_composer"),
                "param_name" => "order",
                "value" => array(
                    'Default' => 'default',

                    'Menu Order (Weight)' => 'menu_order',
                    'Title' => 'title'
                ),
				 "dependency" => array(
                    'element' => 'customorder',
                    'value' => 'yes'
                ),
                "description" => __("Custom order", "js_composer"),
                "group" => 'Display Settings'
            ),




		 array(
                "type" => "dropdown",
                "heading" => __("Masonry?", "js_composer"),
                "param_name" => "masonry",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Stack the columns", "js_composer"),
                "group" => 'Display Settings'
            ),

 array(
                "type" => "dropdown",
                "heading" => __("Related Post Search?", "js_composer"),
                "param_name" => "relatedpost",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Is this pulling through the tagged related posts?", "js_composer"),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Network Query", "js_composer"),
                "param_name" => "networkquery",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does this need to pull the data from another site in this network?", "js_composer"),
                "group" => 'Query Settings'
            ),

		   array(
                "type" => "dropdown",
                "heading" => __("Top Level Page only?", "js_composer"),
                "param_name" => "postparent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show only parent pages & not sub pages?", "js_composer"),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Which Site From Network?", "js_composer"),
                "param_name" => "whichsite",
                "value" => wpsites(),
                "description" => __("which Site to pull information from?", "js_composer"),
                "dependency" => array(
                    'element' => 'networkquery',
                    'value' => 'yes'
                ),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Which Category", "js_composer"),
                "param_name" => "whicheventcat",
                "value" =>   get_custom_terms('event-categories'),
                "description" => __("Which Category", "js_composer"),
               /* "dependency" => array(
                    'element' => 'postypes',
                    'value' => 'event'
                ),*/
                "group" => 'Query Settings'
            ),



            array(
                "type" => "dropdown",
                "heading" => __("Header Boxed?", "js_composer"),
                "param_name" => "headercontainer",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does the header have a block background?", "js_composer"),
                "group" => 'Display Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Has Link?", "js_composer"),
                "param_name" => "showlink",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does the header need to link with a button?", "js_composer"),
                "dependency" => array(
                    'element' => 'headercontainer',
                    'value' => 'yes'
                ),
                "group" => 'Title Display Settings'
            ),


            array(
                "type" => "vc_link",
                "heading" => __("The Link", "js_composer"),
                "param_name" => "thelink",
                "description" => __("Enter hyperlink location", "js_composer"),
                "dependency" => array(
                    'element' => 'showlink',
                    'value' => 'yes'
                ),
                "group" => 'Title Display Settings'
            ),


		  array(
                "type" => "colorpicker",
                "heading" => __("Header Background Colour", "js_composer"),
                "param_name" => "headerbackgroundcolour",
                "description" => __("Header Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		    array(
                "type" => "colorpicker",
                "heading" => __("Header Link Background Colour", "js_composer"),
                "param_name" => "headerlinkbackgroundcolour",
                "description" => __("Header Link Background Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),

		      array(
                "type" => "colorpicker",
                "heading" => __("Header LinkColour", "js_composer"),
                "param_name" => "headerlinkcolour",
                "description" => __("Header Link Colour", "js_composer"),
			                 "group" => 'Title Display Settings'


            ),


            array(
                "type" => "posttypes",
                "class" => "",
                "heading" => __("Post Type"),
                "param_name" => "posttypes",
                "description" => '',
                "group" => 'Query Settings'

            ),




            array(
                "type" => "dropdown",
                "heading" => __("Siblings or Children", "js_composer"),
                "param_name" => "sibsorchild",
                "value" => array(
                    'Unset' => 'unset',
                    'Siblins' => 'sibs',
                    'Children' => 'child'
                ),
                "description" => __("Return Siblins or Children?", "js_composer"),
                "group" => 'Query Settings',
            ),

		       array(
                "type" => "dropdown",
                "heading" => __("Image Display", "js_composer"),
                "param_name" => "featuredimg",
                "value" => array(
                    'Image' => 'unset',
                    'Date' => 'date',
                ),
                "description" => __("Display Featured Image or Data?", "js_composer"),
                "group" => 'Display Settings',
            ),



		   array(
                "type" => "checkbox",
                "heading" => __("Parent Page", "js_composer"),
                "param_name" => "postparentid",
                "value" => options('page'),
                "description" => __("Parent Page to get children of", "js_composer"),
                "group" => 'Query Settings',
			   "dependency" => array(
                    'element' => 'posttypes',
                    'value' => 'page'
                )

            ),

		array(
                "type" => "checkbox",
                "heading" => __("Exclude Pages", "js_composer"),
                "param_name" => "postnotin",
                "value" => options('page'),
                "description" => __("", "js_composer"),
                "group" => 'Query Settings',
			   "dependency" => array(
                    'element' => 'posttypes',
                    'value' => 'page'
                )

            ),




            array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),


		       array(
                "type" => "textfield",
                "heading" => __("Truncate Length", "js_composer"),
                "param_name" => "truncate",
                "value" => " ",
                "description" => __("How many words would you like to show of the cotnent.", "js_composer"),
                "dependency" => array(
                    'element' => 'showcontent',
                    'value' => 'yes'
                ),
                "group" => 'Display Settings'
            ),




            array(
                "type" => "dropdown",
                "heading" => __("Show Divider?", "js_composer"),
                "param_name" => "divider",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show horizontal divider", "js_composer"),
                "group" => 'Display Settings'

            ),

		  array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Show Pagination?", "js_composer"),
                "param_name" => "showpagination",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show pagination?", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list',
                    'Thumbnail' => 'thumbnail'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Columns Required?", "js_composer"),
                "param_name" => "columngrid",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Columns Required", "js_composer"),
                "group" => 'Display Settings'



            ),

            array(
                "type" => "dropdown",
                "heading" => __("Columns", "js_composer"),
                "param_name" => "columns",
                "value" => array(
                    'Default' => 'default',
                    'No Column' => 'no-column',
                    '11 of 12 Columns' => 'vc_col-md-11',
                    '10 of 12 Columns' => 'vc_col-md-10',
                    '9 of 12 Columns' => 'vc_col-md-9',
                    '8 of 12 Columns' => 'vc_col-md-8',
                    '7 of 12 Columns' => 'vc_col-md-7',
                    '6 of 12 Columns' => 'vc_col-md-6',
                    '5 of 12 Columns' => 'vc_col-md-5',
                    '4 of 12 Columns' => 'vc_col-md-4',
                    '3 of 12 Columns' => 'vc_col-md-3',
                    '2 of 12 Columns' => 'vc_col-md-2',
                    '1 of 12 Columns' => 'vc_col-md-1'
                ),
                "description" => __("Columns", "js_composer"),
                "group" => 'Display Settings',
                "dependency" => array(
                    'element' => 'columngrid',
                    'value' => 'yes'
                )

            ),


            array(
                "type" => "dropdown",
                "heading" => __("Tablet Columns", "js_composer"),
                "param_name" => "tabletcolumns",
                "value" => array(
                    'Default' => 'default',
                    '12 of 12 Columns' => 'vc_col-sm-12',
                    '11 of 12 Columns' => 'vc_col-sm-11',
                    '10 of 12 Columns' => 'vc_col-sm-10',
                    '9 of 12 Columns' => 'vc_col-sm-9',
                    '8 of 12 Columns' => 'vc_col-sm-8',
                    '7 of 12 Columns' => 'vc_col-sm-7',
                    '6 of 12 Columns' => 'vc_col-sm-6',
                    '5 of 12 Columns' => 'vc_col-sm-5',
                    '4 of 12 Columns' => 'vc_col-sm-4',
                    '3 of 12 Columns' => 'vc_col-sm-3',
                    '2 of 12 Columns' => 'vc_col-sm-2',
                    '1 of 12 Columns' => 'vc_col-sm-1'
                ),
                "description" => __("Tablet Columns", "js_composer"),
                "group" => 'Display Settings',
                "dependency" => array(
                    'element' => 'columngrid',
                    'value' => 'yes'
                )
            ),


            array(
                "type" => "dropdown",
                "heading" => __("Colour Thumbnails", "js_composer"),
                "param_name" => "colourthumbs",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Has Coloured Thumbnail Overlay?", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Tax Query", "js_composer"),
                "param_name" => "taxquery",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Tax Query?", "js_composer"),
                "group" => 'Query Settings'

            ),

		      array(
                "type" => "dropdown",
                "heading" => __("Tax", "js_composer"),
                "param_name" => "tax",
                "value" => array(
			   'Unset' =>   '',
                  'Service' =>   'gateley_plc_service',
                   'Sector' =>  'gateley_plc_sector',
			  'Location' =>  'gateley_plc_location',
                ),

                "description" => __("Taxonomy", "js_composer"),
                "group" => 'Query Settings'

            ),


            array(
                "type" => "dropdown",
                "heading" => __("Pop Up Link?", "js_composer"),
                "param_name" => "popuplink",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Popup before opening to page?", "js_composer"),
                "group" => 'Query Settings'

            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )




        ),
        'description' => 'Shows this pages child pages in a block grid'
    ));

   /* RELATED POSTS */


    vc_map(array(
        "name" => __("Related Posts"),
        "base" => "relatedposts",
        "class" => "",
        "category" => __('Content'),
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __("Amount of Posts to Show", "js_composer"),
                "param_name" => "amountofposts",
                "value" => "-1",
                "description" => __("Amount of posts to show", "js_composer"),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Show Title", "js_composer"),
                "param_name" => "showtitle",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Title", "js_composer"),
                "group" => 'Display Settings'
            ),

		      array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer"),
                "dependency" => array(
                    'element' => 'showtitle',
                    'value' => 'yes'
                ),
                "group" => 'Title Display Settings'
            ),


 array(
                "type" => "dropdown",
                "heading" => __("Related Post Search?", "js_composer"),
                "param_name" => "relatedpost",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Is this pulling through the tagged related posts?", "js_composer"),
                "group" => 'Query Settings'
            ),



            array(
                "type" => "posttypes",
                "class" => "",
                "heading" => __("Post Type"),
                "param_name" => "posttypes",
                "description" => '',
                "group" => 'Query Settings'

            ),




		       array(
                "type" => "dropdown",
                "heading" => __("Image Display", "js_composer"),
                "param_name" => "featuredimg",
                "value" => array(
                    'Image' => 'unset',
                    'Date' => 'date',
                ),
                "description" => __("Display Featured Image or Data?", "js_composer"),
                "group" => 'Display Settings',
            ),


            array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),


		       array(
                "type" => "textfield",
                "heading" => __("Truncate Length", "js_composer"),
                "param_name" => "truncate",
                "value" => " ",
                "description" => __("How many words would you like to show of the cotnent.", "js_composer"),
                "dependency" => array(
                    'element' => 'showcontent',
                    'value' => 'yes'
                ),
                "group" => 'Display Settings'
            ),




            array(
                "type" => "dropdown",
                "heading" => __("Show Divider?", "js_composer"),
                "param_name" => "divider",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show horizontal divider", "js_composer"),
                "group" => 'Display Settings'

            ),


            array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list',
                    'Thumbnail' => 'thumbnail'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),




            array(
                "type" => "dropdown",
                "heading" => __("Colour Thumbnails", "js_composer"),
                "param_name" => "colourthumbs",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Has Coloured Thumbnail Overlay?", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Tax Query", "js_composer"),
                "param_name" => "taxquery",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Tax Query?", "js_composer"),
                "group" => 'Query Settings'

            ),

		      array(
                "type" => "dropdown",
                "heading" => __("Tax", "js_composer"),
                "param_name" => "tax",
                "value" => array(
			   'Unset' =>   '',
                  'Service' =>   'gateley_plc_service',
                   'Sector' =>  'gateley_plc_sector',
			  'Location' =>  'gateley_plc_location',
                ),

                "description" => __("Taxonomy", "js_composer"),
                "group" => 'Query Settings'

            ),


            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )




        ),
        'description' => 'Shows this pages child pages in a block grid'
    ));


   /* NETWORK SITE */
vc_map(array(
        "name" => __("Network Sites"),
        "base" => "networksites",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer"),
                "dependency" => array(
                    'element' => 'showtitle',
                    'value' => 'yes'
                ),
                "group" => 'Display Settings'
            ),

            array(
                "type" => "textfield",
                "heading" => __("Amount of Posts to Show", "js_composer"),
                "param_name" => "amountofposts",
                "value" => "-1",
                "description" => __("Amount of posts to show", "js_composer"),
                "group" => 'Query Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Show Title", "js_composer"),
                "param_name" => "showtitle",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Title", "js_composer"),
                "group" => 'Display Settings'
            ),

		 array(
                "type" => "dropdown",
                "heading" => __("Masonry?", "js_composer"),
                "param_name" => "masonry",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Stack the columns", "js_composer"),
                "group" => 'Display Settings'
            ),








            array(
                "type" => "dropdown",
                "heading" => __("Header Boxed?", "js_composer"),
                "param_name" => "headercontainer",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does the header have a block background?", "js_composer"),
                "group" => 'Display Settings'
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Has Link?", "js_composer"),
                "param_name" => "showlink",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Does the header need to link with a button?", "js_composer"),
                "dependency" => array(
                    'element' => 'headercontainer',
                    'value' => 'yes'
                ),
                "group" => 'Display Settings'
            ),


            array(
                "type" => "vc_link",
                "heading" => __("The Link", "js_composer"),
                "param_name" => "thelink",
                "description" => __("Enter hyperlink location", "js_composer"),
                "dependency" => array(
                    'element' => 'showlink',
                    'value' => 'yes'
                ),
                "group" => 'Display Settings'
            ),







		   array(
                "type" => "checkbox",
                "heading" => __("Exclude Sites", "js_composer"),
                "param_name" => "excludesites",
                "value" => wpsites(),
                "description" => __("Return Siblins or Children?", "js_composer"),
                "group" => 'Query Settings',
		 ),




            array(
                "type" => "dropdown",
                "heading" => __("Show Content?", "js_composer"),
                "param_name" => "showcontent",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show a truncated content?", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Show Pagination?", "js_composer"),
                "param_name" => "showpagination",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show pagination?", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Display Type", "js_composer"),
                "param_name" => "displaytype",
                "value" => array(
                    'Overlay' => 'overlay',
                    'Media List' => 'medialist',
                    'Media List No Image' => 'medialistnoimage',
                    'List' => 'list'
                ),
                "description" => __("Display Set Up", "js_composer"),
                "group" => 'Display Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Columns Required?", "js_composer"),
                "param_name" => "columngrid",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Columns Required", "js_composer"),
                "group" => 'Display Settings'



            ),

            array(
                "type" => "dropdown",
                "heading" => __("Columns", "js_composer"),
                "param_name" => "columns",
                "value" => array(
                    'Default' => 'default',
                    'No Column' => 'no-column',
                    '11 of 12 Columns' => 'vc_col-md-11',
                    '10 of 12 Columns' => 'vc_col-md-10',
                    '9 of 12 Columns' => 'vc_col-md-9',
                    '8 of 12 Columns' => 'vc_col-md-8',
                    '7 of 12 Columns' => 'vc_col-md-7',
                    '6 of 12 Columns' => 'vc_col-md-6',
                    '5 of 12 Columns' => 'vc_col-md-5',
                    '4 of 12 Columns' => 'vc_col-md-4',
                    '3 of 12 Columns' => 'vc_col-md-3',
                    '2 of 12 Columns' => 'vc_col-md-2',
                    '1 of 12 Columns' => 'vc_col-md-1'
                ),
                "description" => __("Columns", "js_composer"),
                "group" => 'Display Settings',
                "dependency" => array(
                    'element' => 'columngrid',
                    'value' => 'yes'
                )

            ),


            array(
                "type" => "dropdown",
                "heading" => __("Tablet Columns", "js_composer"),
                "param_name" => "tabletcolumns",
                "value" => array(
                    'Default' => 'default',
                    '12 of 12 Columns' => 'vc_col-sm-12',
                    '11 of 12 Columns' => 'vc_col-sm-11',
                    '10 of 12 Columns' => 'vc_col-sm-10',
                    '9 of 12 Columns' => 'vc_col-sm-9',
                    '8 of 12 Columns' => 'vc_col-sm-8',
                    '7 of 12 Columns' => 'vc_col-sm-7',
                    '6 of 12 Columns' => 'vc_col-sm-6',
                    '5 of 12 Columns' => 'vc_col-sm-5',
                    '4 of 12 Columns' => 'vc_col-sm-4',
                    '3 of 12 Columns' => 'vc_col-sm-3',
                    '2 of 12 Columns' => 'vc_col-sm-2',
                    '1 of 12 Columns' => 'vc_col-sm-1'
                ),
                "description" => __("Tablet Columns", "js_composer"),
                "group" => 'Display Settings',
                "dependency" => array(
                    'element' => 'columngrid',
                    'value' => 'yes'
                )
            ),

            array(
                "type" => "dropdown",
                "heading" => __("Tax Query", "js_composer"),
                "param_name" => "taxquery",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Tax Query?", "js_composer"),
                "group" => 'Query Settings'

            ),

            array(
                "type" => "dropdown",
                "heading" => __("Pop Up Link?", "js_composer"),
                "param_name" => "popuplink",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Popup before opening to page?", "js_composer"),
                "group" => 'Query Settings'

            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )




        ),
        'description' => 'Shows this pages child pages in a block grid'
    ));



    vc_map(array(
        "name" => __("Breadcrumbs"),
        "base" => "breadcrumbs",
        "class" => "",
        "category" => __('Content'),
        "params" => array()
    ));

       vc_map(array(
        "name" => __("Accessibility"),
        "base" => "accessibility",
        "class" => "",
        "category" => __('Content'),
        "params" => array()
    ));

    vc_map(array(
        "name" => __("Clearfix"),
        "base" => "clearfix",
        "class" => "",
        "category" => __('Content'),
        "params" => array()
    ));




    vc_map(array(
        "name" => __("Clients Grid"),
        "base" => "clients",
        "class" => "",
        "category" => __('Content'),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("id", "js_composer"),
                "param_name" => "el_id",
                "value" => "clients-" . rand(),
                "description" => __("REQUIRED... This give the element a unique tag.", "js_composer")
            )
        )
    ));

    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map(array(
        "name" => __("PageHeader", "js_composer"),
        "base" => "pageheader",
        "as_parent" => array(
            'only' => 'row, vc_row, searchform'
        ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "params" => array(

            array(
                "type" => "textfield",
                "heading" => __("class", "js_composer"),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra classes.", "js_composer")
            ),
            array(
                "type" => "attach_image",
                "heading" => __("backgroundimage", "js_composer"),
                "param_name" => "backgroundimage",
                "description" => __("background Image", "js_composer")
            ),
            array(
                "type" => "colorpicker",
                "heading" => __("Background Colour", "js_composer"),
                "param_name" => "backgroundcolour",
                "description" => __("Background Colour", "js_composer")

            ),
             array(
                "type" => "dropdown",
                "heading" => __("No Content Block Overlay?", "js_composer"),
                "param_name" => "isoverlay",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
            ),


        ),
        "js_view" => 'VcColumnView'
    ));


    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map(array(
        "name" => __("Carousel", "js_composer"),
        "base" => "carousel",
        "as_parent" => array(
            'only' => 'carouselitem, testimonialcarouselitem'
        ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer")
            ),


            array(
                "type" => "dropdown",
                "heading" => __("Show Title", "js_composer"),
                "param_name" => "showtitle",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Title", "js_composer")

            ),


            array(
                "type" => "textfield",
                "heading" => __("Auto Scroll Time", "js_composer"),
                "param_name" => "slider_time",
                "value" => "4",
                "description" => __("Time in seconds - Delete value to turn off Auto Scroll", "js_composer"),
                "group" => 'Slider Settings'
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Slides Per View", "js_composer"),
                "param_name" => "slides_per_view",
                "value" => array(
                    'One' => '1',
                    'Two' => '2',
                    'Auto' => 'auto'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),


            array(
                "type" => "textfield",
                "heading" => __("Space Between Slides", "js_composer"),
                "param_name" => "space_between",
                "value" => " ",
                "group" => 'Slider Settings'
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Transition Effect"),
                "param_name" => "transition_effect",
                "value" => array(
                    'Slide' => 'slide',
                    'Fade' => 'fade',
                    'Cube' => 'cube',
                    'Coverflow' => 'coverflow'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Direction"),
                "param_name" => "transition_direction",
                "value" => array(
                    'Horizontal' => 'horizontal',
                    'Vertical' => 'vertical'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Enable Keyboard Controls"),
                "param_name" => "keyboardControl",
                "value" => array(
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Enable Mousewheel Control Controls"),
                "param_name" => "mousewheelControl",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),



            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Loop Slides"),
                "param_name" => "loop",
                "value" => array(
                    'Undefined' => 'unset',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Image / Text Pagination"),
                "param_name" => "blockpagination",
                "value" => array(
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Show Arrows?"),
                "param_name" => "showarrows",
                "value" => array(
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),


            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Show Standard Pagination"),
                "param_name" => "showpagination",
                "value" => array(
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),



            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Enable Hash Nav"),
                "param_name" => "hashnav",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Slider Settings'
            ),

            array(
                "type" => "textfield",
                "heading" => __("id", "js_composer"),
                "param_name" => "el_id",
                "value" => "carousel-" . rand(),
                "description" => __("REQUIRED... This give the element a unique tag.", "js_composer"),
                "group" => 'Required Settings'

            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )


        ),
        "js_view" => 'VcColumnView'
    ));


    vc_map(array(
        "name" => __("Carousel Item", "js_composer"),
        "base" => "carouselitem",
        "content_element" => true,
        "as_child" => array(
            'only' => 'carousel'
        ), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(


            array(
                "type" => "attach_image",
                "heading" => __("Slideimage", "js_composer"),
                "param_name" => "sliderimg",
                "description" => __("Add the slider image.", "js_composer")
            ),
            array(
                "type" => "textfield",
                "heading" => __("Tag", "js_composer"),
                "param_name" => "caption_tag",
                "description" => __("Add your caption Tag to the slide", "js_composer"),
                "group" => 'Caption'
            ),
            array(
                "type" => "textarea",
                "heading" => __("Title", "js_composer"),
                "param_name" => "caption_title",
                "description" => __("Add your caption Title to the slide", "js_composer"),
                "group" => 'Caption'

            ),
            array(
                "type" => "textarea",
                "heading" => __("Caption", "js_composer"),
                "param_name" => "caption_text",
                "description" => __("Add your caption to the slide", "js_composer"),
                "group" => 'Caption'

            ),

            array(
                "type" => "textarea",
                "heading" => __("Slide Intro", "js_composer"),
                "param_name" => "slideintro",
                "description" => __("Slide Intro used on slide pagination", "js_composer"),
                "group" => 'Pagination'
            ),

            array(
                "type" => "attach_image",
                "heading" => __("Pagination Image", "js_composer"),
                "param_name" => "paginationimg",
                "description" => __("Add the pagination image.", "js_composer"),
                "group" => 'Pagination'

            ),
               array(
                "type" => "vc_link",
                "heading" => __("Pagination Link", "js_composer"),
                "param_name" => "paginationlink",
                "description" => __("Enter hyperlink location", "js_composer"),
                "group" => 'Pagination'
            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Text Colour", "js_composer"),
                "param_name" => "slidetextcol",
                "description" => __("Slide Text Colour", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Tag & Pagination Background Colour", "js_composer"),
                "param_name" => "slidecol",
                "description" => __("Slide Tag & Pagination Background Colour", "js_composer"),
                "group" => 'Colour Options'

            ),
		   array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Carousel Caption Setting", "js_composer"),
                "param_name" => "captionstyle",
                "value" => array(
                    'Unset' => 'unset',
                    'Boxed' => 'boxed',
                    'Standard' => 'standard'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),


		  	   array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("overlay?", "js_composer"),
                "param_name" => "hasoverlay",
                "value" => array(
                    'Unset' => 'unset',
                    'Yes' => 'yes',
                    'No' => 'no'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),


		  array(
                "type" => "colorpicker",
                "heading" => __("Accessibilty Level AAA Tag & Pagination Background Colour", "js_composer"),
                "param_name" => "slidecolaaa",
                "description" => __("Accessibilty Level AAA Slide Tag & Pagination Background Colour", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Tag & Pagination Text Colour", "js_composer"),
                "param_name" => "slidetagtextcol",
                "description" => __("Slide Tag & Pagination Colour", "js_composer"),
                "group" => 'Colour Options'

            ),
              array(
                "type" => "colorpicker",
                "heading" => __("Arrow Colour", "js_composer"),
                "param_name" => "arrowcolor",
                "description" => __("Arrow Colour", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "checkbox",
                "heading" => __("Show Caption?", "js_composer"),
                "param_name" => "caption_show",
                "value" => array(
                    'Yes' => '1',
                    'No' => '0'
                ),
                "description" => __("Show the caption", "js_composer"),
                "group" => 'Caption'
            ),

            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            ),

            array(
                "type" => "textfield",
                "heading" => __("id", "js_composer"),
                "param_name" => "el_id",
                "value" => "carousel-item-" . rand(),
                "description" => __("REQUIRED... This give the element a unique tag.", "js_composer")
            )


        )

    ));


    vc_map(array(
        "name" => __("Testimonial Carousel Item", "js_composer"),
        "base" => "testimonialcarouselitem",
        "content_element" => true,
        "as_child" => array(
            'only' => 'carousel'
        ), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
                "type" => "textarea",
                "heading" => __("Testimonial", "js_composer"),
                "param_name" => "caption_testimonial",
                "description" => __("The testimonial", "js_composer"),
                "group" => 'Testimonial'

            ),

            array(
                "type" => "textfield",
                "heading" => __("Author", "js_composer"),
                "param_name" => "caption_tag",
                "description" => __("Who said the quote?", "js_composer"),
                "group" => 'Testimonial'
            ),

            array(
                "type" => "textfield",
                "heading" => __("Author Company", "js_composer"),
                "param_name" => "caption_company",
                "description" => __("Authors Organisation", "js_composer"),
                "group" => 'Testimonial'
            ),



            array(
                "type" => "colorpicker",
                "heading" => __("Text Colour", "js_composer"),
                "param_name" => "slidetextcol",
                "description" => __("Slide Text Colour", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Tag & Pagination Background Colour", "js_composer"),
                "param_name" => "slidecol",
                "description" => __("Slide Tag & Pagination Background Colour", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Tag & Pagination Text Colour", "js_composer"),
                "param_name" => "slidetagtextcol",
                "description" => __("Slide Tag & Pagination Colour", "js_composer"),
                "group" => 'Colour Options'

            ),


            array(
                "type" => "checkbox",
                "heading" => __("Show Caption?", "js_composer"),
                "param_name" => "caption_show",
                "value" => array(
                    'Yes' => '1',
                    'No' => '0'
                ),
                "description" => __("Show the caption", "js_composer"),
                "group" => 'Caption'
            )

        )

    ));


    //Register "container" content element. It will hold all your inner (child) content elements
    vc_map(array(
        "name" => __("TimeLine", "js_composer"),
        "base" => "timeline",
        "as_parent" => array(
            'only' => 'timelineitem'
        ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer")
            ),
		  array(
                "type" => "textfield",
                "heading" => __("Timeline Bar Position", "js_composer"),
                "param_name" => "barbottom",
                "value" => " ",
                "description" => __("Where does the timeline need to stop?", "js_composer")
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )


        ),
        "js_view" => 'VcColumnView'
    ));


    vc_map(array(
        "name" => __("Timeline Item", "js_composer"),
        "base" => "timelineitem",
        "content_element" => true,
        "as_child" => array(
            'only' => 'timeline'
        ), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
                "type" => "textarea",
                "heading" => __("Caption", "js_composer"),
                "param_name" => "caption",
                "description" => __("The Article Content", "js_composer"),

            ),
		  array(
                "type" => "textfield",
                "heading" => __("Date", "js_composer"),
                "param_name" => "datecaption",
                "description" => __("The Article Date", "js_composer"),

            ),



        )

    ));

    vc_map(array(
        "name" => __("Circle Nav", "js_composer"),
        "base" => "circlenav",
        "as_parent" => array(
            'only' => 'circle_nav_item, subpagegrid'
        ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
        "content_element" => true,
        "show_settings_on_create" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title",
                "value" => " ",
                "description" => __("If you would like a title, enter here.", "js_composer")
            ),
		  array(
                "type" => "textfield",
                "heading" => __("Timeline Bar Position", "js_composer"),
                "param_name" => "barbottom",
                "value" => " ",
                "description" => __("Where does the timeline need to stop?", "js_composer")
            ),
            array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            ),


		     array(
                "type" => "checkbox",
                "heading" => __("Pages", "js_composer"),
                "param_name" => "pages",
                "value" => options('services'),
                "description" => __("Return Siblins or Children?", "js_composer"),
                "group" => 'Query Settings',
		 ),




        ),
        "js_view" => 'VcColumnView'
    ));


    vc_map(array(
        "name" => __("Circle Navigation Item", "js_composer"),
        "base" => "circle_nav_item",
        "content_element" => true,
        "as_child" => array(
            'only' => 'circlenav'
        ), // Use only|except attributes to limit parent (separate multiple values with comma)
        "params" => array(
            array(
                "type" => "textarea",
                "heading" => __("Caption", "js_composer"),
                "param_name" => "caption",
                "description" => __("The Article Content", "js_composer"),

            ),
		  array(
                "type" => "textfield",
                "heading" => __("Date", "js_composer"),
                "param_name" => "datecaption",
                "description" => __("The Article Date", "js_composer"),

            ),



        )

    ));




    vc_map(array(
        "name" => __("Icon Box", "js_composer"),
        "base" => "iconbox",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Icon"),
                "param_name" => "icon",
                "value" => array(
                    'Folding' => 'icon icon-folding',
                    'Hand Ok' => 'icon icon-hand-ok',
                    'Inspect Panels' => 'icon icon-inspect-panels',
                    'Paint Bucket' => 'icon icon-paint-bucket-01',
                    'Quotes' => 'icon icon-quotes',
                    'Inspect Roller' => 'icon icon-roller-inspect-01',
                    'Spanner' => 'icon icon-spanner',
                    'Clipboard Notes' => 'fi-clipboard-notes',
                    'Safety Cone' => 'fi-safety-cone'

                ),
                "description" => ''
            ),
            array(
                "type" => "textarea_html",
                "heading" => __("Caption", "js_composer"),
                "param_name" => "iconcontent",
                "description" => __("Content", "js_composer")
            )

        )
    ));




    vc_map(array(
        "name" => __("Twitter Feed", "js_composer"),
        "base" => "twitterfeed",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("WIDGET ID", "js_composer"),
                "param_name" => "widgetid"

            ),

            array(
                "type" => "textfield",
                "heading" => __("Screen Name", "js_composer"),
                "param_name" => "screenname"

            ),

            array(
                "type" => "textfield",
                "heading" => __("Tweet Count", "js_composer"),
                "param_name" => "datatweetlimit",
                "group" => 'Display Settings'

            ),




            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Hide Header?"),
                "param_name" => "noheader",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),


            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Hide Footer?"),
                "param_name" => "nofooter",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Remove Borders?"),
                "param_name" => "noborders",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Remove Scrollbar"),
                "param_name" => "noscrollbar",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Display Settings'
            ),

            array(
                "type" => "textfield",
                "heading" => __("Widget Width", "js_composer"),
                "param_name" => "twitter_widget_width",
                "group" => 'Widget Settings'

            ),

            array(
                "type" => "textfield",
                "heading" => __("Widget Height", "js_composer"),
                "param_name" => "twitter_widget_height",
                "group" => 'Widget Settings'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Border Colour", "js_composer"),
                "param_name" => "bordercol",
                "description" => __("Border Colour - if not hidden", "js_composer"),
                "group" => 'Colour Options'

            ),

            array(
                "type" => "colorpicker",
                "heading" => __("Link Colour", "js_composer"),
                "param_name" => "linkcol",
                "description" => __("Link Colour", "js_composer"),
                "group" => 'Colour Options'

            )

        )
    ));

     vc_map(array(
        "name" => __("Sitemap", "js_composer"),
        "base" => "sitemap",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),


        )
    ));

    vc_map(array(
        "name" => __("Wordpress Blog Feed", "js_composer"),
        "base" => "blogfeed",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),

            array(
                "type" => "exploded_textarea",
                "heading" => __("Feed Url", "js_composer"),
                "param_name" => "feedurl"

            ),

            array(
                "type" => "exploded_textarea",
                "heading" => __("blogurl", "js_composer"),
                "param_name" => "blogurl"

            ),


             array(
                "type" => "dropdown",
                "heading" => __("Show Post Meta?", "js_composer"),
                "param_name" => "postmeta",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "group" => 'Display Settings'

            ),


            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Remove Scrollbar"),
                "param_name" => "noscrollbar",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => '',
                "group" => 'Display Settings'
            )


        )
    ));

    vc_map(array(
        "name" => __("Spotlight Feed", "js_composer"),
        "base" => "spotlightfeed",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            )

        )
    ));
     vc_map(array(
        "name" => __("Related Contacts", "js_composer"),
        "base" => "relatedcontacts",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Title", "js_composer"),
                "param_name" => "title"

            ),
		   array(
                "type" => "dropdown",
                "heading" => __("Related Post Search?", "js_composer"),
                "param_name" => "relatedpost",
                "value" => array(
                    'Unset' => 'unset',
                    'Tax Query' => 'taxquery',
				 'Tagged on Page' => 'pagetaxquery'

                ),
                "description" => __("Is this pulling through the tagged related posts?", "js_composer"),
                "group" => 'Query Settings'
            ),

			 array(
                "type" => "dropdown",
                "heading" => __("Show Region?", "js_composer"),
                "param_name" => "showregion",
                "value" => array(
                    'No' => 'no',
                    'Yes' => 'yes'
                ),
                "description" => __("Show Region Information", "js_composer"),
                "group" => 'Display Settings'
               ),


		    array(
                "type" => "dropdown",
                "heading" => __("Tax", "js_composer"),
                "param_name" => "tax",
                "value" => array(
			   'Unset' =>   '',
                  'Service' =>   'gateley_plc_service',
                   'Sector' =>  'gateley_plc_sector',
			  'Location' =>  'gateley_plc_location',
			  'Person' =>  'gateley_plc_people',

                ),
                "description" => __("Taxonomy", "js_composer"),
                "group" => 'Query Settings'

            ),

		      array(
                'type' => 'css_editor',
                'heading' => __('Css', 'my-text-domain'),
                'param_name' => 'css',
                'group' => __('Design options', 'my-text-domain')
            )

        )
    ));
    vc_map(array(
        "name" => __("Search Form", "js_composer"),
        "base" => "searchform",
        "content_element" => true,
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("title", "js_composer"),
                "param_name" => "searchtitle"
            ),
            array(
                "type" => "textarea_html",
                "heading" => __("Caption", "js_composer"),
                "param_name" => "searchcontent",
                "description" => __("Content", "js_composer"),
                "value" => 'Use this form to search for People, Pages, Events and our Latest News.'
            )

        )
    ));

    vc_map(array(
        "name" => __("Modal", "js_composer"),
        "base" => "modal",
        "content_element" => true,
        "show_settings_on_create" => false,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("id", "js_composer"),
                "param_name" => "el_id",
                "value" => "modal-" . rand(),
                "description" => __("REQUIRED... This give the element a unique tag.", "js_composer")
            )
        ),
        "js_view" => 'VcColumnView'
    ));
	  vc_map(array(
        "name" => __("Link Container", "js_composer"),
        "base" => "link_container",
        "content_element" => true,
		"as_parent" => array(
            'only' => 'row, vc_row'
        ),
        "show_settings_on_create" => true,
        "params" => array(
            // add params same as with any other content element
            array(
                "type" => "textfield",
                "heading" => __("Link", "js_composer"),
                "param_name" => "blocklink",
                "value" => "",
                "description" => __("REQUIRED...", "js_composer")
            )
        ),
        "js_view" => 'VcColumnView'
    ));
    wp_reset_query();
    global $post;
    /*
    $setting = array (
    "params" => array(
    // add params same as with any other content element
    array(
    "type" => "textfield",
    "heading" => __("id", "js_composer"),
    "param_name" => "el_id",
    "value" => "row-".get_the_ID()."-".rand(),
    "description" => __("Use this for smooth scroll.", "js_composer")
    ),
    array(
    "type" => "textfield",
    "heading" => __("Extra Class", "js_composer"),
    "param_name" => "el_class",
    "value" => "",
    )



    )
    );
    vc_map_update('vc_row', $setting);*/

    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Carousel extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Timeline extends WPBakeryShortCodesContainer
        {
        }
    }

      if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Circle_Nav extends WPBakeryShortCodesContainer

        {
        }
	           class WPBakeryShortCode_CircleNav extends WPBakeryShortCodesContainer{}
    }

    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Modal extends WPBakeryShortCodesContainer
        {
        }
    }

	 if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Link_Container extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_PageHeader extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Carousel_Item extends WPBakeryShortCode

        {
        }
        class WPBakeryShortCode_Carousel_Multi_Item extends WPBakeryShortCode
        {
        }



    }

    /* Remove Unwanted Items
    vc_remove_element("vc_images_carousel");
    vc_remove_element("vc_wp_recentcomments");
    vc_remove_element("vc_wp_calendar");
    vc_remove_element("vc_wp_meta");
    vc_remove_element("vc_wp_search");
    vc_remove_element("vc_wp_pages");
    vc_remove_element("vc_wp_tagcloud");
    vc_remove_element("vc_wp_text");
    vc_remove_element("vc_wp_posts");
    vc_remove_element("vc_wp_categories");
    vc_remove_element("vc_wp_archives");
    vc_remove_element("vc_wp_rss");
    vc_remove_element("vc_custom_heading");
    vc_remove_element("vc_tour");
    vc_remove_element("vc_tabs");
    vc_remove_element("vc_accordion");
    vc_remove_element("vc_posts_slider");
    vc_remove_element("vc_carousel");
    vc_remove_element("vc_widget_sidebar");
    vc_remove_element("vc_gallery");
    vc_remove_element("vc_toggle");
    vc_remove_element("vc_cta_button");
    vc_remove_element("vc_cta_button2");
    vc_remove_element("vc_button");
    vc_remove_element("vc_button2");
    vc_remove_element("vc_posts_grid"); */
}?>
