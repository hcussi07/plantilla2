<?php 
$link = mysql_connect('localhost','root','123456') or die('Error al conectar con DB'. mysql_error());
mysql_select_db('plantillabd') or die('no se pudo seleccionar la base de datos');
 ?>