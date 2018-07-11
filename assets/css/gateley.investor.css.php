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
    include('static/buttons-investors.css');
    include('static/forms.css');
    include('static/inpage-navigation.css');
        include('static/blockquotes.css');
  include('static/media.css');
    //include('progress-bars.css');
    //include('modal.css');
    //include('tooltips-popups.css');
   //include('labels-badges.css');
   include('static/message-boxes.css');
    include('static/tables.css');
    include('static/hero-slider.css');
    //include('page-popup.css');
    include('static/utilities.css');
    include('static/animation.css');
    include('static/feeds.css');
    include('static/animate.css');
    include('static/responsive.css');


ob_end_flush();
#carousel-item-6-55345606 .badge, #carousel-item-6-55345606-pagination .pagination-inner {background-color:#3d1a54;}#carousel-item-6-55345606-pagination .pagination-inner  {background-image:url(http://gateleyplc.com/wp-content/uploads/2015/09/Gateley-Investors.jpg);}#carousel-item-6-55345606 h2 {color:{$slidetextcol};}#carousel-item-6-55345606-pagination .pagination-inner .pagination-content {background-color:rgba(61,26,84,0.8);}#carousel-item-6-1811961568 .badge, #carousel-item-6-1811961568-pagination .pagination-inner {background-color:#cb6da9;}#carousel-item-6-1811961568-pagination .pagination-inner  {background-image:url(http://gateleyplc.com/wp-content/uploads/2015/09/about-gateley-plc.jpg);}#carousel-item-6-1811961568 h2 {color:{$slidetextcol};}#carousel-item-6-1811961568-pagination .pagination-inner .pagination-content {background-color:rgba(203,109,169,0.8);}#carousel-item-6-1627890893 .badge, #carousel-item-6-1627890893-pagination .pagination-inner {background-color:#49a1d2;}#carousel-item-6-1627890893-pagination .pagination-inner  {background-image:url(http://gateleyplc.com/wp-content/uploads/2015/09/services.jpg);}#carousel-item-6-1627890893 h2 {color:#ffffff;}#carousel-item-6-1627890893-pagination .pagination-inner .pagination-content {background-color:rgba(73,161,210,0.8);}#carousel-item-6-1339480457 .badge, #carousel-item-6-1339480457-pagination .pagination-inner {background-color:#9b8e32;}#carousel-item-6-1339480457-pagination .pagination-inner  {background-image:url(http://gateleyplc.com/wp-content/uploads/2015/09/Hero.jpg);}#carousel-item-6-1339480457 h2 {color:{$slidetextcol};}#carousel-item-6-1339480457-pagination .pagination-inner .pagination-content {background-color:rgba(155,142,50,0.8);}#carousel-item-6-1784202277 .badge, #carousel-item-6-1784202277-pagination .pagination-inner {background-color:#c64d1f;}#carousel-item-6-1784202277-pagination .pagination-inner  {background-image:url(http://gateleyplc.com/wp-content/uploads/2015/09/people.jpg);}#carousel-item-6-1784202277 h2 {color:#ffffff;}#carousel-item-6-1784202277-pagination .pagination-inner .pagination-content {background-color:rgba(198,77,31,0.8);}.thumbnail.thumbnail-190 .caption{ background:#49a1d2; background:rgba(73,161,210,0.8)}.thumbnail.thumbnail-190 a:hover .caption{ background:#49a1d2; background:rgba(73,161,210,0.5)}.thumbnail.thumbnail-232 .caption{ background:#8f7ab8; background:rgba(143,122,184,0.8)}.thumbnail.thumbnail-232 a:hover .caption{ background:#8f7ab8; background:rgba(143,122,184,0.5)}.thumbnail.thumbnail-233 .caption{ background:#c64d1f; background:rgba(198,77,31,0.8)}.thumbnail.thumbnail-233 a:hover .caption{ background:#c64d1f; background:rgba(198,77,31,0.5)}.thumbnail.thumbnail-228 .caption{ background:#c987ba; background:rgba(201,135,186,0.8)}.thumbnail.thumbnail-228 a:hover .caption{ background:#c987ba; background:rgba(201,135,186,0.5)}.thumbnail.thumbnail-234 .caption{ background:#d3a21b; background:rgba(211,162,27,0.8)}.thumbnail.thumbnail-234 a:hover .caption{ background:#d3a21b; background:rgba(211,162,27,0.5)}.thumbnail.thumbnail-235 .caption{ background:#9b8e32; background:rgba(155,142,50,0.8)}.thumbnail.thumbnail-235 a:hover .caption{ background:#9b8e32; background:rgba(155,142,50,0.5)}
