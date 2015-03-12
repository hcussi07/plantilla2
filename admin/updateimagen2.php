<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_GET['ids'];
$dir_imagen = $_GET['dir_imagen'];
$imagen = $_GET['imagen'];

//echo $idp."->".$dir_imagen."->".$imagen."->";
$query = "UPDATE pag_uno SET imagen2 = '$imagen' WHERE idpag =$idp";
$result = mysql_query($query);
$origen =$dir_imagen.$imagen;
$destino="../imagenes/$imagen";
copy($origen, $destino);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$imagen;
}