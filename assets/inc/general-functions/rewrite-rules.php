<?php function gateley_add_rewrite_rules($aRules) {
$aNewRules = array('people/glossary/([^/]+)/?$' => 'index.php?pagename=people&glossary=$matches[1]');

$aRules = $aNewRules + $aRules;

return $aRules;
}
 
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'gateley_add_rewrite_rules');