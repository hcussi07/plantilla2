<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids2'];
$serv_2 = $_POST['serv-2'];
$sdesc_2 = $_POST['sdesc-2'];
$img_ser2N = explode(".", $_FILES["img-ser2"]["name"]);
$img_ser2 = $img_ser2N[0].'.'.$img_ser2N[1];

if($img_ser2=="."){
    $query = "UPDATE pag_servicios SET serv_2 = '$serv_2',sdesc_2 = '$sdesc_2' WHERE idserv =$idp";
}else{
    move_uploaded_file($_FILES["img-ser2"]["tmp_name"], "../imagenes/" . $_FILES["img-ser2"]["name"]);
    $query = "UPDATE pag_servicios SET serv_2 = '$serv_2',sdesc_2 = '$sdesc_2', img_ser2 = '$img_ser2' WHERE idserv =$idp";
}
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen2;
}
