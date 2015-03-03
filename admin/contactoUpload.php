<?php
include_once 'conexion.php';
$inv = $_GET['inv'];
$pestana = $_GET['pestana'];
$idp = $_GET['idc'];
$cor = $_GET['cordenadas'];

$query = "UPDATE pag_contactos SET pestana_cont = '$pestana', inv_cont = '$inv' , cordenadas = '$cor' WHERE idcont =$idp";
$result = mysql_query($query);


//echo $idp+" ->".$tit."- -".$desc;