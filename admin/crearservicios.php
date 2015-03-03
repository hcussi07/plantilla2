<?php
header('Content-Type: text/html; charset=UTF-8');
include_once("conexion.php");

$pestana_serv = $_POST['pestana-serv'];
$img_servicioN = explode(".", $_FILES["img-servicio"]["name"]);
$img_servicio = $img_servicioN[0].'.'.$img_servicioN[1];
$lema_serv = $_POST['lema-serv'];

$serv_1 = $_POST['serv-1'];
$img_ser1N = explode(".", $_FILES["img-ser1"]["name"]);
$img_ser1 = $img_ser1N[0].'.'.$img_ser1N[1];
$sdesc_1 = $_POST['sdesc-1'];

$serv_2 = $_POST['serv-2'];
$img_ser2N = explode(".", $_FILES["img-ser2"]["name"]);
$img_ser2 = $img_ser2N[0].'.'.$img_ser2N[1];
$sdesc_2 = $_POST['sdesc-2'];

$serv_3 = $_POST['serv-3'];
$img_ser3N = explode(".", $_FILES["img-ser3"]["name"]);
$img_ser3 = $img_ser3N[0].'.'.$img_ser3N[1];
$sdesc_3 = $_POST['sdesc-3'];

$serv_4 = $_POST['serv-4'];
$img_ser4N = explode(".", $_FILES["img-ser4"]["name"]);
$img_ser4 = $img_ser4N[0].'.'.$img_ser4N[1];
$sdesc_4 = $_POST['sdesc-4'];

$serv_5 = $_POST['serv-5'];
$img_ser5N = explode(".", $_FILES["img-ser5"]["name"]);
$img_ser5 = $img_ser5N[0].'.'.$img_ser5N[1];
$sdesc_5 = $_POST['sdesc-5'];

$serv_6 = $_POST['serv-6'];
$img_ser6N = explode(".", $_FILES["img-ser6"]["name"]);
$img_ser6 = $img_ser6N[0].'.'.$img_ser6N[1];
$sdesc_6 = $_POST['sdesc-6'];

$query = "INSERT INTO pag_servicios VALUES(null,'$pestana_serv','$img_servicio','$lema_serv','$serv_1','$img_ser1','$sdesc_1','$serv_2','$img_ser2','$sdesc_2','$serv_3','$img_ser3','$sdesc_3','$serv_4','$img_ser4','$sdesc_4','$serv_5','$img_ser5','$sdesc_5','$serv_6','$img_ser6','$sdesc_6')";

if (!mysql_query($query)) {
    echo (mysql_error());
}
move_uploaded_file($_FILES["img-servicio"]["tmp_name"], "../imagenes/" . $_FILES["img-servicio"]["name"]);
move_uploaded_file($_FILES["img-ser1"]["tmp_name"], "../imagenes/" . $_FILES["img-ser1"]["name"]);
move_uploaded_file($_FILES["img-ser2"]["tmp_name"], "../imagenes/" . $_FILES["img-ser2"]["name"]);
move_uploaded_file($_FILES["img-ser3"]["tmp_name"], "../imagenes/" . $_FILES["img-ser3"]["name"]);
move_uploaded_file($_FILES["img-ser4"]["tmp_name"], "../imagenes/" . $_FILES["img-ser4"]["name"]);
move_uploaded_file($_FILES["img-ser5"]["tmp_name"], "../imagenes/" . $_FILES["img-ser5"]["name"]);
move_uploaded_file($_FILES["img-ser6"]["tmp_name"], "../imagenes/" . $_FILES["img-ser6"]["name"]);

header('location:../servicios.php');
mysql_close($link);
?>