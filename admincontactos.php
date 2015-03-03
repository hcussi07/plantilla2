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
        <form action="crearcontacto.php" method="post" enctype="multipart/form-data">
            <label for="direccion">Direccion: </label>
            <input type="text" name="direccion" id="direccion"/><br>
            <label for="latitud">Latitud: </label>
            <input type="text" name="latitud" id="latitud"/><br>
            <label for="longitud">Longitud: </label>
            <input type="text" name="longitud" id="longitud"/><br>
            <label for="zoom">Zoom: </label>
            <input type="text" name="zoom" id="zoom"/><br>
            <label for="telefono1">Telefono 1: </label>
            <input type="text" name="telefono1" id="telefono1"/><br>
            <label for="telefono2">Telefono 2: </label>
            <input type="text" name="telefono2" id="telefono2"/><br>
            <label for="telefono3">Celular: </label>
            <input type="text" name="telefono3" id="telefono3"/><br>
            <label for="redes">Redes Sociales: </label>
            <input type="text" name="redes" id="redes"/><br>
            <label for="mail">e-mail: </label>
            <input type="email" name="mail" id="mail"/><br>
            <label for="fax">Fax: </label>
            <input type="text" name="fax" id="fax"/><br>
            <input type="submit" value="Guardar"/>
            <input type="reset" value="Borrar"/>
        </form>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
