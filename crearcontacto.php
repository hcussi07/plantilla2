<?php 
header('Content-Type: text/html; charset=UTF-8');
include_once("conexion.php");

$direccion = $_POST['direccion'];
$latitud = $_POST['latitud'];
$longitud = $_POST['longitud'];
$zoom = $_POST['zoom'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$telefono3 = $_POST['telefono3'];
$redes = $_POST['redes'];
$mail = $_POST['mail'];
$fax = $_POST['fax'];

$query = "INSERT INTO pag_contactos VALUES(null,'$direccion','$latitud','$longitud','$zoom','$telefono1','$telefono2','$telefono3','$redes','$mail','$fax')";

if(!mysql_query($query)){
	echo (mysql_error());
}

//header('location:admincontactos.php');
mysql_close($link);

 ?>