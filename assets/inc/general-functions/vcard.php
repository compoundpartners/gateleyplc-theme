<?php 


function makeVcard($v_name, $v_company, $v_title, $v_email, $v_phone,$v_fax, $v_cell, $v_address, $v_street, $v_city, $v_state, $v_zip, $v_country  ) {	
	$vt="WORK"; 
	$name= explode(" ", $v_name);
	$vcard_content;	
	$vcard_content  = "BEGIN:VCARD\r\n";
	$vcard_content .= "VERSION:3.0\r\n";
	$vcard_content .= "N:".$name[1].";".$name[0].";\r\n";
	$vcard_content .="FN:" . $v_name . "\r\n";
	//$vcard_content .= "FN:".$v_company."\r\n";
	$vcard_content .= "ORG:".$v_company.";\r\n";
	$vcard_content .= "TITLE:".$v_title."\r\n";
	$vcard_content .= "EMAIL;type=EMAIL;type=".$vt.";type=pref:".$v_email."\r\n";
	$vcard_content .= "TEL;type=".$vt.";type=pref:".$v_phone."\r\n";
	$vcard_content .= "TEL;type=CELL:".$v_cell."\r\n";
	$vcard_content .= "TEL;type=".$vt.";type=FAX:".$v_fax."\r\n";
	$vcard_content .= "item1.ADR;type=".$vt.";type=pref:;;".$v_addresss." ".$v_street.";".$v_city.";".$v_state.";".$v_zip.";".$v_country."\r\n";
	$vcard_content .= "item1.X-ABADR:us\r\n";
	$vcard_content .= "item2.URL;type=pref:".$v_web."\r\n";
	$vcard_content .= "item2.X-ABLabel:_$!<HomePage>!\$\_\r\n";
	if ($v_type=="company") { $vcard_content .= "X-ABShowAs:COMPANY\r\n"; }
	$vcard_content .= "END:VCARD";
	return $vcard_content;
}

?>