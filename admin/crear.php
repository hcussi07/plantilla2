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
$logoN = explode(".", $_FILES["logo"]["name"]);
$logo = $logoN[0].'.'.$logoN[1];
//$logo = $_POST['logo'];
//$logo = explode(".", $_FILES["logo"]["name"]);
$imagen1N = explode(".", $_FILES["imagen1"]["name"]);
$imagen1 = $imagen1N[0].'.'.$imagen1N[1];
$imagen2N = explode(".", $_FILES["imagen2"]["name"]);
$imagen2 = $imagen2N[0].'.'.$imagen2N[1];

$query = "INSERT INTO pag_uno VALUES(null,'$pestana','$titulo','$desctitulo','$bien1','$bien2','$bien3','$titulolema','$desclema','$redes','$direccion','$telefono','$logo','$imagen1','$imagen2')";

if (!mysql_query($query)) {
    echo (mysql_error());
}
move_uploaded_file($_FILES["logo"]["tmp_name"], "../imagenes/" . $_FILES["logo"]["name"]);
move_uploaded_file($_FILES["imagen1"]["tmp_name"], "../imagenes/" . $_FILES["imagen1"]["name"]);
move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../imagenes/" . $_FILES["imagen2"]["name"]);

header('location:../index.php');
mysql_close($link);
?>