<?php header('Content-Type:application/json');
 
// - grab wp load, wherever it's hiding -
if(file_exists('../../../../wp-load.php')) :
    include '../../../../wp-load.php';
else:
    include '../../../../../wp-load.php';
endif;
 
global $wpdb;


// - grab date barrier -
$today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
 
// - query -
global $wpdb;

 
 $querystr = "
    SELECT $wpdb->posts.* 
    FROM $wpdb->posts, $wpdb->postmeta
    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
	AND $wpdb->postmeta.meta_key = 'tribe_events_cat' 
    AND $wpdb->postmeta.meta_value = 'hr-xchange'  
    AND $wpdb->posts.post_status = 'publish' 
    AND $wpdb->posts.post_type = 'tribe_events'
    ORDER BY $wpdb->posts.post_date DESC
 ";

 
$events = $wpdb->get_results($querystr, OBJECT);
$jsonevents = array();
 
// - loop -
if ($events):
global $post;
foreach ($events as $post):
setup_postdata($post);
 
// - custom post type variables -
$custom = get_post_custom(get_the_ID());
$sd = $custom["_EventStartDate"];
$ed = $custom["_EventEndDate"];
$sd = str_replace('[', '', $sd);
$sd = str_replace(']', '', $sd);
$sd = str_replace(' ', 'T', $sd);


$ed = str_replace('[', '', $ed);
$ed = str_replace(']', '', $ed);
$ed = str_replace(' ', 'T', $ed);

// - grab gmt for start -
$gmts = date('Y-m-d H:i:s', $sd);
$gmts = get_gmt_from_date($gmts); // this function requires Y-m-d H:i:s
$gmts = strtotime($gmts);
 
// - grab gmt for end -
$gmte = date('Y-m-d H:i:s', $ed);
$gmte = get_gmt_from_date($gmte); // this function requires Y-m-d H:i:s
$gmte = strtotime($gmte);
 
// - set to ISO 8601 date format -
$stime = date('c', $gmts);
$etime = date('c', $gmte);
 
// - json items -
$jsonevents[]= array(
    'title' => $post->post_title,
    'allDay' => false, //  $stime,
    //'start' =>$stime,
	'end' => $etime,
    'url' => get_permalink($post->ID)
    );
 
endforeach;
else :
endif;
 
// - fire away -
echo json_encode($jsonevents);