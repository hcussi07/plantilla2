<?php
include_once 'conexion.php';
$pest = $_GET['slogan'];
$pestana = $_GET['pestana'];
$idp = $_GET['ids'];


$query = "UPDATE pag_servicios SET lema_serv = '$pest', pestana_serv = '$pestana' WHERE idserv =$idp";
$result = mysql_query($query);


//echo $idp+" ->".$tit."- -".$desc;