<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids5'];
$serv_5 = $_POST['serv-5'];
$sdesc_5 = $_POST['sdesc-5'];
$img_ser5N = explode(".", $_FILES["img-ser5"]["name"]);
$img_ser5 = $img_ser5N[0].'.'.$img_ser5N[1];
move_uploaded_file($_FILES["img-ser5"]["tmp_name"], "../imagenes/" . $_FILES["img-ser5"]["name"]);

$query = "UPDATE pag_servicios SET serv_5 = '$serv_5',sdesc_5 = '$sdesc_5', img_ser5 = '$img_ser5' WHERE idserv =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen5;
}
