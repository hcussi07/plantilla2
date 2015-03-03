<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['idplogo'];
$logoN = explode(".", $_FILES["logo"]["name"]);
$logo = $logoN[0].'.'.$logoN[1];
move_uploaded_file($_FILES["logo"]["tmp_name"], "../imagenes/" . $_FILES["logo"]["name"]);

$query = "UPDATE pag_uno SET logo = '$logo' WHERE idpag =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$logo;
}
