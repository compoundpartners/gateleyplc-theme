<?php if(!is_file($wp_loader = wp_locate_loader())){
    header("{$_SERVER['SERVER_PROTOCOL']} 403 Forbidden");
    header("Status: 403 Forbidden");
    echo 'Access denied!'; // Or whatever
    die;
}
require_once($wp_loader); // Pull it in
unset($wp_loader); // Cleanup variables
header("Content-type: text/javascript");
 
 