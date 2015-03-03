<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titulo Empresa</title>
        <meta name="description" content="Descripcion de la página">
        <style>
            @import url(http://fonts.googleapis.com/css?family=Muli);
            *{margin:0; padding:0}
            html{font-family: 'Muli', sans-serif; -ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}
            body{background:#FFF; padding:0}
            article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary{display: block;}
            a{background-color:transparent;text-decoration:none}
            a:active, a:hover{outline: 0;}
            b, strong{font-weight: bold;}
            img{border: 0;}
            h1, h2, h3, h4, h5{display:block}
            ul, ol, li{display:block;list-style-type:none;}
            .clear{float:none;clear:both;}
            p{display:block}
            #admin{
                position: absolute;
                top:0;
                left: 10px;
                border: 1px solid #CCC;
                background-color: #F2F2F2;
                width:30%;
                opacity:0.8;
                filter:alpha(opacity=60);
            }
            #admin #form-admin #input-redes input{
                display: none
            }
            #main-container{margin:0 auto;width:1100px;}
            #topheader{}
            #main-container header{border-top:#FF8D2C solid 5px; padding:30px 0 10px 0}
            #main-container header a{color:#A1A1A1;}
            #main-container header a.active{color:#FF8D2C;}
            #main-container header a:hover{color:#FF8D2C;}
            #main-container header a:visited{color:#A1A1A1;}
            #main-container header ul{ overflow:hidden; padding-top:10px}
            #main-container header li{float:left; padding:5px 30px 5px 0}
            #main-container header #logo{float:left}
            #main-container header #menu{float:right}
            #main-container #container{border-top:#FF8D2C solid 5px; margin-top:10px}
            #main-container .table{display:table; width:100%}
            #main-container .bg1{background:#F7F7F7}
            #main-container .table div{display:table-cell;border-bottom:#DEDEDE solid 1px;}
            #main-container .table div.bc{ border-left:#DEDEDE solid 1px; border-right:#DEDEDE solid 1px; }
            #main-container #container h3{font-weight:bold; font-size:18px;letter-spacing:-1px; padding-bottom:20px}
            #main-container #container h3 span{font-weight:normal; color:#333; font-size:20px}
            #main-container #container p{font-size:13px; color:#666}
            #main-container #container section{ padding:30px 30px 20px 30px}
            #main-container #slider img {width: 100%; height: 550px}

            #main-container .parallax{margin-top:10px;height:300px;background-repeat:no-repeat;background-attachment:fixed;background-size:cover; background-position:50% 50%}
            #main-container .parallax-1{background-image: url(modelo1/imagenes/slide2.jpg);}
            #main-container .parallax h3, #main-container .parallax h4{text-transform:uppercase}
            #main-container .parallax h4{color:#CCC;padding:80px 350px 5px 40px;font-size:20px}
            #main-container .parallax h2{color:#FFF;padding:0px 350px 0px 40px;font-size:30px;text-transform:uppercase}
            footer{background:#474747;margin:0 auto;width:1100px; margin-top:10px; padding-bottom:20px}
            footer .table{display:table;width:100%}
            footer .table div{display:table-cell; color:#FFF}
            footer .table div.w1{width:50%;}
            footer .table div.w2{width:25%;}
            footer p{font-size:13px;}
            footer li{float:left;width:45px;height:45px}
            footer li a{display:block;width:45px;height:45px;background-repeat:no-repeat; background-image:url(modelo1/imagenes/social.png)}
            footer li a.f{background-position:0px 0px}
            footer li a.t{background-position:0px -45px}
            footer li a.g{background-position:0px -135px}
            footer li a.y{background-position:0px -90px}
            footer li a.f:hover{background-color:#3B5998}
            footer li a.t:hover{background-color:#00ACED}
            footer li a.g:hover{background-color:#DD4B39}
            footer li a.y:hover{background-color:#BB0000}
            footer p.mp{background-repeat:no-repeat;background-image:url(modelo1/imagenes/ph.png);background-position:0px 0px;padding-left:20px;}
            footer p.ph{background-repeat:no-repeat;background-image:url(modelo1/imagenes/mp.png);background-position:0px 0px;padding-left:20px; margin-top:10px}
            footer h4{padding-top:30px; padding-bottom:10px}
            footer h4.t1{padding-left:40px}
            footer .p1{padding:0px 20px 10px 40px}
        </style>
    </head>

    <body>
        <div id="admin">
            <div onclick="ocultar()">Administrador</div>
            <div id="form-admin">
                <form action="crear.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td><label for="pestana">Pestaña: </label></td>
                            <td><input type="text" name="pestana" id="pestana" size="40"/></td>
                        </tr>
                        <tr>
                            <td><label for="titulo">Nombre empresa: </label></td>
                            <td><input type="text" name="titulo" id="titulo" size="40"/></td>
                        </tr>
                        <tr>
                            <td><label for="desctitulo">Descripcion empresa: </label></td>
                            <td><textarea name="desctitulo" id="desctitulo" rows="5" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="bien1">Organizacion: </label></td>
                            <td><textarea name="bien1" id="bien1" rows="5" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="bien2">Trayectoria: </label></td>
                            <td><textarea name="bien2" id="bien2" rows="5" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="bien3">Servicios: </label></td>
                            <td><textarea name="bien3" id="bien3" rows="5" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="titulolema">Titulo lema: </label></td>
                            <td><input type="text" name="titulolema" id="titulolema" size="40"/></td>
                        </tr>
                        <tr>
                            <td><label for="desclema">Descripcion Lema: </label></td>
                            <td><textarea name="desclema" id="desclema" rows="5" cols="30"></textarea></td>
                        </tr>
                        <tr>
                            <!--td><label for="redes">Redes: </label></td-->
                            <td >
                                <!--input type="text" name="redes" id="redes" size="40"/-->
                                Redes?<br>
                                <input type="checkbox" name="fb" value="facebook" id="fb" onclick="mostrarfb()"/>Facebook<br>
                                <input type="checkbox" name="tw" value="twitter" id="tw" onclick="mostrartw()"/>Twitter<br>
                                <input type="checkbox" name="gp" value="gplus" id="gp" onclick="mostrargp()"/>gplus<br>
                                <input type="checkbox" name="yt" value="youtube" id="yt" onclick="mostraryt()"/>Youtube<br>

                            </td>
                            <td>
                                <div id="input-redes">
                                    <br>
                                    <input type="text" name="face" id="face" size="40"/><br>
                                    <input type="text" name="twit" id="twit" size="40"/><br>
                                    <input type="text" name="gplus" id="gplus" size="40"/><br>
                                    <input type="text" name="ytube" id="ytube" size="40"/><br>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="direccion">Dirección: </label></td>
                            <td><input type="text" name="direccion" id="direccion" size="40"/></td>
                        </tr>
                        <tr>
                            <td><label for="telefono">Teléfono: </label></td>
                            <td><input type="text" name="telefono" id="telefono" size="40"/></td>
                        </tr>
                        <tr>
                            <td><label for="logo">Logo: </label></td>
                            <td><input type="file" name="logo" id="logo" accept="image/jpeg/png" data-val="true"/></td>
                        </tr>
                        <tr>
                            <td><label for="imagen1">Imagen 1: </label></td>
                            <td><input type="file" name="imagen1" id="imagen1" accept="image/jpeg/png" data-val="true"/></td>
                        </tr>
                        <tr>
                            <td><label for="imagen2">Imagen 2: </label></td>
                            <td><input type="file" name="imagen2" id="imagen2" accept="image/jpeg/png" data-val="true"/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Guardar"/></td>
                            <td><input type="reset" value="Borrar" onclick="oinputr()"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div id="main-container">
            <header>
                <div id="logo"><img src="modelo1/imagenes/logo.jpg" id="logo_destino"><h1 id="empresa"></h1></div>
                <div id="menu">
                    <nav>
                        <ul>
                            <li><a href="#" class="active">Inicio</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Contactos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </header>
            <div id="slider">
                <img src="modelo1/imagenes/slide1.jpg" id="imagen1_destino">
            </div>
            <div id="container">
                <div class="table bg1">
                    <div>
                        <section>
                            <h3>NUESTRA <span>organización</span></h3>
                            <p id="bien1_out">Temporibus autem quibusdam era officiis debitis reruma necessitatibus saepe eveniet voluptates repudiandae ellina molestiae.</p>
                        </section>
                    </div>
                    <div class="bc">
                        <section>
                            <h3>NUESTRA <span>trayectoria</span></h3>
                            <p id="bien2_out">Temporibus autem quibusdam era officiis debitis reruma necessitatibus saepe eveniet voluptates repudiandae ellina molestiae.</p>
                        </section>        
                    </div>
                    <div>
                        <section>
                            <h3>NUESTROS <span>servicios</span></h3>
                            <p id="bien3_out">Temporibus autem quibusdam era officiis debitis reruma necessitatibus saepe eveniet voluptates repudiandae ellina molestiae.</p>
                        </section>
                    </div>
                </div>
                <div class="parallax parallax-1">
                    <h4 id="tlema_out">Trabajamos para usted</h4>
                    <h2 id="dlema_out">las empresas sociales no compiten para ser las mejores del mundo, sino para hacer un mejor mundo</h2>      
                </div>
            </div>

        </div>
        <footer>
            <div class="table">
                <div class="w1">
                    <h4 class="t1" id="t1">Nombre Empresa</h4>
                    <p class="p1" id="descempresa">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.Lorem Ipsum is simply dummy text of the printing and typesetting industrydummy text ever since.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                </div>
                <div class="w2">
                    <h4>Dónde estamos</h4>
                    <p class="loc mp" id="dir_out">Av. Exaltación Nro. 1548, San Pablo, Santa Cruz de la Sierra, Bolivia</p>
                    <p class="loc ph" id="tel_out">(591-3) 3358422</p>
                </div>
                <div class="w2">
                    <h4>Siguenos</h4>
                    <ul>
                        <li><a href="#" target="_blank" class="follow f"> </a></li>
                        <li><a href="#" target="_blank" class="follow t"> </a></li>
                        <li><a href="#" target="_blank" class="follow g"> </a></li>
                        <li><a href="#" target="_blank" class="follow y"> </a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>