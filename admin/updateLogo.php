<?php
include_once 'conexion.php';
$pest = $_GET['pest'];
$idp = $_GET['idp'];
$tit = $_GET['tit'];
$desc = $_GET['desc'];
$dir = $_GET['dir'];
$tel = $_GET['tel'];
$titbien1 = $_GET['titbien1'];
$titbien2 = $_GET['titbien2'];
$titbien3 = $_GET['titbien3'];
$bien1 = $_GET['bien1'];
$bien2 = $_GET['bien2'];
$bien3 = $_GET['bien3'];

$face = $_GET['face'];
$twit = $_GET['twit'];
$gplus = $_GET['gplus'];
$ytube = $_GET['ytube'];
$t1 = $_GET['t1'];

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

$query = "UPDATE pag_uno SET pestana = '$pest', titulo = '$tit', desctitulo = '$desc' , direccion = '$dir', telefono = '$tel', titulobien1 = '$titbien1', titulobien2 = '$titbien2', titulobien3 = '$titbien3', bien1 = '$bien1', bien2 = '$bien2', bien3 = '$bien3', redes = '$redes', imagen1 = '$t1' WHERE idpag =$idp";
$result = mysql_query($query);
