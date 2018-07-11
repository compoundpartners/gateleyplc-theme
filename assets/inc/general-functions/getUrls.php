<?php function getUrls($string)
{
    $regex = '/https?\:\/\/[^\" ]+/i';
    preg_match_all($regex, $string, $matches);
     $urls = ($matches[0]);
 foreach($urls as $url)
 {
    echo $url.',';
 }
 
}