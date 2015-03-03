<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['idp'];
$imagen1N = explode(".", $_FILES["img-contacto"]["name"]);
$imagen1 = $imagen1N[0].'.'.$imagen1N[1];
move_uploaded_file($_FILES["img-contacto"]["tmp_name"], "../imagenes/" . $_FILES["img-contacto"]["name"]);

$query = "UPDATE pag_contactos SET img_contacto = '$imagen1' WHERE idcont =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$imagen1;
}

