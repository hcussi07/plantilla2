<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="crear.php" method="post" enctype="multipart/form-data">
            <label for="pestana">Pestaña: </label>
            <input type="text" name="pestana" id="pestana"/><br>
            <label for="titulo">Nombre empresa: </label>
            <input type="text" name="titulo" id="titulo"/><br>
            <label for="desctitulo">Descripcion titulo: </label>
            <input type="text" name="desctitulo" id="desctitulo"/><br>
            <label for="bien1">Bienvenida: </label>
            <textarea name="bien1" id="bien1"></textarea><br>
            <label for="bien2">Bienvenida 2: </label>
            <textarea name="bien2" id="bien2"></textarea><br>
            <label for="bien3">Bienvenida 3: </label>
            <textarea name="bien3" id="bien3"></textarea><br>
            <label for="logo">Logo: </label>
            <input type="file" name="logo" id="logo" accept="image/jpeg" data-val="true"/><br>
            <label for="imagen1">Imagen 1: </label>
            <input type="file" name="imagen1" id="imagen1"/><br>
            <label for="imagen2">Imagen 2: </label>
            <input type="file" name="imagen2" id="imagen2"/><br>
            <input type="submit" value="Guardar"/>
            <input type="reset" value="Borrar"/>
        </form>
    </body>
</html>
