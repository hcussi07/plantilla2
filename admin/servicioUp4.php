<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids4'];
$serv_4 = $_POST['serv-4'];
$sdesc_4 = $_POST['sdesc-4'];
$img_ser4N = explode(".", $_FILES["img-ser4"]["name"]);
$img_ser4 = $img_ser4N[0].'.'.$img_ser4N[1];
move_uploaded_file($_FILES["img-ser4"]["tmp_name"], "../imagenes/" . $_FILES["img-ser4"]["name"]);

$query = "UPDATE pag_servicios SET serv_4 = '$serv_4',sdesc_4 = '$sdesc_4', img_ser4 = '$img_ser4' WHERE idserv =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen4;
}
