<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['ids3'];
$serv_3 = $_POST['serv-3'];
$sdesc_3 = $_POST['sdesc-3'];
$img_ser3N = explode(".", $_FILES["img-ser3"]["name"]);
$img_ser3 = $img_ser3N[0].'.'.$img_ser3N[1];

if($img_ser3=="."){
    $query = "UPDATE pag_servicios SET serv_3 = '$serv_3',sdesc_3 = '$sdesc_3' WHERE idserv =$idp";
}else{
    move_uploaded_file($_FILES["img-ser3"]["tmp_name"], "../imagenes/" . $_FILES["img-ser3"]["name"]);
    $query = "UPDATE pag_servicios SET serv_3 = '$serv_3',sdesc_3 = '$sdesc_3', img_ser3 = '$img_ser3' WHERE idserv =$idp";
}

$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $imagen3;
}
