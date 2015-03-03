<?php
header('Content-Type: text/html; charset=UTF-8');
include_once("conexion.php");
$pestana = $_POST['pestana'];
$titulo = $_POST['titulo'];
$desctitulo = $_POST['desctitulo'];
$bien1 = $_POST['bien1'];
$bien2 = $_POST['bien2'];
$bien3 = $_POST['bien3'];
$titulolema = $_POST['titulolema'];
$desclema = $_POST['desclema'];

$face = $_POST['face'];
$twit = $_POST['twit'];
$gplus = $_POST['gplus'];
$ytube = $_POST['ytube'];

if($face==""){
    $face="#";
}
if($twit==""){
    $twit="#";
}
if($gplus==""){
    $gplus="#";
}
if($ytube==""){
    $ytube="#";
}
$redes = $face.'|'.$twit.'|'.$gplus.'|'.$ytube;

$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$logo = explode(".", $_FILES["logo"]["name"]);
$imagen1 = explode(".", $_FILES["imagen1"]["name"]);
$imagen2 = explode(".", $_FILES["imagen2"]["name"]);

$query = "INSERT INTO pag_uno VALUES(null,'$pestana','$titulo','$desctitulo','$bien1','$bien2','$bien3','$titulolema','$desclema','$redes','$direccion','$telefono','$logo[0]','$imagen1[0]','$imagen2[0]')";

if (!mysql_query($query)) {
    echo (mysql_error());
}
move_uploaded_file($_FILES["logo"]["tmp_name"], "images/" . $_FILES["logo"]["name"]);
move_uploaded_file($_FILES["imagen1"]["tmp_name"], "images/" . $_FILES["imagen1"]["name"]);
move_uploaded_file($_FILES["imagen2"]["tmp_name"], "images/" . $_FILES["imagen2"]["name"]);

header('location:modelo1');
mysql_close($link);
?>