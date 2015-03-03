<?php
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html; charset=UTF-8');
include_once 'conexion.php';
$query = "SELECT * FROM pag_uno ORDER BY idpag DESC LIMIT 0,1";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titulo Empresa</title>
        <meta name="description" content="Descripcion de la página">
        <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
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
            #admin{position: absolute;top:0; left: 10px; border: 1px solid #CCC; background-color: #F2F2F2; width:30%; opacity:0.8; filter:alpha(opacity=60); z-index: 2}
            #input-redes input{ display: none }
            #admin #form-admin{overflow: auto; display: none;}

            #main-container{margin:0 auto;width:1100px;}
            #main-container header{border-top:#FF8D2C solid 5px; padding:30px 0 10px 0}
            #main-container header a{color:#A1A1A1;}
            #main-container header a.active{color:#FF8D2C;}
            #main-container header a:hover{color:#FF8D2C;}
            #main-container header a:visited{color:#A1A1A1;}
            #main-container header ul{ overflow:hidden; padding-top:10px}
            #main-container header li{float:left; padding:5px 30px 5px 0}
            #main-container header #logo{float:left}
            #main-container header #logo:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}
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
            #main-container #slider :hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}
            .sb1 :hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 11; position: relative}
            #parall:hover, #emp:hover, #dir:hover, #red:hover{border:solid 2px #BB0000; cursor: crosshair; background: #CCC;opacity:0.8; filter:alpha(opacity=60); z-index: 1; position: relative}

            #main-container .parallax{margin-top:10px;height:300px;background-repeat:no-repeat;background-attachment:fixed;background-size:cover; background-position:50% 50%}
            #main-container .parallax-1{background-image: url(../imagenes/<?= $row['imagen2'] ?>);}
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
            footer li a{display:block;width:45px;height:45px;background-repeat:no-repeat; background-image:url(../imagenes/social.png)}
            footer li a.f{background-position:0px 0px}
            footer li a.t{background-position:0px -45px}
            footer li a.g{background-position:0px -135px}
            footer li a.y{background-position:0px -90px}
            footer li a.f:hover{background-color:#3B5998}
            footer li a.t:hover{background-color:#00ACED}
            footer li a.g:hover{background-color:#DD4B39}
            footer li a.y:hover{background-color:#BB0000}
            footer p.mp{background-repeat:no-repeat;background-image:url(../imagenes/ph.png);background-position:0px 0px;padding-left:20px;}
            footer p.ph{background-repeat:no-repeat;background-image:url(../imagenes/mp.png);background-position:0px 0px;padding-left:20px; margin-top:10px}
            footer h4{padding-top:30px; padding-bottom:10px}
            footer h4.t1{padding-left:40px}
            footer .p1{padding:0px 20px 10px 40px}
            #nom_red{float: left}
            #face,#twit,#gplus,#ytube{display: none}
            .ui-widget-header,.ui-state-default, ui-button{background:#337AB7; border: 1px solid #66afe9; color: #FFFFFF;}
            #pop_logo,#pop_im1,#pop_titulo,#pop_desctit,#pop_bien1,#pop_bien2,#pop_bien3,#pop_titlema,
            #pop_descl,#pop_redes,#pop_dir,#pop_tel,#pop_but,#pop_im2{overflow: auto;display: none}

        </style>
    </head>
    <body>

        <div id="pop_logo" title="Logo">
            <form>
            <input type="file" name="logo" id="logo"/>
            <input type="button" value="Guardar" id="btn1"/></form>
        </div>
        <div id="pop_im1" title="Imagen slider">
            <input type="file" name="imagen1" id="imagen1" accept="image/jpeg/png" data-val="true"/>
        </div>

        <div id="pop_titulo" title="Empresa">
            <label for="titulo">Nombre: </label>
            <input type="text" name="titulo" id="titulo" size="30"/>
            <br>
            <label for="desctitulo">Descripcion: </label>
            <textarea name="desctitulo" id="desctitulo" rows="5" cols="30"></textarea>
        </div>

        <div id="pop_bien1" title="Organizacion">
            <textarea name="bien1" id="bien1" rows="5" cols="30"></textarea>
        </div>

        <div id="pop_bien2" title="Trayectoria">
            <textarea name="bien2" id="bien2" rows="5" cols="30"></textarea>
        </div>

        <div id="pop_bien3" title="Servicios">
            <textarea name="bien3" id="bien3" rows="5" cols="30"></textarea>
        </div>

        <div id="pop_titlema" title="Lema">
            <label for="titulolema">Titulo lema: </label>
            <input type="text" name="titulolema" id="titulolema" size="30"/>
            <br>
            <label for="desclema">Descripcion Lema: </label>
            <textarea name="desclema" id="desclema" rows="5" cols="30"></textarea>
            <br>
            <label for="imagen2">Imagen Fondo: </label>
            <input type="file" name="imagen2" id="imagen2" accept="image/jpeg/png" data-val="true"/>
        </div>

        <div id="pop_redes" title="Redes Sociales">
            <div id="nom_red">
                <label><input type="checkbox" name="fb" value="facebook" id="fb" onclick="mostrarfb()"/>Facebook</label>
                <input type="text" name="face" id="face" size="25"/><br>
                <label><input type="checkbox" name="tw" value="twitter" id="tw" onclick="mostrartw()"/>Twitter</label>
                <input type="text" name="twit" id="twit" size="25"/><br>
                <label><input type="checkbox" name="gp" value="gplus" id="gp" onclick="mostrargp()"/>gplus</label>
                <input type="text" name="gplus" id="gplus" size="25"/><br>
                <label><input type="checkbox" name="yt" value="youtube" id="yt" onclick="mostraryt()"/>Youtube</label>
                <input type="text" name="ytube" id="ytube" size="25"/><br>
            </div>

        </div>

        <div id="pop_dir" title="Ubicacion">
            <label for="direccion">Dirección: </label>
            <input type="text" name="direccion" id="direccion" size="30"/>
            <br>
            <label for="telefono">Teléfono: </label>
            <input type="text" name="telefono" id="telefono" size="30"/>
        </div>
        <div id="admin"><div id="admin1" style="background: #337AB7">Click aqui para guardar</div>
            <div id="form-admin">
                <div id="pop_pestana">
                    <label for="pestana">Pestaña: </label>
                    <input type="text" name="pestana" id="pestana" size="30"/>
                </div>
                <input type="submit" value="Guardar"/>
                <input type="reset" value="Borrar" onclick="oinputr()"/>
            </div>
        </div>

        <div id="main-container">
            <header>
                <div id="logo"><img src="../imagenes/<?= $row['logo'] ?>" id="logo_destino"><h1 id="empresa"></h1></div>
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
                <img src="../imagenes/<?= $row['imagen1'] ?>" id="imagen1_destino">
            </div>
            <div id="container">
                <div class="table bg1">
                    <div>
                        <section>
                            <h3>NUESTRA <span>organización</span></h3>
                            <div class="sb1">
                                <p id="bien1_out"><?= $row['bien1'] ?></p>
                            </div>
                        </section>
                    </div>
                    <div class="bc">
                        <section>
                            <h3>NUESTRA <span>trayectoria</span></h3>
                            <div class="sb1">
                                <p id="bien2_out"><?= $row['bien2'] ?></p>
                            </div>
                        </section>        
                    </div>
                    <div>
                        <section>
                            <h3>NUESTROS <span>servicios</span></h3>
                            <div class="sb1">
                                <p id="bien3_out"><?= $row['bien3'] ?></p>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="parallax parallax-1" id="parall">
                    <h4><?= $row['titulolema'] ?></h4>
                    <h2><?= $row['desclema'] ?></h2> 
                </div>
            </div>

        </div>
        <footer>
            <div class="table">
                <div class="w1" id="emp">
                    <h4 class="t1"><?= $row['titulo'] ?></h4>
                    <p class="p1"><?= $row['desctitulo'] ?></p>
                </div>
                <div class="w2" id="dir">
                    <h4>Dónde estamos</h4>
                    <p class="loc mp"><?= $row['direccion'] ?></p>
                    <p class="loc ph"><?= $row['telefono'] ?></p>
                </div>
                <div class="w2" id="red">
                    <h4>Siguenos</h4>
                    <?php
                    $red = explode("|", $row['redes']);
                    ?>
                    <ul>
                        <li><a href="<?= $red[0] ?>" target="_blank" class="follow f"> </a></li>
                        <li><a href="<?= $red[1] ?>" target="_blank" class="follow t"> </a></li>
                        <li><a href="<?= $red[2] ?>" target="_blank" class="follow g"> </a></li>
                        <li><a href="<?= $red[3] ?>" target="_blank" class="follow y"> </a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main2.js"></script>
    </body>
</html>