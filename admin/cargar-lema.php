<?php
header('Content-Type: text/html; charset=UTF-8');
include './conexion.php';
$idp = $_POST['idplema'];
$titulolema = $_POST['titulolema'];
$desclema = $_POST['desclema'];
/*$imagen2N = explode(".", $_FILES["imagen2"]["name"]);
$imagen2 = $imagen2N[0].'.'.$imagen2N[1];
move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../imagenes/" . $_FILES["imagen2"]["name"]);*/

$query = "UPDATE pag_uno SET titulolema = '$titulolema', desclema = '$desclema' WHERE idpag =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $desclema;
}
