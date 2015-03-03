<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids1'];
$serv_1 = $_POST['serv-1'];
$sdesc_1 = $_POST['sdesc-1'];
$img_ser1N = explode(".", $_FILES["img-ser1"]["name"]);
$img_ser1 = $img_ser1N[0].'.'.$img_ser1N[1];
move_uploaded_file($_FILES["img-ser1"]["tmp_name"], "../imagenes/" . $_FILES["img-ser1"]["name"]);

$query = "UPDATE pag_servicios SET serv_1 = '$serv_1',sdesc_1 = '$sdesc_1', img_ser1 = '$img_ser1' WHERE idserv =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen2;
}
