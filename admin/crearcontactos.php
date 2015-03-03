<?php
header('Content-Type: text/html; charset=UTF-8');
include_once("conexion.php");

$pestana_cont = $_POST['pestana-cont'];
$img_contactoN = explode(".", $_FILES["img-contacto"]["name"]);
$img_contacto = $img_contactoN[0].'.'.$img_contactoN[1];
$inv_cont = $_POST['inv-cont'];
$cordenadas = $_POST['cordenadas'];

$query = "INSERT INTO pag_contactos VALUES(null,'$pestana_cont','$img_contacto','$inv_cont','$cordenadas')";

if (!mysql_query($query)) {
    echo (mysql_error());
}
move_uploaded_file($_FILES["img-contacto"]["tmp_name"], "../imagenes/" . $_FILES["img-contacto"]["name"]);

header('location:../contactos.php');
mysql_close($link);
?>