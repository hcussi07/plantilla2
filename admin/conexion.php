<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "123456";
$db="plantillabd";
/*$dbuser = "linxscom_linxs";
$dbpass = "isxAeIQw065c";
$db = "linxscom_plantilladb";*/
$link = mysql_connect($dbhost,$dbuser,$dbpass); mysql_select_db($db,$link);
mysql_query ("SET NAMES 'utf8'");
?>
