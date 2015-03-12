<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_GET['ids'];
$dir_imagen = $_GET['dir_imagen'];
$imagen = $_GET['imagen'];
$img = explode("|", $imagen);
//echo $idp."->".$dir_imagen."->".$imagen."->";
$query = "UPDATE pag_uno SET imagen1 = '$imagen' WHERE idpag =$idp";
$result = mysql_query($query);
$origen =$dir_imagen.$img[0];
$destino="../imagenes/$img[0]";

$origen2 =$dir_imagen.$img[3];
$destino2="../imagenes/$img[3]";

copy($origen, $destino);
copy($origen2, $destino2);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$imagen;
}