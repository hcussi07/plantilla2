<?php
header('Content-Type: text/html; charset=UTF-8');
include 'conexion.php';
$idp = $_POST['idp10'];
$imagen1N = explode(".", $_FILES["imagen1"]["name"]);
$imagen1 = $imagen1N[0].'.'.$imagen1N[1];
move_uploaded_file($_FILES["imagen1"]["tmp_name"], "../imagenes/" . $_FILES["imagen1"]["name"]);

$query = "UPDATE pag_uno SET imagen1 = '$imagen1' WHERE idpag =$idp";
$result = mysql_query($query);
if(!$result){
    echo die(mysql_error());
}else{
    echo $idp." -> ".$imagen1;
}


/*if (isset($_FILES["file"]))
{
    $file = $_FILES["imagen1"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../imagenes/";
    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      echo "Error, el archivo no es una imagen"; 
    }
    else if ($size > 1024*1024)
    {
      echo "Error, el tamaño máximo permitido es un 1MB";
    }
    else if ($width > 500 || $height > 500)
    {
        echo "Error la anchura y la altura maxima permitida es 500px";
    }
    else if($width < 60 || $height < 60)
    {
        echo "Error la anchura y la altura mínima permitida es 60px";
    }
    else
    {
        $src = $carpeta.$nombre;
        //move_uploaded_file($_FILES["imagen1"]["tmp_name"], "../imagenes/" . $_FILES["imagen1"]["name"]);
        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='$src'>";
    }
}*/