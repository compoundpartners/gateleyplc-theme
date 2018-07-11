<?php function add_query_vars($aVars) {
$aVars[] = "glossary"; // PEOPLE SEARCH
$aVars[] = "phrase"; // PEOPLE SEARCH
$aVars[] = "sector-search"; // PEOPLE SEARCH
$aVars[] = "service"; // PEOPLE SEARCH
$aVars[] = "role"; // PEOPLE SEARCH
$aVars[] = "officeselected"; // PEOPLE SEARCH
$aVars[] = "area"; // JOB SEARCH
$aVars[] = "department"; // JOB SEARCH
//$aVars[] = "primary-location"; // JOB SEARCH

return $aVars;
}
 // hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');?>