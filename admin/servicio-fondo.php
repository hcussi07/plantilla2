<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['idpimf'];
$imagen1N = explode(".", $_FILES["img-servicio"]["name"]);
$imagen1 = $imagen1N[0].'.'.$imagen1N[1];
move_uploaded_file($_FILES["img-servicio"]["tmp_name"], "../imagenes/" . $_FILES["img-servicio"]["name"]);

$query = "UPDATE pag_servicios SET img_servicio = '$imagen1' WHERE idserv =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$imagen1;
}

