<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids6'];
$serv_6 = $_POST['serv-6'];
$sdesc_6 = $_POST['sdesc-6'];
$img_ser6N = explode(".", $_FILES["img-ser6"]["name"]);
$img_ser6 = $img_ser6N[0].'.'.$img_ser6N[1];

if($img_ser6=="."){
    $query = "UPDATE pag_servicios SET serv_6 = '$serv_6',sdesc_6 = '$sdesc_6' WHERE idserv =$idp";
}else{
    move_uploaded_file($_FILES["img-ser6"]["tmp_name"], "../imagenes/" . $_FILES["img-ser6"]["name"]);
    $query = "UPDATE pag_servicios SET serv_6 = '$serv_6',sdesc_6 = '$sdesc_6', img_ser6 = '$img_ser6' WHERE idserv =$idp";
}

$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen6;
}
