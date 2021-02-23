<?php 



function gettable($Table,$column,$filtertrue,$filter,$filtervalue) {

/*
	show the founded data 			-> dataget
	the name of the table needed	-> Table
	the column to select			-> column
	the filter to use				-> filter
	the filter value				-> filtervalue
	For not using filter			-> filtertrue
*/
$hostname_config = "localhost";
$database_config = "iceo";
$username_config = "root";
$password_config = "";
$config = mysql_pconnect($hostname_config, $username_config, $password_config) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_config, $config);


if ($filtertrue==1){

$query_dataget = "SELECT $column FROM $Table WHERE $filter = '$filtervalue'";

$dataget = mysql_query($query_dataget, $config) or die(mysql_error());
$row_dataget = mysql_fetch_assoc($dataget);
$totalRows_dataget = mysql_num_rows($dataget);
}

if ($filtertrue==0){

$query_dataget = "SELECT $column FROM $Table ";

$dataget = mysql_query($query_dataget, $config) or die(mysql_error());
$row_dataget = mysql_fetch_assoc($dataget);
$totalRows_dataget = mysql_num_rows($dataget);
}


return $row_dataget[$column];
}


function page($link,$idtrue,$id,$idvalue) {

if ($idtrue==0){
$baselink = "page.php?view=".$link;
}
if ($idtrue==1){
$baselink = "page.php?view=".$link.'&'.$id.'='.$idvalue;
}

return $baselink;
}

$basurl = "files/images" ;

?>
