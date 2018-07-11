<?php
header('Content-type: text/css');
ob_start("compress");

    function compress( $minify )
    {
	/* remove comments */
    	$minify = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $minify );

        /* remove tabs, spaces, newlines, etc. */
    	$minify = str_replace( array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $minify );

        return $minify;
    }

    /* css files for combining */
    include('static/framework.css');
    include('../../style.css');
    include('static/typography.css');
    include('static/navigation.css');
    include('static/icons.css');
    include('static/lists.css');
    include('static/buttons.css');
    include('static/forms.css');
    include('static/blog-signup.css');
    include('static/inpage-navigation.css');
        include('static/blockquotes.css');
   include('static/media.css');
    //include('progress-bars.css');
    //include('modal.css');
    //include('tooltips-popups.css');
   //include('labels-badges.css');
       include('static/tables.css');
   include('static/message-boxes.css');
    include('static/search-page.css');
    include('static/hero-slider.css');
    //include('page-popup.css');
    include('static/utilities.css');
    include('static/animation.css');
    include('static/rewrite-core.css');
    include('static/feeds.css');

    include('static/animate.css');
    include('static/responsive.css');

ob_end_flush();
