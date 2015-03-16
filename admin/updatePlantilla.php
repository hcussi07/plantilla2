<?php
include_once 'conexion.php';
$idp = $_GET['idp'];
$plantilla = $_GET['plantilla'];

$query = "UPDATE pag_uno SET estilo = '$plantilla'  WHERE idpag =$idp";
$result = mysql_query($query);